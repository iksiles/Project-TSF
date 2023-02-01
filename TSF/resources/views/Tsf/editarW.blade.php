<!DOCTYPE html>
<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/editar.css') }}">
    <title>Arma - Editar</title>
</head>
<body class="bg-dark text-center">
    <nav class="navbar navbar-expand-lg bg-light">
        <header class="container-fluid">
            <a class="navbar-brand" href="{{ route('Tsf.weapons') }}"> Ver listado de TSF</a>
        </header>
    </nav>
    <h2 class="text-light">Editar ficha de {{ $wep->arma }}</h2>
    <form action="{{ route('Tsf.updateW', $wep->id) }}" enctype="multipart/form-data" method ="POST">
        @csrf
        {{ method_field('PUT') }}
    <div class="row">
    <label class="form-label">Modelo:</label>
            <input class="form-control-sm" type="text" name="arma" placeholder="Nomenclatura y apodo" value="{{ $wep->arma }}">
       <label class="form-label">Nacion:</label>
            <input class="form-control-sm" type="text" name="nacion" placeholder="Nacion desarrolladora" value="{{ $wep->nacion }}">
       <label>Categoria:</label>
            <select class="form-select" name="categoria">
                <option selected>Categoria</option>
                <option value="0">Armamento de defensa personal</option>
                <option value="1">Rifle de asalto</option>
                <option value="2">Rifle de tirador</option>
                <option value="3">Espada</option>
                <option value="4">Escudo</option>
                <option value="5">Misiles</option>
            </select>
        <label>Imagen:</label>
            <input class="form-control" type="file" name="img">
        <input type="submit" value= Guardar>
    </form>
</body>
</html>