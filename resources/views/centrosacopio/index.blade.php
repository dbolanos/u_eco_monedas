@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
</br>

<div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a href="#" class="list-group-item list-group-item-action active">Provincias</a>
      <a href="#" class="list-group-item list-group-item-action">Provincia</a>
    </div>
  </div>

  @foreach ($centros as $ca)
  <div class="col-8">
    <div class="card border-success mb-3" style="max-width: 20rem;">
      <div class="card-header">{{$ca->provincia->nombre}}</div>
      <div class="card-body">
        <h4 class="card-title">{{$ca->nombre}}</h4>
        <p class="card-text">{{$ca->direccion_exacta}}</p>
        <p class="card-text">{{$ca->telefono}}</p>
      </div>
    </div>
  </div>
  @endforeach

</div>

</br>
@endsection
