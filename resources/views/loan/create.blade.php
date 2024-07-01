@extends('layouts.base')
@section('content')

<header>

    <h1 class="title-page">Crear Prestamo</h1>
    
    <nav class="nav">
        <ul class="nav-box">
            <li>
                <a href="{{ route('loan.index') }}" class="nav-box__items item-menu-activate">Volver</a>
            </li>
        </ul>
    </nav>
</header>
<main>


    <section class="container background_filter">
        <table>
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
                <td class="content-list">{{$book->id}}</td>
                <td class="content-list">{{$book->title}}</td>
                <td class="content-list">{{$book->editorial}}</td>
                <td class="content-list">{{$book->author}}</td>
                <td class="content-list">{{$book->edition}}</td>
                <td class="content-list">
                    <div class="center-items">
                        <form action="{{ route('loan.store', ['idBook' => $book->id, 'idReader' => $reader->id]) }}" method="POST">
                            @csrf
                            <button class="button-cta">Prestar</button>
                        </form>
                        <a href="{{ route('book.edit', $book->id) }}" class="ctaImg">
                            <img src="" alt="" srcset="">
                        </a>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>



@endsection