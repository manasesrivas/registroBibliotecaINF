@extends('layouts.base')

@section('content')
@include('layouts._partials.modal')
<header>
    
    @include('layouts._partials.menu')

</header>
<main>
    <h1 class="title-page">Prestamos</h1>
    <section class="container background_filter">
        <div class="container-row">
            <a href="{% url 'readers' %}" class="ctaAdd">Crear Prestamo</a>
            <label for="" class="style-label">libros no devueltos: 343 </label>
            <button class="button_modal">Filtros</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="content-list">ID</th>
                    <th class="content-list">lector</th>
                    <th class="content-list">libro</th>
                    <th class="content-list">autor</th> 
                    <th class="content-list">fecha de salida</th>
                    <th class="content-list">fecha de entrega</th>
                    <th class="content-list">detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    
                <tr class="disponible">
                    <td class="content-list">{{$loan->id}}</td>
                    <td class="content-list">{{$loan->idLector-?nombres}}</td>
                    <td class="content-list">{{$loan->idLibro->titulo}}</td>
                    <td class="content-list">{{$loan->idLibro->autor}}</td>
                    <td class="content-list">{{$loan->loanDate}}</td>
                    @if (loan->comeBackDate)
                    <td class="content-list">{{loan->comeBackDate}}</td>
                    <td class="content-list">
                        <div class="center-items">
                            <a href="{{ route('loan.edit', $loan->id)}}" class="ctaImg">
                                <img src="" alt="">
                            </a>
                        </div>
                    </td>
                    @else
                    <td class="content-list"> <span class="error">No devulto</span> </td>
                    <td class="content-list">
                        <form action="" method="POST" class="center-items">
                            @csrf
                            <button class="button-cta">Devuleto</button>
                            <a href="{{ route('loan.edit', $loan->id)}}" class="">
                                <img src="" alt="" class="ctaImg">
                            </a>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </section>
</main>

<script src="{{ route('assets.js.modal') }}"></script>


@endsection