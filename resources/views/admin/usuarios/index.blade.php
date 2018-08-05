@extends('layouts.master')
@section('titulo','Gestión Usuarios')
@section('contenido')
    @if($mensaje = Session::get('mensaje'))
        <div class="alert alert-{{$mensaje['tipo_mensaje']}}" role="alert">
            {!! $mensaje['msg'] !!}
            <button type="button" class="close" data-dismiss="alert" areia-label="Close"><span
                        aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center"><h2>Usuarios</h2></div>
                    </div>
                    {{--Table--}}
                    <table class="table table-hover">
                        <thead>
                        <tr class="table-success">
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
                    {{--End-Table--}}
                </div>
            </div>
        </div>
    </div>
@endsection
