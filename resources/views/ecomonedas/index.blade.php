@extends('layouts.master')
@section('titulo','Inicio')
@section('contenido')
</br>
<!-- Page Content -->
<div class="container">

  <!-- Heading Row -->
  <div class="row my-4">
    <div class="col-lg-8">
      <!--<img class="img-fluid rounded" src="https://images.pexels.com/photos/1125298/pexels-photo-1125298.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260e" alt="">-->
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://images.pexels.com/photos/1125298/pexels-photo-1125298.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260e" width="200" height="400" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://3innyc.com/wp-content/uploads/2014/01/red-eye-tree-frog-costa-rica.jpg" width="200" height="400" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://d3hne3c382ip58.cloudfront.net/files/uploads/bookmundi/resized/cms/arenal-volcano-in-costa-rica-1510653537-735X412.jpg" width="200" height="400" alt="Third slide">
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
      <h1><i class="fas fa-recycle"></i> Eco-Monedas</h1>
      <p>A través de nuestro sistema de incentivos que promuevan el reciclaje y el cambio de hábitos de consumo en los individuos y comunidades, lograremos un mejor ambiente.</p>
      <p>EcoMonedas es un proyecto 100% costarricense el cual busca generarle muchos benefcios contribuyendo al ambiente.</p>
      <a class="btn btn-success btn-lg" href="{{route('eco.contacto')}}"><i class="fas fa-phone"></i> ¡Contáctenos!</a>
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->

  <!-- Call to Action Well -->
  <div class="card text-white bg-success my-4 text-center">
    <div class="card-body">
      <p class="text-white m-0">¡La manera inteligente de hacer dinero!</p>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">Centros de Acopio <i class="fas fa-map-marked-alt"></i></h3>
          <p class="card-text">Nuestros centros de Acopio se encuentran para ofrecerle un servicio agradable, además de facilitar la entrega de materiales valorizables y entregar el cambio de eco-monedas. Este es un proyecto en que nacio con la idea de ser amigables con el mundo.</p>
        </div>
        <div class="card-footer">
          <a href="{{route('eco.centros')}}" class="btn btn-success">Más Info</a>
        </div>
      </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">Materiales  <i class="fas fa-box-open"></i></h3>
          <p class="card-text">Tomar la mejor decisión posible con el fin de evitar potenciales residuos en la circunstancia dada. Existe una metodología recomendada para facilitar la transición a nuevos hábitos de compra y descarte, la cual nos permite visualizar las oportunidades de mejora a corto, mediano y largo plazo. </p>
        </div>
        <div class="card-footer">
          <a href="{{route('eco.materiales')}}" class="btn btn-success">Más Info</a>
        </div>
      </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h3 class="card-title">Cupones <i class="fas fa-ticket-alt"></i></h3>
          <p class="card-text">Eco-monedas es uno de los programas que valora el medio ambiente en nuestro país. Se lleva a cambio de los materiales valorizables que se separan y se llevan a reciclar mediante un sistema de
            incentivos en el que se pueden canjear por descuentos en productos y servicios sostenibles.</p>
        </div>
        <div class="card-footer">
          <a href="{{route('eco.canjecupones')}}" class="btn btn-success">Más Info</a>
        </div>
      </div>
    </div>
    <!-- /.col-md-4 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
</br>
@endsection
