@extends('layouts.master')
@section('titulo','Inicio')
@section('contenido')
</br>
<div class="row">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100"
        src="https://images.pexels.com/photos/346885/pexels-photo-346885.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
        alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100"
        src="https://images.pexels.com/photos/1130268/pexels-photo-1130268.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
        alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100"
        src="https://images.pexels.com/photos/1125298/pexels-photo-1125298.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260e"
        alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</br>
@endsection
