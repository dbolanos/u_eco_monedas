@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Billetera Virtual</h2>
            <h4 class="text-info"><i class="fas fa-user-tie"></i> Cliente: {{ $cliente->nombre_completo  }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                <div class="card-header"><h5 class="text-success">Eco-Monedas</h5></div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-coins"></i> Eco-monedas Disponibles:
                            <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $cliente->eco_monedas_disponibles }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-chart-line"></i> Eco-monedas Gastadas:
                            <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $cliente->eco_monedas_gastadas }}</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="fas fa-donate"></i> Eco-monedas Generadas en total:
                            <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ ($cliente->eco_monedas_gastadas + $cliente->eco_monedas_disponibles) }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                <div class="card-header"><h5 class="text-success">Canje de Materiales Facturas</h5></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID Canje</th>
                            <th scope="col">Fecha Emisión</th>
                            <th scope="col">Total Ecomonedas</th>
                            <th scope="col">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($canjes_materiales as $canje)
                            <tr>
                                <th scope="row">{{$canje->id}}</th>
                                <td>{{$canje->fecha_canje}}</td>
                                <td>{{$canje->total_eco_monedas}}</td>
                                <td><a href="{{route('eco.detalle_canjes_materiales', $canje->id)}}" class="btn btn-outline-success"><i class="fas fa-info-circle"></i> Ver Detalle</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('eco.all_canjes_materiales_usuario') }}" class="btn btn-outline-info"><i class="fas fa-list-alt"></i> Ver Todos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card border-secondary mb-3" style="max-width: 40rem;">
                <div class="card-header"><h5 class="text-success">Canje de Cupones</h5></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID Canje</th>
                            <th scope="col">Fecha Emisión</th>
                            <th scope="col">Total Canje</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($canjes as $canje)
                            <tr>
                              <th scope="row">{{$canje->id}}</th>
                              <td>{{$canje->created_at}}</td>
                              <td>{{$canje->cart->totalPrice}}</td>
                              <td><a href="{{route('eco.detalle_canjes_cupones', $canje->id)}}" class="btn btn-outline-success"><i class="fas fa-info-circle"></i> Ver Detalle</a></td>
                              <td><a href="{{route('eco.descargarPDF', $canje->id)}}" title="Descargar" class="btn btn-outline-info"><i class="fas fa-file-download"></i></a></td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('eco.all_canjes_cupones_usuario') }}" class="btn btn-outline-info"><i class="fas fa-list-alt"></i> Ver Todos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
