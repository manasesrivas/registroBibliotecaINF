@extends('layouts.base')
@include('layouts._partials.menu')
@section('content')

    @foreach ($books as $book)
    <header>
        {% include 'base/menu.html' %}
    </header>
    <main>

        <h1 class="title-page">Libros</h1>
        
        <section class="container background_filter">
            <div class="space-between ">
                <div class="leyenda">
                    <a href="#" class="ctaAdd">Añadir Libro</a>
                    <div class="leyenda-leyenda">
                        <label for="" class="" >no devueltos: 19 </label>
                    </div>
                </div>
                    
                <form action="" class="center-items align-end">
                    <input type="text" name="search_filter" placeholder="Buscar" value="{{ old('search_filter')}}" class="search-box__input-filter">
                    <select name="libros" class="style-select" id="">
                        <option value="todos">Mostrar todos</option>
                        <option value="devueltos">Mostrar libros devueltos</option>
                        <option value="noDevueltos">Mostrar libros no devueltos</option>
                    </select>
                    <button class="color-update container-form__button">mostrar</button>
                </form>
            </div>
            <table class="position-relative">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>titulo</th>
                        <th>editorial</th>
                        <th>autor</th>
                        <th>edicion</th>
                        <th>disponible</th>
                        <th>detalles</th>
                    </tr>
                </thead>
                <tbody>
                    @component('_components.rowShowBook')
                        
                    @endcomponent
                    </tbody>
            </table>
        </section>
    </main>
    @endforeach
    
@endsection