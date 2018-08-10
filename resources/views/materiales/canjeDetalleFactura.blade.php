@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Detalle Canje Materiales <strong>#{{ $canje->id }} </strong> </h2>
                <h4 class="text-info"><i class="fas fa-user-tie"></i> Cliente: {{ $canje->cliente->nombre_completo }}</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-secondary mb-3" style="max-width: 40rem;">
                    <div class="card-header"><h5><strong>Información</strong></h5></div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-coins"> Total Eco-monedas : </i>
                                <span id="total_eco_monedas" class="badge badge-info badge-pill">{{ $canje->total_eco_monedas }}</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-calendar-alt"> Fecha Emitida: </i>
                                <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $canje->fecha_canje }}</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-building"> Centro Acopio: </i>
                                <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $canje->centroAcopio->nombre }}</span>
                            </a>
                            {{--<a href="#" class="list-group-item list-group-item-action">--}}
                                {{--<i class="fas fa-user-circle"></i> Usuario: </i>--}}
                                {{--<span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $canje->usuario->name }}</span>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-secondary mb-3" style="max-width: 40rem;">
                    <div class="card-header"><h5 class="text-success">Detalles</h5></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Material</th>
                                <th scope="col">Valor Eco-Moneda</th>
                                <th scope="col">Cantidad Material</th>
                                <th scope="col">Sub-Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(json_decode($canje->detalles) as $detalle)
                                {{--{{dd($detalle)}}--}}
                                <tr>
                                    <th scope="row">{{$detalle->nombre_material}}</th>
                                    <td>{{$detalle->valor_ecomoneda}}</td>
                                    <td>{{$detalle->cantidad_material}}</td>
                                    <td>{{$detalle->total_valor_item}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">

                <a href="{{ route('eco.all_canjes_materiales_usuario') }}" class="btn btn-outline-info"><i class="fas fa-arrow-circle-left"></i> Ver Canjes</a>

            </div>
        </div>


    </div>




@endsection