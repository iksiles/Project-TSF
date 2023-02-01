<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Variantes - Listado</title>
        @include('Tsf.layouts.boot')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>

    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('Tsf.createV') }}">Añade una variante a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.index') }}">Revisa los TSF añadidos</a>
                <a class="navbar-brand" href="{{ route('Tsf.create') }}">Añade un TSF a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.weapons') }}">Revisa las armas añadidas</a>
                <a class="navbar-brand" href="{{ route('Tsf.createW') }}">Añade un Arma a la BDD</a>
            </div>
        </nav>
        <h2 class="text-light text-center">Listado de Variantes operativas</h2>
        

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
                <th>Variante</th>
                <th>Nacionalidad</th>
                <th>Entrada en servicio</th>
                <th>Planta motriz</th>
                <th>Imagen de referencia</th>
                <th>Edición</th>
            </tr>
            </thead>
            <tbody class="table align-middle table-dark table-group-divider table-bordered border-primary">
            @foreach($var as $vars)
                <tr>
                    <td><a class="btn btn-light text-light" href="{{ route('Tsf.showV', $vars->id) }}">Ver</a></td>
                    <td><a href="{{ route('Tsf.show', $vars->tsfs->id) }}">{{ $vars->tsfs->modelo }}</a></td>
                    <td>{{ $vars->modelo }}</td>
                    <td>{{ $vars->nacionalidad }}</td>
                    <td>{{ $vars->anyo }}</td>
                    <td>{{ $vars->motores }}</td>
                    <td><img  src="{{ url('img/variants/'.$vars->img) }}" alt="img" width="160px" height="240px"></td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('Tsf.editV', $vars->id) }}">Editar</a>   

                        <a class="btn btn-danger" href="{{ route('Tsf.confirmV',$vars->id) }}">Borrar<a>
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $var->links() }}
    </body>

</html>