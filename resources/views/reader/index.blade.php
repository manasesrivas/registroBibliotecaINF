@extends('layouts.base')




@section('content')
<header>
    <h1 class="title-page">Lectores</h1>
    @include('layouts._partials.menu')
</header>
<main>
    <section class="container background_filter">
        <a href="{{ route('reader.create') }}" class="ctaAdd">Añadir Lector</a>
        <table>
            <thead>
                <tr>
                    <th class="content-list">ID</th>
                    <th class="content-list">nombres</th>
                    <th class="content-list">apellidos</th>
                    <th class="content-list">año</th>
                    <th class="content-list">especialidad</th>
                    <th class="content-list">seccion</th>
                    <th class="content-list">telefono</th>
                    <th class="content-list">libros leidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $reader)
                    
                <tr class="row"> 
                    <td class="content-list">{{$reader->id}}</td>
                    <td class="content-list">{{$reader->name}}</td>
                    <td class="content-list">{{$reader->lastName}}</td>
                    <td class="content-list">{{$reader->year}}</td>
                    <td class="content-list">{{$reader->especialidad}}</td>
                    <td class="content-list">{{$reader->seccion}}</td>
                    <td class="content-list">{{$reader->number}}</td>
                    <td class="content-list"> {{$reader->loans->count()}} </td>
                    <td class="content-list center-items">
                        {{-- <a href="{{ route('loan.create', $reader->id)}}" class="cta">Crear Prestamo</a> --}}
                        <a href="{{ route('reader.edit', $reader->id) }}"><img src="" class="ctaImg"></a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </section>

</main>
@endsection
 