{{-- <form method="GET" class="search-box">
    <input type="text" name="search" placeholder=" " value="" class="search-box__input">
    <label for="" class="search-box__label">Buscar</label>
    <button class="search-box__button">Buscar</button>
</form> --}}
<nav class="nav">
    <ul class="nav-box">
        <li >
            <a href="{{ route('loan.index') }}" class="nav-box__items @if(Route::currentRouteName()=="loan.index") item-menu-activate @endif">Prestamos</a>
        </li>
        <li >
            <a href="{{ route('reader.index') }}" class="nav-box__items @if(Route::currentRouteName()=="reader.index") item-menu-activate @endif">Lectores</a>
        </li>
        <li >
            <a href="{{ route('book.index') }}" class="nav-box__items @if(Route::currentRouteName()=="book.index") item-menu-activate @endif">Libros</a>
        </li>
        <li >
            <a href="#" class="nav-box__items">Cerrar Sesion</a>
        </li>
    </ul>
</nav>
