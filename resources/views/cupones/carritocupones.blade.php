@extends('layouts.master')
@section('titulo','Cupones')
@section('contenido')
</br>
<legend><i class="fas fa-clipboard-list"></i> Resumen del Carrito de Compras</legend>

@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
@endif

@if(Session::has('error'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-danger">{{Session::get('error')}}</p>
            </div>
        </div>
@endif

  @if(Session::has('cart'))

      <div class="row">
          <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <ul class="list-group">
                  @foreach($cupones as $cupon)
                          <li class="list-group-item">
                              <span class="badge">{{ $cupon['qty'] }}</span>
                              <strong>{{ $cupon['item']['nombre'] }}</strong>
                              <span class="badge badge-pill badge-success"><i class="fas fa-coins"></i> {{ $cupon['price']}}</span>
                              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acción
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#"><i class="fas fa-minus-square"></i> Eliminar Unidad</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Eliminar Todo</a>
                                  </div>
                                </div>
                              </div>
                          </li>
                  @endforeach
              </ul>
          </div>
      </div>
    </br>
      <div class="row">
          <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <strong><i class="fas fa-hand-holding-usd"></i> Total Eco-Monedas: {{ $totalPrice }}</strong>
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <a type="button" href="{{route('eco.checkout')}}" class="btn btn-success">Checkout</a>
          </div>
      </div>
  @else
      <div class="row">
          <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <h2>¡No hay cupones en el carrito!</h2>
          </div>
      </div>
  @endif

@endsection
