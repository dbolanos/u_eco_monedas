@extends('layouts.master')
@section('titulo','Materiales')
@section('contenido')
</br>

<div class="row">
  @foreach ($materiales as $mat)
  <div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
      <div class="card-header">{{$mat->nombre}}</div>
        <div class="card-body">
          <h4 class="card-title">Valor: {{$mat->valor_ecomoneda}}</h4>
          <p class="card-text" style="color:{{$mat->color}}">Color</p>
          <img src="{{asset('storage/'.$mat->ruta_imagen)}}" alt"{{$mat->nombre}}" class="img-thumbnail img-fluid" />
        </div>
    </div>
  </div>
  @endforeach
</div>


</br>
@endsection
