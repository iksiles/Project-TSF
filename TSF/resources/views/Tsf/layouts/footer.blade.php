<footer>
    <div class="container text-center">
        @if(Session::get('usuario'))
        <h5 class="text-light">Sesión iniciada como: {{$usu->usuario}}</h5>
        <a class="btn btn-light" href="{{ route('Tsf.closeSesion') }}">Cerrar Sesión</a>
        @elseif(!(Session::get('usuario')))
        <a class="btn btn-light" href="{{ route('Tsf.loginForm') }}">Iniciar Sesión</a>
        <a class="btn btn-light" href="{{ route('Tsf.createU') }}">Crear Usuario</a>
        @endif
    </div>
</footer>