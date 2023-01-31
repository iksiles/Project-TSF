<!DOCTYPE html>
<html>
    <head>
        <title>TSF - Listado</title>
        @include('Tsf.layouts.boot')
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
                    <td><img src="{{ url('img/tsf/'.$tsfs->img) }}" alt="img" width="160px" height="240px"></td>
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