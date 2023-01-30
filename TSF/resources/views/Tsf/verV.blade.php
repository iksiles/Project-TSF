<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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