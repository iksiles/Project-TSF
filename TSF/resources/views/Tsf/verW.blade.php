<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Arma - {{ $wep->arma }}</title>
</head>
<body class="bg-dark text-light">
    <nav style="margin: 0px; padding: auto 16px;" class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.weapons') }}">Ver listado de Armas</a>
        </div>
    </nav>
    

    <h2 style="margin: 30px 16px;">{{ $wep->arma }}</h2>

    <div class="container" style="display: flex; margin: 15px 16px;">
        <img src="{{ url('img/weapons/'.$weps->imgW) }}" alt="img" width="360px" height="240px">
        <div style="display: flex; align-items: flex-start; flex-direction: column; margin: 0px 25px;">
            <label style="margin: 0px auto 30px;"><strong>Nacion desarrolladora:</strong> {{ $wep->nacion }}</label>

            <label style="margin: 30px;"><strong>Categoria:</strong> {{ $wep->categoria }}</label>

            <label style="margin: 30px;"><strong>Uso de municiones:</strong> {{ $wep->municiones }}</label>
            <!-- Cuestiona al profesor sobre esto, una consulta que sea el mismo modelo para llamar a la otra tabla y meter un href -->
            <label style="margin: 30px;"><strong>Modelos que lo usan:</strong> {{ $wep->modelo_TSF }}</label>
            
        </div>
    </div>

</body>
</html>