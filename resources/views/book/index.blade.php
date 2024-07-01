@extends('layouts.base')
@section('content')
    <header>
    <h1 class="title-page">Libros</h1>

        @include('layouts._partials.menu')
    </header>

    <main>

        
        <section class="container background_filter">
            <div class="space-between ">
                <div class="leyenda">
                    <a href="{{ route('book.create') }}" class="ctaAdd">Añadir Libro</a>
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
                @foreach ($books as $book)
                <tr class="row">
                    <td class="content-list">{{$book->id}}</td>
                    <td class="content-list">{{$book->title}}</td>
                    <td class="content-list">{{$book->editorial}}</td>
                    <td class="content-list">{{$book->author}}</td>
                    <td class="content-list">{{$book->edition}}</td>
                    @if ($book->disponible)
                        <td class="content-list">
                        <span class="libro-disponible">Disponible</span>
                        </td>
                        <td class="content-list">
                            <div class="center-items">
                                <a href="{{ route('book.edit', $book->id)}}" class="ctaImg">
                                    <img src="{{ asset('assets/img/details.svg')}}" alt="" srcset="">
                                </a>
                            </div>
                        </td>
                
                        
                    @else
                        
                    <td class="content-list">
                        <span class="error">No disponible</span>
                    </td>
                    <td class="content-list">
                        <div class="center-items">
                            <a href="{{ route('book.edit', $book->id)}}" class="ctaImg">
                                <img src="{{ asset('assets/img/details.svg')}}" alt="" srcset="">
                            </a>
                        </div>
                    </td>
                    @endif
                </tr>
                    
                @endforeach
                    </tbody>
            </table>
        </section>
    </main>
    
@endsection