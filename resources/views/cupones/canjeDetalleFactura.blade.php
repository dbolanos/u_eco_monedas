@extends('layouts.master')
@section('titulo','Detalle Canje')
@section('contenido')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Detalle Canje Cupón <strong>#{{ $canje->id }} </strong> </h2>
                <h4 class="text-info"><i class="fas fa-user-tie"></i> Cliente: {{ $canje->cliente->nombre_completo }}</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-secondary mb-3" style="max-width: 40rem;">
                    <div class="card-header"><h5 class="text-success">Información</h5></div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-coins"></i> Total Eco-monedas:
                                <span id="total_eco_monedas" class="badge badge-info badge-pill">{{ $carrito->totalPrice }}</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-calendar-alt"></i> Fecha Emisión:
                                <span id="total_eco_monedas" class="badge badge-primary badge-pill">{{ $canje->created_at }}</span>
                            </a>
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
                                <th scope="col">Cantidad</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Valor Eco-Moneda</th>
                                <th scope="col">Sub-Total</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($carrito->items as $item)
                                <tr>
                                    <th scope="row">{{ $item['qty'] }}</th>
                                    <td>{{ $item['item']['nombre'] }}</td>
                                    <td>{{ $item['item']['descripcion'] }}</td>
                                    <td>{{ $item['item']['cantidad_ecomonedas'] }}</td>
                                    <td>{{ $item['price'] }}</td>
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

                <a href="{{ route('eco.all_canjes_cupones_usuario') }}" class="btn btn-outline-info"><i class="fas fa-arrow-circle-left"></i> Ver Canjes</a>

            </div>
        </div>


    </div>




@endsection
