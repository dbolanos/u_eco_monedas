@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
</br>

<div class="row">
  @foreach ($centros as $ca)
  <div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
      <div class="card-header"><h3>{{$ca->provincia->nombre}}</h3></div>
        <div class="card-body">
          <h4 class="card-title">{{$ca->nombre}}</h4>
          <p class="fa fa-map-marker fa-2x card-text"> {{$ca->direccion_exacta}}</p>
          <p class="fa fa-phone-square fa-lg card-text"> {{$ca->telefono}}</p>
        </div>
    </div>
  </div>
  @endforeach
</div>

</br>

</div>
  <div class="row">
    <div class="col-md-12 text-center">
      {{$centros->links()}}
    </div>
  </div>
</br>

@endsection
