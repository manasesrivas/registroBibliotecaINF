@extends('layouts.base')
@section('content')
<header>
    <h1 class="title-page">Añadir Libro</h1>
    <nav class="nav">
        <ul class="nav-box">
            <li >
                <a href="{{ route('book.index') }}" class="nav-box__items item-menu-activate">Volver</a>
            </li>
        </ul>
    </nav>
</header>

<div class="div-container-addForm background_filter">
    <form method="POST" action="{{ route('book.store') }}" class="container-addForm background_filter">
        @csrf
        <div class="content">
            <div class="container-addForm--inputs">
                <label for="id_titulo" class="container-addForm--inputs__label">Titulo</label>
                <div class="border">
                    <input type="text" name="title" id="" class="container-addForm--inputs__input" placeholder="Titulo">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="id_editorial" class="container-addForm--inputs__label">Editorial</label>
                <div class="border">
                    <input type="text" name="editorial" id="" class="container-addForm--inputs__input" placeholder="Editorial">
                </div>
            </div>
            
            <div class="container-addForm--inputs">
                <label for="id_autor" class="container-addForm--inputs__label">Autor</label>
                <div class="border">
                    <input type="text" name="author" id="" class="container-addForm--inputs__input" placeholder="Autor">
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="id_tipoAdquisicion" class="container-addForm--inputs__label">Tipo de adquisicion</label>
                <div class="border">
                    <input type="text" name="tipoAdquisicion" id="" class="container-addForm--inputs__input" placeholder="Tipo de Aquisicion">
                </div>
            </div>
            
            <div class="container-addForm--inputs">
                <label for="id_edicion" class="container-addForm--inputs__label">Edicion</label>
                <div class="border">
                    <input type="text" name="edition" id="" class="container-addForm--inputs__input" placeholder="Edicion">
                </div>
            </div>
        </div>
        <div class="container-addForm--inputs space-between">
            <button class="container-form__button center-items color-update">
                Añadir
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 8v11c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v3zm3-4h13v12H5V5c0-.806.55-.988 1-1z"></path><path d="M11 14h2v-3h3V9h-3V6h-2v3H8v2h3z"></path></svg>
            </button>
        </div>
    </form>
</div>
@endsection