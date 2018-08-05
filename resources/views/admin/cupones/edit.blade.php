@extends('layouts.master')
@section('titulo','Editar Cupón')
@section('contenido')
@include('partials.errors')
  </br>
    <legend>Editar Cupón</legend>
      <div class="row">
          <div class="col-md-12">
              <form action="{{route('cupones.update',['cupones'=>$cupones->id])}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    value="{{$cupones->nombre}}">
                </div>

                <div class="form-group">
                  <label for="content">Descripción</label>
                  <textarea class="form-control"
                  id="descripcion"
                  name="descripcion"
                  rows="3">{{$cupones->descripcion}}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Cantidad Ecomonedas</label>
                    <input
                    type="number"
                    class="form-control"
                    id="cantidad"
                    name="cantidad"
                    value="{{$cupones->cantidad_ecomonedas}}">
                </div>

                <div class="form-group">
                    <label for="content">Imagen</label>
                    <input
                    type="file"
                    class="form-control-file"
                    id="archivoImagen"
                    name="archivoImagen"
                    accept="image/*">
                </div>

                <input type='hidden' name="id" value="{{ $cupones->id }}">
                @csrf
                <button type="submit" class="btn btn-success">Guardar</button>
              </form>
          </div>
      </div>
  </br>

@endsection
