@extends('layouts.master')
@section('titulo','Eco-Monedas Gráfico Centro Acopio')
@section('contenido')

    <div class="row justify-content-md-center">
        <div class="col-md-2">
            fechas
        </div>
        <div class="col-md-10">
            {{dd($chart)}}
            <div>
                <!--Contenedor grafico-->
                {!! $chart->container() !!}
            </div>

        </div>

    </div>

    <!--Scripts para graficos-->
    <script type="text/javascript" src="{{ URL::to('js/Chart.min.js') }}"></script>
    {!! $chart->script() !!}


@endsection
