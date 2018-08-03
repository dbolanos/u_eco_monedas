@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
</br>

<div class="row">
  @foreach ($centros as $ca)
  <div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
      <div class="card-header">{{$ca->provincia->nombre}}</div>
        <div class="card-body">
          <h4 class="card-title">{{$ca->nombre}}</h4>
          <p class="card-text">Dirección: {{$ca->direccion_exacta}}</p>
          <p class="card-text">Tel: {{$ca->telefono}}</p>
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
