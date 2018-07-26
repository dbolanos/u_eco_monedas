@extends('layouts.master')

@section('contenido')
@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
@endif


<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
      <th scope="col">Publicar</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
@endsection
