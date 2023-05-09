<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>@yield('title')</title>

</head>
<body>

    <!-- DROPDOWN STRUCTURE -->
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{ route('site.categorias', $categoriaM->id) }}">{{ $categoriaM->nome }}</a></li>
        @endforeach
    </ul>

    <nav class="red">
        <div class="nav-wrapper container">
          <a href="{{ route('site.index') }}" class="brand-logo center">CursoLaravel</a>
          <ul id="nav-mobile" class="left">
            <li><a href="{{ route('site.index') }}">Home</a></li>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Categorias <i class="material-icons right">expand_more</i></a></li>
            <li><a href="#">Carrinho</a></li>
          </ul>
        </div>
      </nav>

    @yield('content')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>

    var droparElemento = document.querySelectorAll('.dropdown-trigger');
    var instanciarDrop = M.Dropdown.init(droparElemento, {
        coverTrigger: false,
        constrainWidth: false
    });

    </script>
</body>
</html>
