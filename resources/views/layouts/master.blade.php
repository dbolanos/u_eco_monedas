<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> EcoMonedas - @yield('titulo') </title>
    <!--<link rel="stylesheet" href="{{ URL::to('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/prettyPhoto.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}" />-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('contenido')
</div>
<!--<script type="text/javascript" src="{{ URL::to('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/jquery.prettyPhoto.js') }}" ></script>
<script type="text/javascript" src="{{ URL::to('js/jquery.isotope.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::to('js/wow.min.js') }}" ></script>
<script type="text/javascript" src="{{ URL::to('js/functions.js') }}" ></script>
<script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}" ></script>
@include('partials.footer')-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
