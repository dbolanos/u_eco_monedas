@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
</br>
<div class="card border-primary mb-3" style="max-width: 60rem;">
    <div class="card-header"> <h2><i class="fas fa-building"> Centro de Acopio </i></h2></div>
    <div class="card-body">
        <h4 class="card-title"></h4>
        @foreach($centros->chunk(3) as $centrosChunk)
            <div class="row">
                @foreach($centrosChunk as $centros)
                    <div class="col-sm-6 col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$centros->nombre}}</h5>
                                <p class="card-text"><i
                                            class="fas fa-map-marker-alt"></i> {{$centros->direccion_exacta}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                    {{$centros->telefono}}
                                    <span class="badge badge-pill badge-info">
                        {{$centros->provincia->nombre}}
                      </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            </br>
        @endforeach
    </div>
    @auth
        @permission(['centro_acopio'])
            <div class="card-footer">
                <a href="{{route('eco.configurar-reporte-centros')}}" class="btn btn-outline-info">Ver Reporte</a>
            </div>
        @endpermission
    @endauth
</div>

@endsection
