@extends('layouts.master')
@section('titulo','Canje Materiales')
@section('contenido')
</br>
<form>
<div class="container">
    <div class="form-group">
      <legend>Canje Materiales</legend>

      <div class="form-group">
          <label for="usuario">Clientes</label>
          <select id="usuario" name="usuario" class="custom-select">
            @foreach($clientes as $cli)
                <option value="{{ $cli->id }}">{{ $cli->nombre_completo }}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="material">Materiales</label>
          <select id="material" name="material" class="custom-select">
            @foreach($materiales as $mat)
                <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
            @endforeach
          </select>
      </div>

    <div class="form-group">
      <label for="cantidad">Cantidad</label>
      <input type="number" class="form-control" id="exampleFormControlInput1">
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</div>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Material</th>
        <th scope="col">Cantidad</th>
        <th scope="col">EcoMonedas</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Nombre Material</td>
        <td>#</td>
        <td>Cantidad EcoMonedas</td>
        <td><a href="#">Eliminar</a></td>
      </tr>
  </table>
</div>
</br>
<button type="submit" class="btn btn-success">Canjear</button>
</form>
@endsection
