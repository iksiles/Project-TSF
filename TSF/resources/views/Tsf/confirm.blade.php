<!DOCTYPE html>
<head>
    <html lang="en">
    <meta charset="UTF-8">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
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
