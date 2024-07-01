@extends('layouts.base')

@section('content')
<header>
    <h1 class="title-page__loans">prestamo</h1>
    <nav class="nav">
        <ul class="nav-box">
            <li >
                <a href="{{ route('loan.index') }}" class="nav-box__items item-menu-activate">Volver</a>
            </li>
        </ul>
    </nav>
</header>
<div class="div-container-addForm background_filter"> 
    
    <div class="container-addForm">
        <div>
            <h2 class="title_page">credenciales del prestatario</h2>
        </div>
        <div class="content">
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Nombres</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->name }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Apellidos</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->lastName }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            {% if  not loan.idLector.esDocente %}
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Año</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->year }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Seccion</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->seccion }}" disabled class="container-addForm--inputs__input">
                </div>  
            </div>
            {% endif %}
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Especialidad</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->especialidad }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Email</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->email }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Telefono</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->number }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Direccion</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idReader->address }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>

        </div>
        <div>
            <h2 class="title_page">credenciales del libro</h2>
        </div>
        <div class="content">
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Titulo</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->title }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Editorial</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->editorial }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Autor</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->author }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                {{-- <label for="" class="container-addForm--inputs__label">Puesto en circulacion</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->}}" disabled class="container-addForm--inputs__input">
                </div> --}}
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">TipoAdquisicion</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->tipoAdquisicion }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Edicion</label>
                <div class="border">
                    <input type="text" value="{{ $loan->idBook->edition }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
        </div>
        <div>
            <h2 class="title_page">Datos del prestamo</h2>
        </div>
        <div class="content">
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Dia prestado</label>
                <div class="border">
                    <input type="text" value="{{ $loan->loanDate }}" disabled class="container-addForm--inputs__input">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Dia devuelto</label>
                <div class="border">
                    @if ( $loan->state )
                        <input type="text" value="No devulto" disabled class="container-addForm--inputs__input error" >
                    @else
                        <input type="text" value="{{ $loan->comeBackDate }}" disabled class="container-addForm--inputs__input" >
                    @endif
              
                </div>
            </div>
            <div class="container-addForm--inputs align-end">
                @if ( !$loan->state )
                    
                <form action="" method="POST" class="align-end">
                    @csrf
                    <button class="container-form__button color-update">Devuleto</button>
                </form>
                @endif                
            </div>
        </div>
    </div>
</div>
@endsection