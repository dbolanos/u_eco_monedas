@extends('layouts.master')
@section('titulo','Gestión Cupones')
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
        <a href="{{route('cupones.create')}}" class="btn btn-primary btn-lg">Nuevo Cupón</a>
    </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cupones as $cup)
    <tr>
      <th scope="row">{{$cup->nombre}}</th>
      <td><a href="{{route('cupones.edit',['cup'=>$cup->id])}}">Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
