
from django import forms
from .models import Books, Readers, Loans


class formAddBook(forms.ModelForm):
    class Meta:
        model = Books
        fields = [
            'titulo',
            'editorial',
            'autor',
            'tipoAdquisicion',
            'edicion',
            'fechaEntrada'
        ]
        widgets = {
            'titulo': forms.TextInput(
                attrs={
                    'placeholder': 'titulo',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'editorial': forms.TextInput(
                attrs={
                    'placeholder': 'editorial',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'autor': forms.TextInput(
                attrs={
                    'placeholder': 'autor',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'tipoAdquisicion': forms.TextInput(
                attrs={
                    'placeholder': 'tipoAdquisicion',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'edicion': forms.TextInput(
                attrs={
                    'placeholder': 'edicion',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'fechaEntrada': forms.SelectDateWidget(
                attrs={
                    'class': 'container-addForm--inputs__input cursor-pointer',
                    'style': 'text-align: center'
                }
            )
        }


class formAddTeacher(forms.ModelForm):
    class Meta:
        model = Readers

        fields = [
            'nombres', 
            'apellidos',
            'especialidad', 
            'email',
            'numeroTelefono', 
            'direccion', 
            'esDocente'
        ]
        
        widgets = {
            'nombres': forms.TextInput(
                attrs={
                    'placeholder': 'nombres',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'apellidos': forms.TextInput(
                attrs={
                    'placeholder':
                    'apellidos',
                    'class': 'container-addForm--inputs__input'
                }
            ),
               'especialidad': forms.Select(
                choices=Readers.ESPECIALIDADES_CHOICES,
                attrs={
                    'class': 'container-addForm--inputs__input cursor-pointer',
                    'id': 'select-especialidad'
                }
            ),
            'email': forms.EmailInput(
                attrs={
                    'placeholder': 'email',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'numeroTelefono': forms.NumberInput(
                attrs={
                    'placeholder': 'numeroTelefono',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'direccion': forms.TextInput(
                attrs={
                    'placeholder': 'direccion',
                    'class': 'container-addForm--inputs__input'
                }
            ),
        }

class formAddReader(forms.ModelForm):
    class Meta:
        model = Readers

        fields = [
            'nombres', 
            'apellidos', 
            'año', 
            'seccion', 
            'especialidad',
            'email', 
            'numeroTelefono', 
            'direccion', 
            'esDocente'
        ]
        widgets = {
            'nombres': forms.TextInput(
                attrs={
                    'placeholder': 'nombres',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'apellidos': forms.TextInput(
                attrs={
                    'placeholder': 'apellidos',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'año': forms.Select(
                choices=Readers.YEAR_CHOICES,
                attrs={
                    'placeholder': 'año', 
                    'class': 'container-addForm--inputs__input cursor-pointer'
                }
            ),
            'seccion': forms.Select(
                choices=Readers.SECCION_CHOICES,
                attrs={
                    'placeholder': 'seccion',
                    'class': 'container-addForm--inputs__input cursor-pointer'
                }
            ),
            'especialidad': forms.Select(
                choices=Readers.ESPECIALIDADES_CHOICES,
                attrs={
                    'class':'container-addForm--inputs__input cursor-pointer',
                    'id': 'select-especialidad'
                }
            ),
            'email': forms.EmailInput(
                attrs={
                    'placeholder': 'email',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'numeroTelefono': forms.NumberInput(
                attrs={
                    'placeholder': 'numeroTelefono',
                    'class': 'container-addForm--inputs__input'
                }
            ),
            'direccion': forms.TextInput(
                attrs={
                    'placeholder': 'direccion',
                    'class': 'container-addForm--inputs__input'
                }
            ),
        }
