@extends('layouts.master')
@section('titulo','Gestión Materiales')
@section('contenido')
</br>
@if(Session::has('info'))
<div class="row">
  <div class="col-md-12">
    <p class="alert alert-info">{{Session::get('info')}}</p>
  </div>
</div>
@endif

<div class="row">
  <div class="col-md-12">
    <a href="{{route('materiales.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Nuevo Material</a>
  </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Valor EcoMonedas</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($materiales as $mat)
    <tr>
      <th scope="row">{{$mat->nombre}}</th>
      <th scope="row">{{$mat->valor_ecomoneda}}</th>
      <td><a class="btn btn-outline-primary" href="{{route('materiales.edit',['mat'=>$mat->id])}}"><i class="far fa-edit"></i> Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12 text-center">
    {{$materiales->links()}}
  </div>
</div>
</br>
@endsection
