@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Billetera Virtual</h2>
            <p class="text-info"><i class="fas fa-user-tie"></i> Cliente: {{ $cliente->nombre_completo  }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-coins"> Eco-monedas Disponibles: </i>
                    <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $cliente->eco_monedas_disponibles }}</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-line"> Eco-monedas Gastadas: </i>
                    <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $cliente->eco_monedas_gastadas }}</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-donate"></i> Eco-monedas Generadas en total: </i>
                    <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ ($cliente->eco_monedas_gastadas + $cliente->eco_monedas_disponibles) }}</span>
                </a>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                <div class="card-header">Canje de Materiales Facturas</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">id Factura</th>
                            <th scope="col">Fecha emitida</th>
                            <th scope="col">Total Ecomonedas</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($canjes_materiales as $canje)
                            <tr>
                                <th scope="row">{{$canje->id}}</th>
                                <td>{{$canje->fecha_canje}}</td>
                                <td>{{$canje->total_eco_monedas}}</td>
                                <td><button type="button" class="btn btn-outline-success">Ver Detalles</button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8">
                            {{ $canjes_materiales->links() }}
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-info">Ver todos</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                <div class="card-header">Canje de Cupones</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">id Factura</th>
                            <th scope="col">Fecha emitida</th>
                            <th scope="col">Total Ecomonedas</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">123123</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><button type="button" class="btn btn-outline-success">Ver Detalles</button></td>
                        </tr>
                        <tr>
                            <th scope="row">123124</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td><button type="button" class="btn btn-outline-success">Ver Detalles</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-outline-info">Ver todos</button>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card border-secondary mb-3" style="max-width: 20rem;">
                <div class="card-header">Informacion Adicional</div>
                <div class="card-body">
                    <h4 class="card-title">Interesante</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>


</div>






@endsection