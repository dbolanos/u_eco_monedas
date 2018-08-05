@extends('layouts.master')
@section('titulo','Materiales')
@section('contenido')
</br>
  @foreach($materiales->chunk(3) as $materialesChunk)
      <div class="row">
          @foreach($materialesChunk as $materiales)
              <div class="col-sm-6 col-md-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{asset('storage/'.$materiales->ruta_imagen)}}" alt"{{$materiales->nombre}}">
                  <div class="card-body">
                    <h5 class="card-title">{{$materiales->nombre}}</h5>
                    <p class="card-text"><i class="fas fa-coins"></i> Precio unitario equivalente a Ecomoneda: {{$materiales->valor_ecomoneda}}</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="color:{{$materiales->color}}">
                      Color
                    </li>
                  </ul>
                </div>
              </div>
          @endforeach
      </div>
    </br>
  @endforeach
@endsection
