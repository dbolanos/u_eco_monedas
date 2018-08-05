@extends('layouts.master')
@section('titulo','Crear Centro Acopio')
@section('contenido')
@include('partials.errors')
</br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('centros.create')}}" method="post">

              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre"
                  value="">
              </div>

              <div class="form-group">
                  <label for="provincias">Provincia</label>
                  <select id="provincias" name="provincias" class="custom-select">
                    @foreach($provincias as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="content">Dirección Exacta</label>
                  <textarea
                  class="form-control"
                  id="direccion"
                  name="direccion"
                  rows="3"></textarea>
              </div>

              <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input
                  type="text"
                  class="form-control"
                  id="telefono"
                  name="telefono"
                  value="">
              </div>

              <fieldset class="form-group">
                <legend>Estado</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="estado" id="activo" value="1" checked="">
                    Activo
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="estado" id="inactivo" value="0">
                    Inactivo
                  </label>
                </div>
              </fieldset>

              @csrf
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </div>
</br>
@endsection
