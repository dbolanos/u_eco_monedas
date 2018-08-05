@extends('layouts.master')
@section('titulo','Cambiar Contrasena Usuario')
@section('contenido')
@include('partials.errors')
</br>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    .cont-form {
        background: #dbe5ff;
        margin: 10px;
    }

    label {
        padding: 2px;
    }

    .glyphicon.glyphicon-lock {
        font-size: 75px;
        margin:auto;
        display: block;
    }
    .bt-cambiar{
        margin:10px;
    }

    .pass_show .ptxt:hover {
        color: #333333;
    }
</style>

@if($mensaje = Session::get('mensaje'))
    <div class="alert alert-{{$mensaje['tipo_mensaje']}}" role="alert">
        {!! $mensaje['msg'] !!}
        <button type="button" class="close" data-dismiss="alert" areia-label="Close"><span
                    aria-hidden="true">&times;</span></button>
    </div>
@endif
<form action="{{route('contrasena.usuario')}}" method="POST">
        <div class="container cont-form col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <label>Contraseña Actual</label>
                    <div class="form-group pass_show">
                        <input type="password" name="contrasena_actual" value="" class="form-control">
                    </div>
                    <label>Nueva Contraseña</label>
                    <div class="form-group pass_show">
                        <input type="password" name="nueva_contrasena" value="" class="form-control">
                    </div>
                    <label>Confirmar Contraseña</label>
                    <div class="form-group pass_show">
                        <input type="password" name="confirmar_contrasena" value="" class="form-control">
                    </div>

                </div>
                    <span class="glyphicon glyphicon-lock"></span>
            </div>
            <div class="row">
                <div class="col-sm-06">
                    @csrf
                    <button type="submit" name="btn_cambio_contra" class="btn btn-success bt-cambiar" > Cambiar Contraseña <span class="glyphicon glyphicon-ok"></span> </button>

                </div>
            </div>
        </div>

</form>
@endsection