<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TSF - Listado</title>
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('Tsf.create') }}">Añade un TSF a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.weapons') }}">Revisa las armas añadidas</a>
                <a class="navbar-brand" href="{{ route('Tsf.createW') }}">Añade un Arma a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Revisa las variantes añadidas</a>
                <a class="navbar-brand" href="{{ route('Tsf.createV') }}">Añade una Variante a la BDD</a>
            </div>
        </nav>
        <h2 style="margin: 40px auto 50px" class="text-light text-center">Listado de TSF operativos</h2>
        

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table text-center table-responsive table-dark table-hover">
            <thead class="table align-middle table-dark">
            <tr>
                <th>Visualizar</th>
                <th>Modelo</th>
                <th>Nacionalidad</th>
                <th>Entrada en servicio</th>
                <th>Planta motriz</th>
                <th>Imagen de referencia</th>
                <th>Edición</th>
            </tr>
            </thead>
            <tbody class="table align-middle table-dark table-group-divider table-bordered border-primary">
            @foreach ($tsf as $tsfs)
                <tr>
                    <td><a class="btn btn-light text-light" href="{{ route('Tsf.show', $tsfs->id) }}">Ver</a></td>
                    <td>{{ $tsfs->modelo }}</td>
                    <td>{{ $tsfs->nacionalidad }}</td>
                    <td>{{ $tsfs->anyo }}</td>
                    <td>{{ $tsfs->motores }}</td>
                    <td><img src="../img/tsf/{{ $tsfs->img }}" alt="img" width="160px" height="240px"></td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('Tsf.edit', $tsfs->id) }}">Editar</a>   

                        <a class="btn btn-danger" href="{{ route('Tsf.confirm',$tsfs->id) }}">Borrar<a>
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tsf->links() }}
    </body>

</html>