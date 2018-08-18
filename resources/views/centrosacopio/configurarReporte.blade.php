@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
</br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <form action="{{route('eco.reporte-centros')}}" method="POST">
            <div class="card border-primary mb-3" style="max-width: 40rem;">
                <div class="card-header">Configurar Reporte Centro Acopio</div>
                <div class="card-body">
                    <h4 class="card-title">Fechas Inicio - Final <i class="fas fa-calendar-alt"></i></h4>
                        @csrf
                        <fieldset>
                            <div class="form-group row">
                                <label for="fecha_inicial" class="col-sm-2 col-form-label"><span class="badge badge-info">Fecha Inicial</span> </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control-plaintext" id="fecha_inicial" name="fecha_inicial" min="2018-01-01" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha_final" class="col-sm-2 col-form-label"><span class="badge badge-info">Fecha Final</span> </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control-plaintext" id="fecha_final" name="fecha_final" min="2018-01-01" >
                                </div>
                            </div>
                        </fieldset>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-alt"> Generar Reporte</i></button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection
