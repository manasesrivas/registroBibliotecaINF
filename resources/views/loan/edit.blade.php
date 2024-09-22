@extends('layouts.base')

@section('content')
<header>
    <h1 class="title-page__addReader">Detalles de {{$loan->reader->name}}  </h1>

    
<div class="nav">
    <ul class="nav-box">
        <li >
            <a href="{{ route('loan.index') }}" class="nav-box__items item-menu-activate">Volver</a>
        </li>
    </ul>
</div>
</header>
<main>

    <div class="div-container-addForm background_filter"> 
        <form action="{{ route('reader.destroy', $loan->reader->id) }}" method="POST" class="align-end">
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
                        <input type="text" name="name" value="{{$loan->reader->name}}" placeholder="Nombres" id="" class="container-addForm--inputs__input" required>
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Apellidos</label>
                    <div class="border">
                        <input type="text" name="lastName" value="{{$loan->reader->lastName}}" id="" placeholder="Apellidos" class="container-addForm--inputs__input" required>
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Año</label>
                    <div class="border">
                        <select name="year" id="year" class="container-addForm--inputs__input">
                            <option value="1" @if ($loan->reader->year == 1) selected @endif>1</option>
                            <option value="2" @if ($loan->reader->year == 2) selected @endif>2</option>
                            <option value="3" @if ($loan->reader->year == 3) selected @endif>3</option>
                        </select>
                    </div>
                </div>
    
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Especialidad</label>
                    <div class="border">
                        <select name="especialidad" id="especialidad" class="container-addForm--inputs__input" data-especialidad="{{$loan->reader->especialidad}}" required>
                            <option value="" disabled selected>Especialidad</option>
                            <option value="Desarrollo de software" @if ($loan->reader->especialidad == "desarrollo de software") selected @endif>Desarrollo de software</option>
                            <option value="Logistica y aduana" @if ($loan->reader->especialidad == "Logistica y aduana") selected @endif>Logistica y aduana</option>
                            <option value="General" @if ($loan->reader->especialidad == "General") selected @endif>General</option>
                            <option value="Serviempresa" @if ($loan->reader->especialidad == "Serviempresa") selected @endif>Serviempresa</option>
                            <option value="Administrativo contable" @if ($loan->reader->especialidad == "Administrativo contable") selected @endif>Administrativo contable</option>
                            <option value="Docente" @if ($loan->reader->especialidad == "Docente") selected @endif>Docente</option>
                        </select>
                    </div>
                </div>
                
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Seccion</label>
                    <div class="border">
                        <select name="seccion" id="seccion" class="container-addForm--inputs__input" data-seccion="{{$loan->reader->seccion}}">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
    
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Email</label>
                    <div class="border">
                        <input type="email" name="email" id="" placeholder="Email" class="container-addForm--inputs__input" value="{{$loan->reader->email}}">
    
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Telefono</label>
                    <div class="border">
                        <input type="number" name="phoneNumber" placeholder="Telefono" id="" class="container-addForm--inputs__input" value="{{$loan->reader->phoneNumber}}">
                    </div>
                </div>
                <div class="container-addForm--inputs">
                    <label for="" class="container-addForm--inputs__label">Direccion</label>
                    <div class="border">
                        <input type="text" name="address" id="" placeholder="Direccion" class="container-addForm--inputs__input" value="{{$loan->reader->address}}">
                    </div>
                </div>
            </div>
        </form>

        <section class="">
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
                    
                    <tr class="row">
                        <td class="content-list">{{$loan->book->title}}</td>
                        <td class="content-list">{{$loan->book->author}}</td>
                        <td class="content-list">{{$loan->book->editorial}}</td>
                        <td class="content-list">{{$loan->book->tipoAdquisicion}}</td>
                        <td class="content-list">{{$loan->book->edition}}</td>
                        <td class="content-list">
                            @if ($loan->book->disponible)
                            <span class="libro-disponible">Libro devuelto</span>
                            @else
                            <span class="error">Libro no devuelto</span>
                            @endif
                        </td>
                        <td class="content-list">
                            <div class="center-items">
                                <a href="{{ route("book.edit", $loan->book->id) }}" class="ctaImg">
                                    <img src="" alt="" srcset="">
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </section> 
    </div>
   
</main>

@endsection