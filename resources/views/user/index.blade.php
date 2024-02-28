@extends('layouts.base')
@section('content')
<main class="center_main">
        <form method="POST" class="container-form background_filter" action="{{ route('signin') }}">
            <h1 class="title-page__form">Iniciar Sesión</h1>
            <div class="container-form--inputs">
                <div class="fondo-inputs">
                    <input type="text" name="name" id="username" required autofocus placeholder=" " value="{{ old('name') }}" class="container-form--inputs__input" autofocus>
                    <label for="" class="container-form--inputs__label">Nombre de usuario</label>
                    <span class="barra"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="user"><path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3-3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path></svg>
                </div>
            </div>
            <div class="container-form--inputs">
                <div class="fondo-inputs">
                    <input type="password" name="password" id="password" required autofocus placeholder=" " value="" class="container-form--inputs__input" id="password">
                    <label for="" class="container-form--inputs__label">Contraseña</label>
                    <span class="barra"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="lock buttons"><path id="img" d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm4 10.723V20h-2v-2.277a1.993 1.993 0 0 1 .567-3.677A2.001 2.001 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723z"></path></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="open-lock buttons"><path d="M18 10H9V7c0-1.654 1.346-3 3-3s3 1.346 3 3h2c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-7.939 5.499A2.002 2.002 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723V20h-2v-2.277a1.992 1.992 0 0 1-.939-2.224z"></path></svg>
                </div>
            </div>
            <div class="container-form--inputs">
                <p>¿No tienes una cuenta? <a href="{{ route('viewCreateUser') }}" class="container-form__button-cta">¡Click aqui!</a></p>
            </div>
            <div class="container-form--inputs center-items">
                @csrf
                <button class="container-form__button">signin</button>
            </div>
        </form>
    </main>
    <script src="{{ asset('assets/js/animation.js') }}"></script>

@endsection
{{-- 
@if (Auth::check())
    
@endif --}}
