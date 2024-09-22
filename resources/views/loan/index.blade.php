@extends('layouts.base')

@section('content')
@include('layouts._partials.modal')
<header>
    
    <h1 class="title-page">Prestamos</h1>
    @include('layouts._partials.menu')

</header>
<main>
    <section class="container background_filter">
        <div class="container-row">
            <a href="{% url 'readers' %}" class="ctaAdd">Crear Prestamo</a>
            <label for="" class="style-label">libros no devueltos: {{$pendientes}} </label>
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
                    <td class="content-list">{{$loan->reader->name}}</td>
                    <td class="content-list">{{$loan->book->title}}</td>
                    <td class="content-list">{{$loan->book->author}}</td>
                    <td class="content-list">{{$loan->prestamo_realizado}}</td>
                    @if ($loan->estado)
                    <td class="content-list"> <span class="error">No devulto</span> </td>
                    <td class="content-list">
                        <a href="{{route("loan.loanComeBack", $loan->id)}}" class="cta">Devuleto</a>
                        <a href="{{ route('loan.edit', $loan->id)}}" class="">
                            <img src="" alt="" class="ctaImg">
                        </a>
                    </td>
                    @else
                    <td class="content-list">{{$loan->prestamo_completado}}</td>
                    <td class="content-list">
                        <div class="center-items">
                            <a href="{{ route('loan.edit', $loan->id)}}" class="ctaImg">
                                <img src="" alt="">
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

{{-- <script src="{{ route('assets.js.modal') }}"></script> --}}
<script src="">
    const button = document.querySelector('.button_modal')
const button_x = document.querySelector('.x-modal')
const modalContainer = document.querySelector('.modal-container')
const modal = document.querySelector('.modal')

button.addEventListener('click', () => {
    modalContainer.classList.toggle('mostrar-modal-container')
    modal.classList.toggle('mostrar-modal')

})

button_x.addEventListener('click', () => {
    modalContainer.classList.toggle('mostrar-modal-container')
    modal.classList.toggle('mostrar-modal')
})

const checkDocente = document.querySelector('.check-docentes')
const checkEstudiante = document.querySelector('.check-estudiantes')
const checkTodos = document.querySelector('.check-todos')
const selectsForStudents = document.querySelectorAll('.selects-for-students')
const checkTodosEstudiantes = document.querySelector('.todos-los-estudiantes')

const disableStuden = (state) => {
    selectsForStudents.forEach(select => {
            select.disabled = state
            checkTodosEstudiantes.disabled = state      
    })
}


checkDocente.addEventListener('change', () => {
    let state = checkDocente.checked
    checkEstudiante.checked = (state) ? false : true
    checkTodos.checked = false
    disableStuden(state)
})
checkEstudiante.addEventListener('change', () => {
    let state = checkEstudiante.checked
    checkDocente.checked = (state) ? false : true
    checkTodos.checked = false
    disableStuden(!state)
})

checkTodos.addEventListener('change', () => {
    checkEstudiante.checked = false
    checkDocente.checked = false
    disableStuden(true)
})

checkTodosEstudiantes.addEventListener('change', () => {
    selectsForStudents.forEach(select => {
        select.disabled = checkTodosEstudiantes.checked    
    })

})
</script>


@endsection