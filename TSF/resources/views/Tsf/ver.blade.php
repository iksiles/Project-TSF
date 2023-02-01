<!DOCTYPE html>

<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/ver.css')}}">
    <title>TSF - {{ $tsf->modelo }}</title>
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.index') }}">Ver listado TSF</a>
        </div>
    </nav>
    

    <h2>{{ $tsf->modelo }}</h2>

    <div id="containetor" class="container d-flex">
        <img id="portada" src="{{ url('img/tsf/'.$tsf->img) }}" alt="img">
        <div id="labeler">
            <label><strong>Nacion desarrolladora:</strong> {{ $tsf->nacionalidad }}</label>
            <label><strong>Entrada en servicio:</strong> {{ $tsf->anyo }}</label>
            <label><strong>Planta motriz:</strong> {{ $tsf->motores }}</label>
            <div class="mx-4">
                <h3>Variantes</h3>
            @foreach($var as $vars)
                <a href="{{ route('Tsf.showV', $vars->id) }}">{{ $vars->modelo }}</a>
            @endforeach
            </div>
        </div>
        <div class="container">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-90" src="{{url('img/tsf/Shiranui/1.png')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-90" src="{{url('img/tsf/Shiranui/2.png')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                <img class="d-block w-90" src="{{url('img/tsf/Shiranui/3.png')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
</div>
</div>
</body>
</html>