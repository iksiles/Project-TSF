<!DOCTYPE html>
<head>
    <html lang="en">
    <meta charset="UTF-8">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>TSF - Editar</title>
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
    margin: 38px auto;
}


</style>
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
    <label>Modelo:</label>
            <input type="text" name="modelo" placeholder="Nomenclatura y apodo" value="{{ $tsf->modelo }}">
       <label>Nacion:</label>
            <input type="text" name="nacionalidad" placeholder="Nacion desarrolladora" value="{{ $tsf->nacionalidad }}">
       <label>Entrada en servicio:</label>
            <input type="text" name="anyo" placeholder="Año de entrada en servicio" value="{{ $tsf->anyo }}">
        <label>Planta motriz:</label>
            <input type="text" name="motores" placeholder="Motores que usa" value="{{ $tsf->motores }}">
        <label>Imagen:</label>
            <input type="file" name="img">
        <input type="submit" value= Guardar>
    </form>
</body>
</html>