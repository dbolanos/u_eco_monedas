@extends('layouts.master')
@section('titulo','Gestión Centros')
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
        <a href="{{route('centros.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Nuevo Centro de Acopio</a>
    </div>
</div>
</br>
<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Provincia</th>
      <th scope="col">Estado</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($centros as $ca)
    <tr>
      <th scope="row">{{$ca->nombre}}</th>
      <th scope="row">{{$ca->provincia->nombre}}</th>
        @if ($ca->estado == 1)
        <th scope="row"> Activo</th>
        @else
        <th scope="row"> Inactivo</th>
        @endif
      <td><a class="btn btn-outline-primary" href="{{route('centros.edit',['id' => $ca->id])}}"><i class="far fa-edit"></i> Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12 text-center">
    {{$centros->links()}}
  </div>
</div>
</br>
@endsection
