@extends('layouts.base')

@section('content')
<header>
    <h1 class="title-page__addReader">Añadir Lector</h1>
<div class="nav">
    <ul class="nav-box">
        <li >
            <a href="{{ route('reader.index') }}" class="nav-box__items item-menu-activate">Volver</a>
        </li>
    </ul>
</div>
</header>
<div class="div-container-addForm background_filter"> 
    
    <form method="POST" action="{{ route('reader.store')}}" class="container-addForm background_filter">
        @csrf
        <div class="content">
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Nombres</label>
                <div class="border">
                    <input type="text" name="name" placeholder="Nombres" id="" class="container-addForm--inputs__input" required>
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Apellidos</label>
                <div class="border">
                    <input type="text" name="lastName" id="" placeholder="Apellidos" class="container-addForm--inputs__input" required>
                </div>
            </div>
            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Año</label>
                <div class="border">
                    <select name="year" id="YEAR" class="container-addForm--inputs__input">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="container-addForm--inputs">
                <label for="" class="container-addForm--inputs__label">Especialidad</label>
                <div class="border">
                    <select name="especialidad" id="especialidad" class="container-addForm--inputs__input" required>
                        <option value="" disabled selected>Especialidad</option>
                        <option value="Desarrollo de software">Desarrollo de software</option>
                        <option value="Logistica y aduana">Logistica y aduana</option>
                        <option value="General">General</option>
                        <option value="Serviempresa">Serviempresa</option>
                        <option value="Administrativo contable">Administrativo contable</option>
                        <option value="Docente">Docente</option>
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
            <button class="container-form__button color-update">crear</button>
        </div>
    </form>
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
@endsection