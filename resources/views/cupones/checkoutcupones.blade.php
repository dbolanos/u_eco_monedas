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

<form action="{{ route('eco.checkout') }}" method="post" id="checkout-form">
  <div class="card border-success mb-3" style="max-width: 60rem;">
    <div class="card-header"><h2><i class="fas fa-info-circle"></i> Detalle de la orden</h2></div>
    <div class="card-body">
      <h4 class="card-title">Total de EcoMonedas: <i class="fas fa-coins"></i> {{ $total }}</h4>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Cantidad</th>
            <th scope="col">Nombre Cupón</th>
            <th scope="col">SubTotal EcoMonedas</th>
          </tr>
        </thead>
        @foreach($cupones as $cupon)
        <tbody>
          <tr class="table-success">
            <th scope="row">{{ $cupon['qty'] }}</th>
            <td>{{ $cupon['item']['nombre'] }}</td>
            <td>{{ $cupon['price']}}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
    {{ csrf_field() }}
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><button type="submit" class="btn btn-success"><i class="fas fa-check-double"></i> Canjear</button></li>
    </ul>
  </div>
</form>
@endsection
