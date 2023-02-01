<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}">
    <title>TSF - Añadir</title>
</head>
<body class="bg-dark text-light text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.weapons') }}">Ver listado Armas</a>
        </header>
    </nav>
    <h2>Añadir nueva arma</h2>

    <form action="{{ route('Tsf.storeW') }}" enctype="multipart/form-data" method ="POST">
        @csrf
        <label class="form-label">Modelo:</label>
            <input class="form-control-sm" type="text" name="arma" placeholder="Nomenclatura y apodo" value="{{ old('arma') }}">
        @error('arma')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Nacion:</label>
            <input class="form-control-sm" type="text" name="nacion" placeholder="Nacion desarrolladora" value="{{ old('nacion') }}">
        @error('nacion')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Categoria:</label>
                <select class="form-select" name="categoria">
                <option selected>Categoria</option>
                <option value="0">Armamento de defensa personal</option>
                <option value="1">Rifle de asalto</option>
                <option value="2">Rifle de tirador</option>
                <option value="3">Espada</option>
                <option value="4">Escudo</option>
                <option value="5">Misiles</option>
            </select>

        <label class="form-label">Imagen:</label>
            <input class="form-control" type="file" name="img">
            <br>
            <hr>
            <br>
            <input type="submit" value= Guardar>
    </form>
</body>
</html>