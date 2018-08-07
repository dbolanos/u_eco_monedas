@extends('layouts.master')
@section('titulo','Editar Centro Acopio')
@section('contenido')
@include('partials.errors')
</br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('centros.update')}}" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    value="{{$centroacopio->nombre}}">
                </div>

                <div class="form-group">
                    <label for="provincias">Provincia</label>
                    <select id="provincias" name="provincias" class="custom-select">
                      @foreach($provincias as $pro)
                          <option value="{{ $pro->id }}"
                            {{($centroacopio->provincia->id==$pro->id) ? 'selected' : ''}}
                            >{{ $pro->nombre }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Dirección Exacta</label>
                    <textarea
                    class="form-control"
                    id="direccion"
                    name="direccion"
                    rows="3">{{$centroacopio->direccion_exacta}}</textarea>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input
                    type="text"
                    class="form-control"
                    id="telefono"
                    name="telefono"
                    value="{{$centroacopio->telefono}}">
                </div>

                <fieldset class="form-group">
                  <legend>Estado</legend>
                  <div class="form-check">
                    <label class="form-check-label">
                        @if($centroacopio->estado == 1)
                            <input type="radio" class="form-check-input" name="estado" id="activo" value="1" checked>
                        @else
                            <input type="radio" class="form-check-input" name="estado" id="activo" value="1" >
                        @endif
                      Activo
                    </label>
                  </div>
                  <div class="form-check">
                  <label class="form-check-label">
                      @if($centroacopio->estado == 0)
                        <input type="radio" class="form-check-input" name="estado" id="inactivo" value="0" checked>
                      @else
                          <input type="radio" class="form-check-input" name="estado" id="inactivo" value="0">
                      @endif
                      Inactivo
                    </label>
                  </div>
                </fieldset>

                <input type='hidden' name="id" value="{{$centroacopio->id}}">
                @csrf
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
  </br>
@endsection
