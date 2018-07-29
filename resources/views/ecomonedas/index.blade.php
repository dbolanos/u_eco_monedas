@extends('layouts.master')
@section('titulo','Inicio')
@section('contenido')
  
  <section id="main-slider" class="no-margin">
      @isset($mensaje)
          <div class="alert alert-{{$mensaje['tipo']}}" role="alert">
              {!! $mensaje['msg'] !!}
              <button type="button" class="close" data-dismiss="alert" areia-label="Close"> <span aria-hidden="true">&times;</span></button>
          </div>
      @endif
          <div class="carousel slide">
              <div class="carousel-inner">
                  <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                      <div class="container">
                          <div class="row slide-margin">
                              <div class="col-sm-6">
                                  <div class="carousel-content">
                                      <h2 class="animation animated-item-1" style="text-shadow: 2px 2px #000000">Bienvenido <span>EcoMonedas</span></h2>
                                      <p class="animation animated-item-2" style="text-shadow: 2px 2px #000000"><b>La inversión en reciclaje que premia</b></p>
                                      <a class="btn-slide animation animated-item-3" href="#">Leer Más</a>
                                  </div>
                              </div>
                              <div class="col-sm-6 hidden-xs animation animated-item-4">
                                  <div class="slider-img">
                                      <img src="images/slider/img3.png" class="img-responsive">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!--/.item-->
              </div><!--/.carousel-inner-->
          </div><!--/.carousel-->
      </section><!--/#main-slider-->

@endsection
