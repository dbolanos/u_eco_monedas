<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="#"><h1><span>ECO</span>MONEDAS</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="navbar-collapse collapse" id="navbarColor02">
					<ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('eco.home')}}">Inicio <span class="sr-only">(current)</span></a>
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
              <li class="nav-item">
                <a class="nav-link" href="{{route('eco.admin')}}">Gestiones</a>
              </li>
            @endauth
          </ul>

          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
            @guest
				          <li class="nav-link"><a href="{{ route('cliente.registro') }}">{{ __('Registro Cliente') }}</a></li>
                  <li class="nav-link"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @else
				          @permission(['admin_usuarios'])
					        <li class="nav-link"><a href="{{ route('usuario.registro') }}">{{ __('Registro Usuarios') }}</a></li>
				          @endpermission
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a href="#" alt="Centro Acopio">{{ Auth::user()->centroAcopio()->first()->nombre }}</a><br>
						  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                      </div>
                  </li>
            @endguest
          </ul>
      </div>
</nav>
