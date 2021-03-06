@extends('layouts.master')
@section('titulo','Canje Materiales')
@section('contenido')
    {{--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </br>
    <div class="msg_alerts">

    </div>
    <div class="container">
        <div class="form-group">
            <legend>Canje Materiales</legend>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usuario"> <i class="fas fa-user-tie"></i> Clientes</label>
                    <select id="cliente" name="cliente" class="custom-select">
                        <option value="0">Seleccionar Cliente</option>
                        @foreach($clientes as $cli)
                            <option value="{{ $cli->id }}">{{ $cli->nombre_completo }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" id="id_centro_acopio" value="{{ Auth::user()->centroAcopio->id  }}">
                <input type="hidden" name="array_canje_materiales" id="array_canje_materiales" value=""></input>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-primary mb-3" style="max-width: 20rem;">
                            <div class="card-header"><label for="material">Materiales</label></div>
                            <div class="card-body">
                                <h4 class="card-title"> <i class="fab fa-creative-commons-remix"></i> Seleccione los materiales y la cantidad</h4>
                                <div class="form-group">
                                    <select id="material" name="material" class="custom-select">
                                        <option value="0">Seleccione Material</option>
                                        @foreach($materiales as $mat)
                                            <option value="{{ $mat->id }}">{{ $mat->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_material" min="0" max="99">
                                </div>
                                <button type="submit" class="btn btn-success" id="agregar_material">Agregar <i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <img src="/images/canjeMaterialReciclable/materiales_eco.jpg" height="350px" width="350px"  alt="materiales reciclables">
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <table class="table table-striped" id="Tabla_Material">
            <thead>
            <tr>
                <th scope="col">Material</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Valor EcoMoneda</th>
                <th scope="col">SubTotal EcoMonedas</th>
                <th scope="col">Acción</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <br>
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <i class="fas fa-coins"> Total Ecomonedas:</i>
                <span id="total_eco_monedas" class="badge badge-primary badge-pill">0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <i class="fab fa-creative-commons-remix"> Total Materiales:</i>
                <span id="total_materiales" class="badge badge-primary badge-pill">0</span>
            </li>
        </ul>
    </div>

    </br>

    <button type="submit" id="canjear_materiales" class="btn btn-success">Canjear <i class="fas fa-location-arrow"></i></button>


    <script type="text/javascript" src="{{ URL::to('js/canjeMateriales.js') }}"></script>

@endsection
