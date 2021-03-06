@extends('layouts.master')
@section('titulo','Crear Cupón')
@section('contenido')
@include('partials.errors')
</br>
  <legend>Crear Cupón</legend>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('cupones.create')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre">
              </div>

              <div class="form-group">
                <label for="content">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
              </div>

              <div class="form-group">
                  <label for="content">Cantidad Ecomonedas</label>
                  <input
                  type="number"
                  class="form-control"
                  id="cantidad"
                  name="cantidad">
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

              @csrf
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>
</br>
@endsection
