<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="navigation">
	   <div class="container">
		   <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand">
					<a href="{{route('eco.home')}}"><h1><span>ECO</span>MONEDAS</h1></a>
				</div>
			</div>

			<div class="navbar-collapse collapse">
				<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation"><a href="{{route('eco.home')}}" class="active">Inicio</a></li>
						<li role="presentation"><a href="#">Sobre Nosotros</a></li>
						<li role="presentation"><a href="#">Centros</a></li>
						<li role="presentation"><a href="#">Materiales</a></li>
						<li role="presentation"><a href="#">Contáctenos</a></li>
            @auth
                <li role="presentation"><a href="#">Gestiones</a></li>
            @endauth
            <!-- Authentication Links -->
            @guest
                <li role="presentation"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li role="presentation"><a href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
			</div>
		</div>
	</div>
</nav>
