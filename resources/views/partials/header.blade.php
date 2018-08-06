<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{route('eco.home')}}"><i class="fas fa-recycle"></i> EcoMonedas</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('eco.home')}}"><i class="fas fa-home"></i> Inicio <span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('eco.centros')}}"><i class="fas fa-map-marked-alt"></i> Centros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('eco.materiales')}}"><i class="fas fa-box-open"></i> Materiales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('eco.contacto')}}"><i class="fas fa-headset"></i> Contáctenos</a>
            </li>
            @auth
                @permission(['admin'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cogs"></i> Gestiones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('centros.index')}}"><i class="fas fa-map-marker-alt"></i>
                            Centros de Acopio</a>
                        <a class="dropdown-item" href="{{route('materiales.index')}}"><i class="fas fa-trash"></i>
                            Materiales de Reciclaje</a>
                        <a class="dropdown-item" href="{{route('cupones.index')}}"><i class="fas fa-ticket-alt"></i>
                            Cupones</a>
                        @permission(['admin_usuarios'])
                        <a class="dropdown-item" href="{{route('usuario.index')}}"><i class="fas fa-users"></i> Usuarios</a>
                        @endpermission
                    </div>
                </li>
                @endpermission
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i> Canjes
                    </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @permission(['materiales_reciclables'])
                        <a class="dropdown-item" href="{{route('canje_material.index')}}"><i class="fas fa-boxes"></i> Materiales Reciclables</a>
                        @endpermission
                        @permission(['cupones_canje'])
                        <a class="dropdown-item" href="{{route('eco.canjecupones')}}"><i class="fas fa-shopping-cart"></i>
                            Cupones</a>
                        @endpermission
                    </div>

                </li>
            @endauth
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @guest
                <li class="nav-link"><a href="{{ route('cliente.registro') }}"><i
                                class="fas fa-user-plus"></i> {{ __('Registro Cliente') }}</a></li>
                <li class="nav-link"><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a></li>
            @else
                @permission(['admin_usuarios'])
                <li class="nav-link"><a href="{{ route('usuario.registro') }}"><i
                                class="fas fa-user-plus"></i> {{ __('Registro Usuarios') }}</a></li>
                @endpermission
                @permission(['cupones_canje'])
                <li class="nav-item">
                    <a class="nav-link" href="{{route('eco.shoppingCart')}}">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrito Compras
                        <span class="badge">
                          {{Session::has('cart') ? Session::get('cart')->totalQty : ''}}
                        </span>
                    </a>
                </li>
                @endpermission
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" x-placement="bottom-start"
                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                        <a class="dropdown-item" href="{{route('cambiar_contrasena.usuario')}}"><i
                                    class="fas fa-key"></i> Cambiar Contraseña</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <span class="badge badge-pill badge-info">{{ Auth::user()->centroAcopio()->first()->nombre }}</span>
                </li>
            @endguest
        </ul>
    </div>
</nav>
