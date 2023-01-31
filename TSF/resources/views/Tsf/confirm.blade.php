<!DOCTYPE html>
<head>
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Confirmar</title>
</head>

<body class="bg-dark text-light">
    <div class="container py-5">
        <h1>¿Deseas eliminar el registro de {{ $tsf->modelo }} ? </h1>
        <form action="{{ route('Tsf.destroy',$tsf->id)  }}" method="POST">
            @method('DELETE')
            @csrf
            <input class="btn btn-danger" type="submit" value="Eliminar definitiva">

            <a class="btn btn-primary" href="{{ route('cancelar') }}">Cancelar</a>
        </form>
    </div>
</body>

</html>
