@extends('layouts.master')
@section('titulo','Cupones')
@section('contenido')
</br>
<div class="row">
  @foreach ($cupones as $cup)
  <div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
      <div class="card-header"><h3>{{$cup->nombre}}</h3></div>
        <div class="card-body">
          <h4 class="card-title">Valor: {{$cup->cantidad_ecomonedas}}</h4>
          <p class="card-text">{{$cup->descripcion}}</p>
          <img src="{{asset('storage/'.$cup->ruta_imagen)}}" alt"{{$cup->nombre}}" class="img-thumbnail img-fluid" />
        </div>
    </div>
  </div>
  @endforeach
</div>
</br>
@endsection
