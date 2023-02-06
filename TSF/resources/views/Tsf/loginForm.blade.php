<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}">
    <title>Usuario - Iniciar Sesión</title>

</head>
<body class="bg-dark text-light text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.index') }}">Ver listado TSF</a>
        </header>
    </nav>
    <h2>Iniciar Sesión</h2>

    <form action="{{ route('Tsf.logSes') }}" method ="POST">
        @csrf
        <label class="form-label">Usuario:</label>
            <input class="form-control-sm" type="text" name="usuario" placeholder="Nombre de sesión" value="{{ old('usuario') }}">
        @error('usuario')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label class="form-label">Contraseña:</label>
            <input class="form-control" type="password" name="pswd" placeholder="Contraseña" value="{{ old('pswd') }}">
        @error('pswd')
        <p class="error-message">{{ $message }}</p>
        @enderror
            <input type="submit" value= Guardar>
    </form>
</body>
</html>