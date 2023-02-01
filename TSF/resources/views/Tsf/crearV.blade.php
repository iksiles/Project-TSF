<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}">
    <title>Variante - Añadir</title>
    
</head>
<body class="bg-dark text-light text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Ver listado variantes</a>
        </header>
    </nav>
    <h2>Introducir nueva variante de TSF</h2>

    <form action="{{ route('Tsf.storeV') }}" enctype="multipart/form-data" method ="POST">
        @csrf
        <label class="form-label">Modelo original:</label>
            <select class="form-select" name="modelo_ORG">
                @foreach($tsf as $tsfs)
                <option value="{{ $tsfs->modelo }}">{{ $tsfs->modelo }}</option>
                @endforeach
            </select>
        <label class="form-label">Modelo:</label>
            <input class="form-control-sm" type="text" name="modelo" placeholder="Nomenclatura y apodo" value="{{ old('modelo') }}">
        @error('modelo')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Nacion:</label>
            <input class="form-control-sm" type="text" name="nacionalidad" placeholder="Nacion desarrolladora" value="{{ old('nacionalidad') }}">
        @error('nacionalidad')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Entrada en servicio:</label>
            <input class="form-control-sm" type="text" name="anyo" placeholder="Año de entrada en servicio" value="{{ old('anyo') }}">
        @error('anyo')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Planta motriz:</label>
            <input class="form-control-sm" type="text" name="motores" placeholder="Motores que usa" value="{{ old('motores') }}">
        <label class="form-label">Imagen:</label>
            <input class="form-control" type="file" name="img">
            <br>
            <hr>
            <br>
            <input type="submit" value= Guardar>
    </form>
</body>
</html>