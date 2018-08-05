@extends('layouts.master')
@section('titulo','Gestión Centros')
@section('contenido')

@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
@endif

</br>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('centros.create')}}" class="btn btn-primary btn-lg">Nuevo Centro de Acopio</a>
    </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Provincia</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($centros as $ca)
    <tr>
      <th scope="row">{{$ca->nombre}}</th>
      <th scope="row">{{$ca->provincia->nombre}}</th>
      <td><a href="{{route('centros.edit',['id' => $ca->id])}}">Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</br>
@endsection
