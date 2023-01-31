<!DOCTYPE html>

<head>
    @include('Tsf.layouts.boot')
    <title>Variante - {{ $var->modelo }}</title>
</head>
<body class="bg-dark text-light">
    <nav style="margin: 0px; padding: auto 16px;" class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Ver listado de Variantes</a>
        </div>
    </nav>
    

    <h2 style="margin: 30px 16px;">{{ $var->modelo }}</h2>

    <div class="container" style="display: flex; margin: 15px 16px;">
        <img src="{{ url('img/variants/'.$var->img) }}" alt="img" width="260px" height="360px">
        <div style="display: flex; align-items: flex-start; flex-direction: column; margin: 0px 25px;">
            <label style="margin: 0px 30px 30px;"><strong>Nacion desarrolladora:</strong> {{ $var->nacionalidad }}</label>

            <label style="margin: 30px;"><strong>Entrada en servicio:</strong> {{ $var->anyo }}</label>

            <label style="margin: 30px;"><strong>Planta motriz:</strong> {{ $var->motores }}</label>
        </div>
    </div>

</body>
</html>