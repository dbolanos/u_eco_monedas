@extends('layouts.master')
@section('titulo','EcoMonedas Inicio')
@section('contenido')
</br>
</br>
<div class="wrapper">
    <div class="error-spacer"></div>
    <div role="main" class="main">

        <h1>Restricción Acceso</h1>

        <h2>Error 403!!</h2>

        <hr>

        <h3>Que significa esto?</h3>

        <p>
            No se pudo encontrar la página requerida, debido a que no posee los permisos correctos.
            Por favor consulte con su administrador.
        </p>

        <p>
            <a href="{{{ URL::to('/') }}}">Página principal</a>
        </p>
    </div>
</div>
<link rel="stylesheet" href="{{ URL::to('css/error403.css') }}" />
@endsection