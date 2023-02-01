<!DOCTYPE html>
<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
    <title>TSF - Editar</title>
    
</head>
<body class="bg-dark text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.index') }}"> Ver listado de TSF</a>
        </header>
    </nav>
    <h2 class="text-light">Editar ficha de {{ $tsf->modelo }}</h2>
    <form action="{{ route('Tsf.update', $tsf->id) }}" enctype="multipart/form-data" method ="POST">
        @csrf
        {{ method_field('PUT') }}
    <div class="row">
    <label class="form-label">Modelo:</label>
            <input class="form-control-sm" type="text" name="modelo" placeholder="Nomenclatura y apodo" value="{{ $tsf->modelo }}">
       <label class="form-label">Nacion:</label>
            <input class="form-control-sm" type="text" name="nacionalidad" placeholder="Nacion desarrolladora" value="{{ $tsf->nacionalidad }}">
       <label class="form-label">Entrada en servicio:</label>
            <input class="form-control-sm" type="text" name="anyo" placeholder="Año de entrada en servicio" value="{{ $tsf->anyo }}">
        <label class="form-label">Planta motriz:</label>
            <input class="form-control-sm" type="text" name="motores" placeholder="Motores que usa" value="{{ $tsf->motores }}">
        <label class="form-label">Imagen:</label>
            <input class="form-control" type="file" name="img">
        <input type="submit" value= Guardar>
    </form>
</body>
</html>