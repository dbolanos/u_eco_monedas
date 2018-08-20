@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
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
