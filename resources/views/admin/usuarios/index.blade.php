@extends('layouts.master')
@section('titulo','Gestión Usuarios')
@section('contenido')
@if($mensaje = Session::get('mensaje'))
  <div class="alert alert-{{$mensaje['tipo_mensaje']}}" role="alert">
    {!! $mensaje['msg'] !!}
    <button type="button" class="close" data-dismiss="alert" areia-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

</br>

<div class="row">
    <div class="col-md-12">
        <a href="{{ route('usuario.registro') }}" class="btn btn-primary btn-lg">Nuevo Usuario</a>
    </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Centro Acopio</th>
      <th scope="col">Estado</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
  @foreach($usuarios as $usuario)
  <tr>
    <td>{{ $usuario->name }}</td>
    <td>{{ $usuario->email }}</td>
    <td>{{ $usuario->centroAcopio()->first()->nombre }}</td>
    <td>{{ $usuario->estado }}</td>
    <td>Editar</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
