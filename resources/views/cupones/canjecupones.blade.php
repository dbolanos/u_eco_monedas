@extends('layouts.master')
@section('titulo','Cupones')
@section('contenido')

@if(Session::has('success'))
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <div id="charge-message" class="alert alert-success">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>
@endif

</br>

@foreach($cupones->chunk(3) as $cuponChunk)
  <div class="row">
    @foreach($cuponChunk as $cupon)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{asset('storage/'.$cupon->ruta_imagen)}}" alt="{{$cupon->nombre}}" class="img-responsive">
          <div class="caption">
            <h3>{{ $cupon->nombre }}</h3>
            <p class="description">{{ $cupon->descripcion }}</p>
            <div class="clearfix">
              <div class="pull-left price"><i class="fas fa-coins"></i> {{ $cupon->cantidad_ecomonedas }}</div>
                <a href="{{route('eco.addToCart', ['id' => $cupon->id])}}"
                  class="btn btn-success pull-right" role="button"><i class="fas fa-cart-plus"></i> Agregar</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</br>
@endforeach

@endsection
