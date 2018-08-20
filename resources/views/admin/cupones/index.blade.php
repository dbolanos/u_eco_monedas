@extends('layouts.master')
@section('titulo','Gestión Cupones')
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
        <a href="{{route('cupones.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Nuevo Cupón</a>
    </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad EcoMonedas</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cupones as $cup)
    <tr>
      <th scope="row">{{$cup->nombre}}</th>
      <td>{{$cup->cantidad_ecomonedas}}</td>
      <td><a class="btn btn-outline-primary" href="{{route('cupones.edit',['cup'=>$cup->id])}}"><i class="far fa-edit"></i> Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12 text-center">
    {{$cupones->links()}}
  </div>
</div>
</br>
@endsection
