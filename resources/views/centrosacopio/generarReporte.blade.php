@extends('layouts.master')
@section('titulo','Eco-Monedas Gráfico Centro Acopio')
@section('contenido')
@if(count($canje_materiales) > 0)
    <br>
    <div class="row justify-content-md-center">
    <div class="card border-primary mb-3" style="max-width: 60rem;">
        <div class="card-header">Reporte</div>
        <div class="card-body">
            <h4 class="card-title"> Eco-Monedas producidas por Centro de Acopio De {{ $fecha_inicial }} A {{$fecha_final}} </h4>
            <div class="col-md-10">
                <div>
                    <!--Contenedor grafico-->
                    {!! $chart->container() !!}
                </div>

            </div>
        </div>

        {{--tabla--}}
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Centro Acopio</th>
                <th scope="col">Cantidad Monedas</th>
            </tr>
            </thead>
            <tbody>
            @foreach($canje_materiales as $canje)
            <tr class="table-active">
                <th scope="row">{{$canje->centroAcopio->nombre}}</th>
                <td>{{$canje->total}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
            {{--fin-table--}}
        <p class="text-primary">Total de Eco-monedas: <i class="fas fa-donate"> {{$total_ecomonedas}}</i> </p>

        <div class="card-footer">
            <a href="{{ route('eco.configurar-reporte-centros') }}" class="btn btn-outline-info"><i class="fas fa-arrow-circle-left"></i> Configurar Reporte</a>
            <a href="{{ route('eco.descargar-reporte', ['fecha_inicial' =>  $fecha_inicial, 'fecha_final' => $fecha_final]) }}" class="btn btn-outline-info"><i class="fas fa-file-download"></i> Descargar Reporte</a>
        </div>
    </div>
    </div>

    <!--Scripts para graficos-->
    <script type="text/javascript" src="{{ URL::to('js/Chart.min.js') }}"></script>
    {!! $chart->script() !!}

@else

    <br>
    <div class="row justify-content-md-center">
    <div class="card border-primary mb-3" style="max-width: 40rem;">
        <div class="card-header">Reporte</div>
        <div class="card-body">
            <h4 class="card-title">No se ha generado ningun reporte</h4>
            <p>No se ha encontrado ningún canje de dentro de las fechas seleccionadas</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('eco.configurar-reporte-centros') }}" class="btn btn-outline-info"><i class="fas fa-arrow-circle-left"></i> Configurar Reporte</a>
        </div>
    </div>
    </div>
@endif

@endsection
