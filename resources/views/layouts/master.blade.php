<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EcoMonedas - @yield('titulo') </title>
    <script type="text/javascript" src="{{ URL::to('js/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.prettyPhoto.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.isotope.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/functions.js') }}" ></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/prettyPhoto.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" />
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('contenido')
</div>
</br>
</br>
</br>
</br>
@include('partials.footer')
</body>
</html>
