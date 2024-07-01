@extends('layouts.base')

@section('content')
<header>
    <h1 class="title-page__addReader">Detalles de {{$reader->name}} </h1>
<div class="nav">
    <ul class="nav-box">
        <li >
            <a href="{{ route('reader.index') }}" class="nav-box__items item-menu-activate">Volver</a>
        </li>
    </ul>
</div>
</header>
<main>

    <div class="div-container-addForm background_filter"> 
        <form action="{{ route('reader.destroy', $reader->id) }}" method="POST" class="align-end">
            @method('DELETE')
            @csrf
            <button class="container-form__button color-delete center-items">
                Eliminar            
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
            </button>
        </form>
        <form method="POST" action="" class="container-addForm">
            @csrf
            <div class="content">
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Nombres</label>
                    <div class="border">
                        <input type="text" name="name" value="{{$reader->name}}" placeholder="Nombres" id="" class="container-addForm--inputs__input" required>
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Apellidos</label>
                    <div class="border">
                        <input type="text" name="lastName" value="{{$reader->lastName}}" id="" placeholder="Apellidos" class="container-addForm--inputs__input" required>
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Año</label>
                    <div class="border">
                        <select name="year" id="year" class="container-addForm--inputs__input">
                            <option value="1" @if ($reader->year == 1) selected @endif>1</option>
                            <option value="2" @if ($reader->year == 2) selected @endif>2</option>
                            <option value="3" @if ($reader->year == 3) selected @endif>3</option>
                        </select>
                    </div>
                </div>
    
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Especialidad</label>
                    <div class="border">
                        <select name="especialidad" id="especialidad" class="container-addForm--inputs__input" data-especialidad="{{$reader->especialidad}}" required>
                            <option value="" disabled selected>Especialidad</option>
                            <option value="Desarrollo de software" @if ($reader->especialidad == "Desarrollo de software") selected @endif>Desarrollo de software</option>
                            <option value="Logistica y aduana" @if ($reader->especialidad == "Logistica y aduana") selected @endif>Logistica y aduana</option>
                            <option value="General" @if ($reader->especialidad == "General") selected @endif>General</option>
                            <option value="Serviempresa" @if ($reader->especialidad == "Serviempresa") selected @endif>Serviempresa</option>
                            <option value="Administrativo contable" @if ($reader->especialidad == "Administrativo contable") selected @endif>Administrativo contable</option>
                            <option value="Docente" @if ($reader->especialidad == "Docente") selected @endif>Docente</option>
                        </select>
                    </div>
                </div>
                
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Seccion</label>
                    <div class="border">
                        <select name="seccion" id="seccion" class="container-addForm--inputs__input">
    
                        </select>
                    </div>
                </div>
    
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Email</label>
                    <div class="border">
                        <input type="email" name="email" id="" placeholder="Email" class="container-addForm--inputs__input">
    
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Telefono</label>
                    <div class="border">
                        <input type="number" name="phoneNumber" placeholder="Telefono" id="" class="container-addForm--inputs__input">
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Direccion</label>
                    <div class="border">
                        <input type="text" name="address" id="" placeholder="Direccion" class="container-addForm--inputs__input">
                    </div>
                </div>
            </div>
            <div class="container-addForm--inputs">
                <button class="container-form__button color-update center-items">Modificar</button>
            </div>
        </form>
        <div class="align-end">
            <p class="textOpenModal">Libros leidos 32 </p>
        </div>
        {{-- <section class="">
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
                    {% for book in books %}
                    <tr class="row">
                        <td class="content-list">{{book.idLibro.id}}</td>
                        <td class="content-list">{{book.idLibro.titulo}}</td>
                        <td class="content-list">{{book.idLibro.editorial}}</td>
                        <td class="content-list">{{book.idLibro.autor}}</td>
                        <td class="content-list">{{book.idLibro.edicion}}</td>
                        {% if book.estado %}
                        <td class="content-list">
                            <span class="error">Libro no devuelto</span>
                        </td>
                        <td class="content-list">
                            <div class="center-items">
                                <a href="{% url 'loanDetails' book.id %}" class="ctaImg">
                                    <img src="{% static 'img/details.svg' %}" alt="" srcset="">
                                </a>
                            </div>
                        </td>
                        {% else %}
                        <td class="content-list">
                            <span class="libro-disponible">Libro devuelto</span>
                        </td>
                        <td class="content-list">
                            <div class="center-items">
                                <a href="{% url 'loanDetails' book.id %}" class="ctaImg">
                                    <img src="{% static 'img/details.svg' %}" alt="" srcset="">
                                </a>
                            </div>
                        </td>
                        {% endif %}
                    </tr>
                    {% endfor %}
                    </tbody>
            </table>
        </section> --}}
    </div>
    
<script>
    const selectEspecialidad = document.getElementById("especialidad")
    const selectSeccion = document.getElementById('seccion')
    const selectYear = document.getElementById('year')
    let stateDisabled = false
    
    const secciones = [
        'A',
        'B',
        'C',
        'D',
        'E'
    ]

    letghtSeccesIndice = {
        "Desarrollo de software":1,
        "Logistica y aduana":1,
        "General":2,
        "Serviempresa":1,
        "Administrativo contable":5,
        "Docente": 0
    }


    window.addEventListener('load', () => {
        if(selectEspecialidad.getAttribute('data-especialidad') == 'Docente'){
            selectYear.disabled =  true
            selectSeccion.disabled = true
        }
        for(let i=0; i < letghtSeccesIndice[selectEspecialidad.value]; i++){
            let seccion = secciones[i]
            let option = `<option value="${seccion}">${seccion}</option>`
            selectSeccion.insertAdjacentHTML('beforeend', option)
        }
    })
    
    selectEspecialidad.addEventListener("change", () => {

        if(selectEspecialidad.value === 'Docente'){
            stateDisabled = true
        }
        else{

            stateDisabled = false

            for (let j = selectSeccion.options.length; j >= 0; j--) {
                selectSeccion.remove(j);
            }   
        

            for(let i=0; i < letghtSeccesIndice[selectEspecialidad.value]; i++){
                let seccion = secciones[i]
                let option = `<option value="${seccion}">${seccion}</option>`
                selectSeccion.insertAdjacentHTML('beforeend', option)
            }
        }
        selectSeccion.disabled = stateDisabled
        selectYear.disabled =  stateDisabled

    })

    
    
</script>
</main>
@endsection