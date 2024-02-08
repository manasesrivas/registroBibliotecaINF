"""
URL configuration for registroBibliotecario project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.2/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from app import views

urlpatterns = [
    path('admin/', admin.site.urls),
    #--------------------USER MANAGE-------------------------
    path('', views.signin, name='signin'),
    path('signout/', views.signout, name='signout'),
    #-----------------------BOOKS-----------------------
    path('books/home/', views.books, name='books'),
    path('books/<int:idBook>/', views.bookDetails, name='bookDetails'),
    path('books/<int:idBook>/deleteBook/', views.deleteBook, name='deleteBook'),
    path('books/addBook/', views.addBook, name='addBook'),
    #-----------------READERS-------------
    path('readers/home/', views.readers, name='readers'),
    path('readers/<int:idReader>/', views.readerDetails, name='readerDetails'),
    path('readers/<int:idReader>/deleteReader/', views.deleteReader, name='deleteReader'),
    path('reader/addReader/', views.addReader, name='addReader'),
    #----------------LOANS-------------------------------
    path('loans/<int:idReader>/createLoan', views.createLoan, name='createLoan'),
    path('loans/home/', views.loans, name='loans'),
    path('loans/<int:idLoan>/', views.loanDetails, name='loanDetails'),
    path('loans/<int:idBook>/<int:idReader>/saveLoan/', views.saveLoan, name='saveLoan'),
    path('loans/<int:idLoan>/loanComeback/', views.loanComeback, name='loanComeback')
]
