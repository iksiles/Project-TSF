<!DOCTYPE html>

<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
    <title>{{ $var->modelo }} - Añadir</title>

</head>
<body class="bg-dark text-light text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Ver listado variantes</a>
        </header>
    </nav>
    <h2>Editar {{ $var->modelo }}</h2>

    <form action="{{ route('Tsf.updateV', $var->id) }}" enctype="multipart/form-data" method ="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="row text-dark">
        <label class="form-label">Modelo:</label>
        <input class="form-control-sm" type="text" name="modelo" placeholder="Nomenclatura y apodo" value="{{ $var->modelo }}">
       <label class="form-label">Nacion:</label>
            <input class="form-control-sm" type="text" name="nacionalidad" placeholder="Nacion desarrolladora" value="{{ $var->nacionalidad }}">
       <label class="form-label">Entrada en servicio:</label>
            <input class="form-control-sm" type="text" name="anyo" placeholder="Año de entrada en servicio" value="{{ $var->anyo }}">
        <label class="form-label">Planta motriz:</label>
            <input class="form-control-sm" type="text" name="motores" placeholder="Motores que usa" value="{{ $var->motores }}">
        <label class="form-label">Imagen:</label>
            <input class="form-control" type="file" name="img">
            <input type="submit" value= Guardar>
    </form>
</body>
</html>