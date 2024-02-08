from django import shortcuts
from django.forms import ValidationError
from .models import Books, Readers, Loans
from .forms import formAddBook, formAddReader, formAddTeacher
from django.contrib.auth.forms import AuthenticationForm, UserCreationForm
from django.contrib.auth.models import User
from django.contrib.auth import login, logout, authenticate
from django.db import IntegrityError
from datetime import datetime
from django.contrib.auth.decorators import login_required
from django.views.decorators.cache import never_cache
from django.db.models import Q
# es para que el texto se tome como etiqueta: mark_safe(poner codigo HTML entre comillas)
from django.utils.safestring import mark_safe
from django.utils import timezone


@never_cache
@login_required
def books(request):
    filtro = request.GET.get('libros')

    if filtro == 'devueltos':
        allBooks = Books.objects.filter(Q(disponible__exact=True)).distinct()
    
    elif filtro == 'noDevueltos':
        allBooks = Books.objects.filter(Q(disponible__exact=False)).distinct()

    else:
        allBooks = Books.objects.all().distinct()

    if peticion := request.GET.get('search'):
        allBooks = Books.objects.filter(
        Q(titulo__icontains=peticion)).distinct()
    elif peticionFilter := request.GET.get('search_filter'):
        allBooks = Books.objects.filter(
        Q(titulo__icontains=peticionFilter, disponible__exact=True if filtro == 'devueltos' else False)).distinct()

    noDevueltos = Loans.objects.filter(Q(estado__exact=True))

    return shortcuts.render(request, 'books/books.html', {'books': allBooks, 'title': 'Libros', 'noDevueltos': noDevueltos})


@never_cache
@login_required
def addBook(request):
    if request.method == 'GET':
        return shortcuts.render(request, 'books/addBook.html', {'form': formAddBook, 'title': 'Añadir Libro'})
    else:
        try:
            if request.POST.get('dateToday') == 'on':
                form = formAddBook(request.POST)
                newBook = form.save(commit=False)
                newBook.fechaEntrada = timezone.now()
                newBook.save()
            else:
                form = formAddBook(request.POST)
                form.save()
            return shortcuts.redirect('books')
        except ValueError as error:
            return shortcuts.render(request, 'books/addBook.html', {'form': formAddBook, 'error': error, 'title': 'Añadir Libro'})


@never_cache
@login_required
def bookDetails(request, idBook):
    if request.method == 'GET':
        book = shortcuts.get_object_or_404(Books, pk=idBook)
        leido = Loans.objects.filter(Q(idLibro__id__exact=idBook)).distinct().count()
        form = formAddBook(instance=book)
        try:
            loan = Loans.objects.get(Q(estado__exact=True, idLibro__id__exact=idBook))
        except:
            return shortcuts.render(request, 'books/bookDetails.html', {'form': form, 'book': book ,'title': 'Detalles', 'leido': leido})
        return shortcuts.render(request, 'books/bookDetails.html', {'form': form, 'book': book, 'loan': loan ,'title': 'Detalles', 'leido': leido})
    else:
        try:
            book = shortcuts.get_object_or_404(Books, pk=idBook)
            if request.POST.get('dateToday') == 'on':
                form = formAddBook(request.POST, instance=book)
                updateBook = form.save(commit=False)
                updateBook.fechaEntrada = timezone.now()
                updateBook.save()
            else:
                form = formAddBook(request.POST, instance=book)
                form.save()
            return shortcuts.redirect('books')
        except ValueError:
            return shortcuts.render(request, 'bookDetails.html', {'form': form, 'book': book, 'error': 'error en acualizar datos'})


@never_cache
@login_required
def deleteBook(request, idBook):
    book = shortcuts.get_object_or_404(Books, pk=idBook)
    if request.method == 'POST':
        book.delete()
        return shortcuts.redirect('books')


@never_cache
@login_required
def readers(request):
    allReaders = Readers.objects.select_related().prefetch_related('loans_set')
    peticion = request.GET.get('search')
    if peticion:
        allReaders = Readers.objects.filter(
            Q(nombres__icontains=peticion) or Q(id=int(peticion))).distinct()

    return shortcuts.render(request, 'readers/readers.html', {'readers': allReaders, 'title': 'Lectores'})


@never_cache
@login_required
def addReader(request):
    if request.method == 'GET':
        return shortcuts.render(request, 'readers/addReader.html', {'form': formAddReader, 'title': 'Añadir Lector'})
    else:
        try:
            if request.POST['especialidad'] == 'Docente':
                form = formAddTeacher(request.POST)
                reader = form.save(commit=False)
                reader.esDocente = True
                reader.save()
            else:
                form = formAddReader(request.POST)
                form.save()
            return shortcuts.redirect('readers')

        except ValueError:
            return shortcuts.render(request, 'readers/addReader.html', {'form': formAddReader, 'error': 'datos no validos', 'title': 'Añadir Lector'})


@never_cache
@login_required
def readerDetails(request, idReader):
    if request.method == 'GET':
        reader = shortcuts.get_object_or_404(Readers, pk=idReader)
        books = Loans.objects.filter(Q(idLector__id__exact=reader.id)).distinct()
        form = formAddTeacher(instance=reader) if reader.esDocente else formAddReader(instance=reader)
        return shortcuts.render(request, 'readers/readerDetails.html', {'form': form, 'books': books, 'reader': reader, 'title': 'Detalles'})
    else:
        try:
            if request.POST['especialidad'] == 'Docente':
                reader = shortcuts.get_object_or_404(Readers, pk=idReader)
                form = formAddTeacher(request.POST, instance=reader)
                reader = form.save(commit=False)
                reader.esDocente = True
                reader.save()
            else:
                reader = shortcuts.get_object_or_404(Readers, pk=idReader)
                form = formAddReader(request.POST, instance=reader)
                form.save()
            return shortcuts.redirect('readers')
        except ValueError as error:
            return shortcuts.render(request, 'readers/readerDetails.html', {'form': form, 'reader': reader, 'error': error, 'title': 'Detalles'})


