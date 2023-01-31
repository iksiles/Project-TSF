<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Variante - Añadir</title>
    <style>

body {

    margin: auto;

    padding: 50px;

}

nav {
    margin: 0px;
    padding: auto 16px;
}

input[type=text], select {

    width: 100%;

    padding: 12px 20px;

    margin: 8px 0;

    display: inline-block;

    border: 1px solid #ccc;

    border-radius: 4px;

    box-sizing: border-box;

}

input[type=submit] {

    width: 100%;

    background-color: #4CAF50;

    color: white;

    padding: 14px 20px;

    margin: 8px 0;

    border: none;

    border-radius: 4px;

    cursor: pointer;

}

input[type=submit]:hover {

    background-color: #45a049;

}

div {

    border-radius: 5px;

    background-color: #f2f2f2;

    padding: 20px;
    
}

p {
    color: red;
}

h2 {
    margin: 50px auto;
}
</style>
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
        <label>Modelo original:</label>
            <select name="modelo_ORG">
                @foreach($tsf as $tsfs)
                <option value="{{ $tsfs->modelo }}">{{ $tsfs->modelo }}</option>
                @endforeach
            </select>
        <label>Modelo:</label>
            <input type="text" name="modelo" placeholder="Nomenclatura y apodo" value="{{ old('modelo') }}">
        @error('modelo')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label>Nacion:</label>
            <input type="text" name="nacionalidad" placeholder="Nacion desarrolladora" value="{{ old('nacionalidad') }}">
        @error('nacionalidad')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label>Entrada en servicio:</label>
            <input type="text" name="anyo" placeholder="Año de entrada en servicio" value="{{ old('anyo') }}">
        @error('anyo')
        <p class="error-message">{{ $message }}</p>
        @enderror
        <label>Planta motriz:</label>
            <input type="text" name="motores" placeholder="Motores que usa" value="{{ old('motores') }}">
        <label>Imagen:</label>
            <input type="file" name="img">
            <input type="submit" value= Guardar>
    </form>
</body>
</html>