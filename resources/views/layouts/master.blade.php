<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EcoMonedas - @yield('titulo') </title>

    <script type="text/javascript" src="{{ URL::to('js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>

    <script type="text/javascript" src="{{ URL::to('js/jquery.prettyPhoto.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.isotope.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/functions.js') }}" ></script>

    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/prettyPhoto.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" />


    <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />


</head>
<body>
@include('partials.header')
<div class="container">
    @yield('contenido')
</div>
@include('partials.footer')
</body>
</html>
