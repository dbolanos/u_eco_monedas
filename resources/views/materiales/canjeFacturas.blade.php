@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Canje de Materiales Facturas</h2>
                <h4 class="text-info"><i class="fas fa-user-tie"></i> Cliente: {{ $cliente->nombre_completo  }}</h4>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="card border-secondary mb-3" style="max-width: 80rem;">
                    <div class="card-header"><h5 class="text-success">Canje de Materiales Facturas</h5></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">id Factura</th>
                                <th scope="col">Fecha emitida</th>
                                <th scope="col">Total Ecomonedas</th>
                                <th scope="col">Centro Acopio</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($canjes_materiales as $canje)
                                <tr>
                                    <th scope="row">{{$canje->id}}</th>
                                    <td>{{$canje->fecha_canje}}</td>
                                    <td>{{$canje->total_eco_monedas}}</td>
                                    <td>{{$canje->centroAcopio->nombre}}</td>
                                    <td><a href="{{route('eco.detalle_canjes_materiales', $canje->id)}}" class="btn btn-outline-success">Ver Detalles</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10">
                                {{ $canjes_materiales->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">

                <a href="{{ route('bv.index') }}" class="btn btn-outline-info"><i class="fas fa-arrow-circle-left"></i> Ver Billetera Virtual</a>

            </div>
        </div>

    </div>




@endsection