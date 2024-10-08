@extends('layouts.app-master')

@section('content')
    <div class=" p-5 rounded">
        @auth
        <h1>Bienvenido</h1>
        <p class="lead">En esta pantalla puedes agregar secciones para Noticias, Eventos y Resoluciones</p>
        @endauth

        @guest
        <h1>Bienvenido</h1>
        <p class="lead">Inicia sesion con tu usuario.</p>
        @endguest
    </div>
@endsection