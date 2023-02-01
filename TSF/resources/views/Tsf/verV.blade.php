<!DOCTYPE html>

<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/verV.css')}}">
    <title>Variante - {{ $var->modelo }}</title>
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Ver listado de Variantes</a>
        </div>
    </nav>
    

    <h2>{{ $var->modelo }}</h2>

    <div id="containetor" class="container d-flex">
        <img src="{{ url('img/variants/'.$var->img) }}" alt="img">
        <div>
            <label><strong>Nacion desarrolladora:</strong> {{ $var->nacionalidad }}</label>
            <label><strong>Entrada en servicio:</strong> {{ $var->anyo }}</label>
            <label><strong>Planta motriz:</strong> {{ $var->motores }}</label>
            <div class="mx-4">
            <h3>Modelo Original</h3>
                    <a href="{{ route('Tsf.show', $var->tsfs->id) }}">{{ $var->tsfs->modelo }}</a>
            </div>
        </div>
    </div>

</body>
</html>