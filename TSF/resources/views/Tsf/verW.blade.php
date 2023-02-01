<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/verW.css') }}">
    <title>Arma - {{ $wep->arma }}</title>
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.weapons') }}">Ver listado de Armas</a>
        </div>
    </nav>
    

    <h2>{{ $wep->arma }}</h2>

    <div id="containetor" class="container d-flex">
        <img src="{{ url('img/weapons/'.$wep->imgW) }}" alt="img">
        <div>
            <label><strong>Nacion desarrolladora:</strong> {{ $wep->nacion }}</label>
            <label><strong>Categoria:</strong> {{ $wep->categoria }}</label>
            <label><strong>Uso de municiones:</strong> {{ $wep->municiones }}</label>
            <!-- Cuestiona al profesor sobre esto, una consulta que sea el mismo modelo para llamar a la otra tabla y meter un href -->
        </div>
    </div>

</body>
</html>