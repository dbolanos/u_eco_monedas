@extends('layouts.master')
@section('titulo','Materiales')
@section('contenido')
</br>
<div class="container">
  <!-- Heading Row -->
  <div class="row my-4">
    <div class="col-lg-8">
      <!--<img class="img-fluid rounded" src="https://images.pexels.com/photos/1125298/pexels-photo-1125298.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260e" alt="">-->
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://wallpapertag.com/wallpaper/full/5/6/c/586474-new-walmart-wallpaper-1920x1080.jpg" width="200" height="400" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://lh3.googleusercontent.com/Yx4FWJPTWn1BEamiDDPedzSL59Q4UN2z7MBxMVf1Xoaro9u7I2xR1eHPSK6xlLry7fU" width="200" height="400" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://www.ccplazarohrmoser.com/wp-content/uploads/2014/12/Fischel-plaza-rohrmoser-600x247.jpg" width="200" height="400" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
      <h1><i class="fas fa-box-open"></i> Materiales</h1>
      <p>Por medio de nuestri sistema de canjes, nuestros clientes pueden recibir EcoMonedas a cambio de la entrega de materiales reciclables.</p>
      <p>Ofrecemos gran variedad de cupones los cuales puede cambiar por grandes benefcios con nuestros comercios afiliados.</p>
      <a class="btn btn-success btn-lg" href="{{route('eco.canjecupones')}}"><i class="fas fa-search"></i> Ver Cupones</a>
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->

  <!-- Call to Action Well -->
  <div class="card text-white bg-success my-4 text-center">
    <div class="card-body">
      <p class="text-white m-0">¿Qué materiales puedes canjear?</p>
    </div>
  </div>

</div>

<div class="card-body">
  <h4 class="card-title"></h4>
  @foreach($materiales->chunk(3) as $materialesChunk)
    <div class="row">
      @foreach($materialesChunk as $materiales)
      <div class="col-sm-6 col-md-4">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="{{asset('storage/'.$materiales->ruta_imagen)}}" alt "{{$materiales->nombre}}">
          <div class="card-body">
            <h5 class="card-title">{{$materiales->nombre}}</h5>
            <p class="card-text"><i class="fas fa-coins"></i> Precio unitario equivalente a Ecomoneda: {{$materiales->valor_ecomoneda}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item" style="text-shadow: 2px 2px #ffffff;background-color: {{$materiales->color}};border-style: solid">
              Color Identificador
            </li>
          </ul>
        </div>
      </div>
      @endforeach
    </div>
    </br>
    @endforeach
</div>
@endsection
