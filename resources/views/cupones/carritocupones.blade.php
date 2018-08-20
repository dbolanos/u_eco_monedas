@extends('layouts.master')
@section('titulo','Cupones')
@section('contenido')
</br>
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

<div class="card border-success mb-3" style="max-width: 60rem;">
  <div class="card-header">
    <h2><i class="fas fa-clipboard-list"></i> Resumen del Carrito de Compras</h2></div>
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Cantidad</th>
          <th scope="col">Nombre Cupón</th>
          <th scope="col">Cantidad EcoMonedas</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      @foreach($cupones as $cupon)
      <tbody>
        <tr class="table-success">
          <th scope="row">{{ $cupon['qty'] }}</th>
          <td>{{ $cupon['item']['nombre'] }}</td>
          <td>{{ $cupon['price']}}</td>
          <td>
            <a href="{{route('eco.ReduceByOne',['id' => $cupon['item']['id']])}}" class="btn btn-outline-warning"><i class="fas fa-minus-square"></i> Unidad</a>
            <a href="{{route('eco.RemoveItem',['id' => $cupon['item']['id']])}}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i> Todo</a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><i class="fas fa-hand-holding-usd"></i> Total Eco-Monedas: <span class="badge badge-pill badge-primary">{{ $totalPrice }}</span></li>
    <li class="list-group-item"><a type="button" href="{{route('eco.checkout')}}" class="btn btn-success"><i class="fas fa-check"></i> Checkout</a></li>
  </ul>
</div>


  @else
      <legend><h2><i class="fas fa-clipboard-list"></i> Resumen del Carrito de Compras</h2></legend>
      <div class="row">
          <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <h2>¡No hay cupones en el carrito!</h2>
          </div>
      </div>
  @endif

@endsection
