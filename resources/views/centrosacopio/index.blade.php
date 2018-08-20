@extends('layouts.master')
@section('titulo','Centros Acopio')
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
            <img class="d-block w-100" src="https://images.pexels.com/photos/193667/pexels-photo-193667.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" width="200" height="400" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://images.pexels.com/photos/1267338/pexels-photo-1267338.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" width="200" height="400" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://images.pexels.com/photos/209251/pexels-photo-209251.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" width="200" height="400" alt="Third slide">
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
      <h1><i class="fas fa-map-marker-alt"></i> Centros de Acopio</h1>
      <p>Contamos con centros de acopio a lo largo y ancho del país, para facilitar el canje de EcoMonedas.</p>
      <p>También coordinamos con su empresa para realizar ferias ecológicas y permitirle a sus colaboladores la posibilidad de aportar a nuestro proyecto desde la comodidad de su sitio de trabajo.</p>
      <a class="btn btn-success btn-lg" href="{{route('eco.contacto')}}"><i class="fas fa-phone"></i> ¡Contáctenos!</a>
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->

  <!-- Call to Action Well -->
  <div class="card text-white bg-success my-4 text-center">
    <div class="card-body">
      <p class="text-white m-0">¡Descubra más detalles sobre nuestros centros de acopio!</p>
    </div>
  </div>

</div>

</br>

<div class="accordion" id="accordionExample">
  @foreach ($provincias as $pro)
  <div class="card">
    <div class="card-header" id="heading{{$pro->id}}">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$pro->id}}" aria-expanded="true" aria-controls="collapse{{$pro->id}}">
          {{$pro->nombre}}
        </button>
      </h5>
    </div>

    <div id="collapse{{$pro->id}}" class="collapse" aria-labelledby="heading{{$pro->id}}" data-parent="#accordionExample">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col"><i class="fas fa-map-pin"></i> Dirección Exacta</th>
              <th scope="col"><i class="fas fa-phone-square"></i> Teléfono</th>
            </tr>
          </thead>
          @foreach ($centros as $centro)
          @if ($centro->provincia_id == $pro->id)
          <tbody>
            <tr class="table-success">
              <th scope="row"><i class="fas fa-arrow-right"></i> {{$centro->nombre}}</th>
              <td>{{$centro->direccion_exacta}}</td>
              <td>{{$centro->telefono}}</td>
            </tr>
          </tbody>
          @endif
          @endforeach
        </table>
      </div>
    </div>
  </div>
  @endforeach
  @auth
  @permission([ 'centro_acopio'])
  <div class="card-footer">
    <a href="{{route('eco.configurar-reporte-centros')}}" class="btn btn-outline-info">Ver Reporte</a>
  </div>
  @endpermission
  @endauth
</div>
@endsection
