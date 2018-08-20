@extends('layouts.master')
@section('titulo','EcoMonedas Centro Acopio')
@section('contenido')
</br>
</br>
<div class="wrapper">
  <div class="error-spacer"></div>
  <div role="main" class="main">

    <h1>Centro de Acopio Deshabilitado</h1>

    <h2>Error!!</h2>

    <hr>

    <h3>Que significa esto?</h3>

    <p>
      No se pudo encontrar la página requerida, debido a que en este momento el centro de acopio no se encuentra habilitado. Por favor consulte con su administrador.
    </p>

    <p>
      <a href="{{{ URL::to('/') }}}">Página principal</a>
    </p>
  </div>
</div>
@endsection
