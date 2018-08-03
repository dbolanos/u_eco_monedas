@extends('layouts.admin')
@section('titulo','Materiales')
@section('contenido')

@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
@endif

</br>

<div class="row">
    <div class="col-md-12">
        <a href="{{route('materiales.create')}}" class="btn btn-primary btn-lg">Nuevo Material</a>
    </div>
</div>

</br>

<table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($materiales as $mat)
    <tr>
      <th scope="row">{{$mat->nombre}}</th>
      <td><a href="{{route('materiales.edit',['mat'=>$mat->id])}}">Editar</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection
