<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="{{route('eco.home')}}"><h1>ECOMONEDAS</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="navbar-collapse collapse" id="navbarColor03">
					<ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('eco.home')}}">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('eco.centros')}}">Centros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('eco.materiales')}}">Materiales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('eco.contacto')}}">Contáctenos</a>
            </li>
            @auth
              @permission(['admin'])
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestiones</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                  <a class="dropdown-item" href="{{route('centros.index')}}">Centros de Acopio</a>
                  <a class="dropdown-item" href="{{route('materiales.index')}}">Materiales Reciclaje</a>
                  <a class="dropdown-item" href="{{route('cupones.index')}}">Cupones</a>
                  @permission(['admin_usuarios'])
                  <a class="dropdown-item" href="{{route('usuario.index')}}">Usuarios</a>
                  @endpermission
                </div>
              </li>
              @endpermission
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Canjes</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                  <a class="dropdown-item" href="#">Materiales Reciclables</a>
                  <a class="dropdown-item" href="{{route('eco.cupones')}}">Cupones</a>
                </div>
              </li>
            @endauth
          </ul>

          <ul class="nav nav-pills">
              <!-- Authentication Links -->
            @guest
				    <li class="nav-link"><a href="{{ route('cliente.registro') }}">{{ __('Registro Cliente') }}</a></li>
            <li class="nav-link"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
            @permission(['admin_usuarios'])
            <li class="nav-link"><a href="{{ route('usuario.registro') }}">{{ __('Registro Usuarios') }}</a></li>
            @endpermission
            <li class="nav-item dropdown">
              <!--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <!--<span class="caret"></span>-->
              </a>

              <!--<div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
              <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                <a class="dropdown-item" href="#">Cambiar Contraseña</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" alt="Centro Acopio">{{ Auth::user()->centroAcopio()->first()->nombre }}</a>
            </li>
            @endguest
          </ul>

        </div>
</nav>
