<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{route('eco.admin')}}">Gestión EcoMonedas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('eco.home')}}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('centros.index')}}">Centros Acopio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('materiales.index')}}">Materiales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cupones</a>
      </li>
      @permission(['admin_usuarios'])
      <li class="nav-item">
        <a class="nav-link" href="{{ route('usuario.index') }}"> Usuarios </a>
      </li>
      @endpermission
    </ul>

    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown">
         <a class="dropdown-item" href="{{route('cambiar_contrasena.usuario')}}">Cambiar Contraseña</a>
         <div class="dropdown-divider"></div>
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
     </ul>
  </div>
</nav>
