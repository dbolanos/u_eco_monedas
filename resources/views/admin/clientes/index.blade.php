@extends('layouts.master')
@section('titulo','Centros Acopio')
@section('contenido')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Clientes</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-secondary mb-3" style="max-width: 80rem;">
                    <div class="card-header"><h5 class="text-success"><i class="fas fa-user-tie"></i> Lista de Clientes</h5></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Direccion Exacta</th>
                                <th scope="col">Eco-Monedas Disponibles</th>
                                <th scope="col">Total Eco-Monedas Gastadas</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{$cliente->nombre_completo}}</th>
                                    <td>{{$cliente->correo}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                    <td>{{$cliente->direccion_exacta}}</td>
                                    <td>{{$cliente->eco_monedas_disponibles}}</td>
                                    <td>{{$cliente->eco_monedas_gastadas}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="badge badge-light">Total de clientes: {{count($clientes)}}</span>
                            </div>
                            <div class="col-md-8">
                                {{ $clientes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




@endsection