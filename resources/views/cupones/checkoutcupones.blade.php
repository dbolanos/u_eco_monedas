@extends('layouts.master')
@section('titulo','Checkout')
@section('contenido')

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

<br/>

  <div class="row">
      <div class="form-group">
          <h1>Checkout Canje Cupon</h1>

          <form action="{{ route('eco.checkout') }}" method="post" id="checkout-form">
              <div class="row">
                <h4>Total de EcoMonedas: ${{ $total }}</h4>
              </div>
              <div class="row">
                <h4>Detalle de la orden:</h4>
                <ul class="list-group">
                    @foreach($cupones as $cupon)
                            <li class="list-group-item">
                                <span class="badge">{{ $cupon['qty'] }}</span>
                                <strong>{{ $cupon['item']['nombre'] }}</strong>
                                <span class="badge badge-pill badge-success"><i class="fas fa-coins"></i> {{ $cupon['price']}}</span>
                            </li>
                    @endforeach
                </ul>
              </div>
              {{ csrf_field() }}
              <button type="submit" class="btn btn-success">Canjear</button>
          </form>
      </div>
  </div>
@endsection
