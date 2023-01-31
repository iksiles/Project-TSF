<!DOCTYPE html>
<head>
    <html lang="en">
    <meta charset="UTF-8">
    @include('Tsf.layouts.boot')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Confirmar</title>
</head>

<body class="bg-dark text-light">
    <div class="container py-5">
        <h1>¿Deseas eliminar el registro de {{ $var->modelo }} ? </h1>
        <form action="{{ route('Tsf.destroyV',$var->id)  }}" method="POST">
            @method('DELETE')
            @csrf
            <input class="btn btn-danger" type="submit" value="Eliminar definitiva">

            <a class="btn btn-primary" href="{{ route('cancelarV') }}">Cancelar</a>
        </form>
    </div>
</body>

</html>