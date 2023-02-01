<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Armas - Listado</title>
        @include('Tsf.layouts.boot')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>

    <body class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('Tsf.createW') }}">Añade un Arma a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.index') }}">Revisa el listado de TSF</a>   
                <a class="navbar-brand" href="{{ route('Tsf.create') }}">Añade un TSF a la BDD</a>
                <a class="navbar-brand" href="{{ route('Tsf.variants') }}">Revisa las variantes añadidas</a>
                <a class="navbar-brand" href="{{ route('Tsf.createV') }}">Añade una Variante a la BDD</a>
            </div>
        </nav>
        <h2 class="text-light text-center">Listado de Armas en uso</h2>
        

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table text-center table-responsive table-dark table-hover">
            <thead class="table align-middle table-dark">
            <tr>
                <th>Visualizar</th>
                <th>Arma</th>
                <th>Nacion</th>
                <th>Categoria</th>
                <th>Municiones</th>
                <th>Imagen de referencia</th>
                <th>Edición</th>
            </tr>
            </thead>
            <tbody class="table align-middle table-dark table-group-divider table-bordered border-primary">
            @foreach ($wep as $weps)
                <tr>
                    <td><a class="btn btn-light text-light" href="{{ route('Tsf.showW', $weps->id) }}">Ver</a></td>
                    <td>{{ $weps->arma }}</td>
                    <td>{{ $weps->nacion }}</td>
                    <td>{{ $weps->categoria }}</td>
                    <td>{{ $weps->municiones }}</td>
                    <td><img src="{{ url('img/weapons/'.$weps->imgW) }}" alt="img" width="240px" height="160px"></td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('Tsf.editW', $weps->id) }}">Editar</a>
                        <a class="btn btn-danger" href="{{ route('Tsf.confirmW',$weps->id) }}">Borrar<a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $wep->links() }}
    </body>

</html>