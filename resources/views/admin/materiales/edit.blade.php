@extends('layouts.master')
@section('titulo','Editar Material')
@section('contenido')
@include('partials.errors')
</br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('materiales.update',['material'=>$material->id])}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre"
                  value="{{$material->nombre}}">
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

              <div class="form-group">
                  <label for="content">Valor Ecomoneda</label>
                  <input
                  type="number"
                  class="form-control"
                  id="valor"
                  name="valor"
                  value="{{$material->valor_ecomoneda}}">
              </div>

              <div class="form-group">
                  <label for="content">Color</label>
                  <input
                  type="color"
                  class="form-control"
                  id="color"
                  name="color"
                  value="{{$material->color}}">
              </div>

              <input type='hidden' name="id" value="{{ $material->id }}">
              @csrf
              <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
</br>
@endsection