@never_cache
@login_required
def deleteReader(request, idReader):
    book = shortcuts.get_object_or_404(Readers, pk=idReader)
    if request.method == 'POST':
        book.delete()
        return shortcuts.redirect('readers')


@never_cache
@login_required
def loans(request):
    loansAll = Loans.objects.all().order_by('fechaEntrega')
    if request.method == 'POST':
        try:
            if  request.POST.get('docentes') == 'on':
                loansAll = Loans.objects.filter(
                    Q(idLector__esDocente__exact=True ,fechaPrestamo__gte=request.POST['desde'], fechaEntrega__lte=request.POST['hasta'])).distinct().order_by(request.POST.get('select-order_by')) 
            elif request.POST.get('estudiantes') == 'on':
                loansAll = Loans.objects.filter(Q(idLector__esDocente__exact=False, fechaPrestamo__gte=request.POST['desde'], fechaEntrega__lte=request.POST['hasta']) if request.POST.get('todas-las-secciones') == 'on' else Q(idLector__esDocente__exact=False, idLector__año__exact=request.POST['year'],idLector__especialidad__exact=request.POST['especialidad'], idLector__seccion__exact=request.POST['seccion'],fechaPrestamo__gte=request.POST['desde'], fechaEntrega__lte=request.POST['hasta'])
                                                ).distinct().order_by(request.POST.get('select-order_by')) 
            elif request.POST.get('todos'):
                loansAll = Loans.objects.filter(Q(fechaPrestamo__gte=request.POST['desde'], fechaEntrega__lte=request.POST['hasta'])).distinct().order_by(request.POST.get('select-order_by')) 

        except ValidationError:
            if  request.POST.get('docentes') == 'on':
                loansAll = Loans.objects.filter(
                    Q(idLector__esDocente__exact=True)).distinct().order_by(request.POST.get('select-order_by')) 
            elif request.POST.get('estudiantes') == 'on':
                loansAll = Loans.objects.filter(
                    Q(idLector__esDocente__exact=False) if request.POST.get('todas-las-secciones') == 'on' else Q(idLector__esDocente__exact=False, idLector__año__exact=request.POST['year'],idLector__especialidad__exact=request.POST['especialidad'], idLector__seccion__exact=request.POST['seccion'])).distinct().order_by(request.POST.get('select-order_by')) 
            elif request.POST.get('todos'):
                loansAll = Loans.objects.all().order_by(request.POST.get('select-order_by')) 
    if peticion := request.GET.get('search'):
        loansAll = Loans.objects.filter(Q(idLibro__titulo__icontains=peticion) or Q(idLector__nombres__icontains=peticion)).distinct()

    noDevueltos = loansAll.filter(Q(estado__exact=True))
    return shortcuts.render(request, 'loan/loans.html', {'loans': loansAll, 'title': 'prestamos', 'noDevueltos': noDevueltos})


@never_cache
@login_required
def createLoan(request, idReader):
    books = Books.objects.filter(Q(disponible__exact=True))
    reader = Readers.objects.get(id=idReader)
    peticion = request.GET.get('searchBook')
    if peticion:
        books = Books.objects.filter(
            Q(titulo__icontains=peticion) or Q(id=int(peticion))).distinct()
    return shortcuts.render(request, 'loan/createLoan.html', {'books': books, 'reader': reader})


@never_cache
@login_required
def saveLoan(request, idBook, idReader):
    if request.method == 'POST':
        book = shortcuts.get_object_or_404(Books, pk=idBook)
        book.disponible = False
        book.save()
        reader = shortcuts.get_object_or_404(Readers, pk=idReader)
        loan = Loans.objects.create(idLibro=book, idLector=reader)
        loan.save()

    return shortcuts.redirect(f'/loans/{reader.id}/createLoan')


@never_cache
@login_required
def loanDetails(request, idLoan):
    loan = shortcuts.get_object_or_404(Loans, pk=idLoan)
    return shortcuts.render(request, 'loan/loanDetails.html', {'loan': loan, 'title': 'Detalles'})


@never_cache
@login_required
def loanComeback(request, idLoan):
    if request.method == 'POST':
        loan = shortcuts.get_object_or_404(Loans, pk=idLoan)
        book = shortcuts.get_object_or_404(Books, pk=loan.idLibro.id)
        book.disponible = True
        book.save()
        loan.estado = False
        loan.idLibro.disponible = True
        loan.fechaEntrega = timezone.now()
        loan.save()
    return shortcuts.redirect('loans')


@never_cache
def signin(request):
    if request.method == 'GET':
        return shortcuts.render(request, 'manageUser/signin.html', {'title': 'signin'})
    else:
        user = authenticate(
            request, username=request.POST['username'], password=request.POST['password'])
        if user == None:
            return shortcuts.render(request, 'manageUser/signin.html', {'error': mark_safe('<p class="error">Usuario o contraseña son incorrectos</p>')})
        else:
            login(request, user)
            return shortcuts.redirect('books')


@never_cache
@login_required
def signout(request):
    logout(request)
    return shortcuts.redirect('signin')
