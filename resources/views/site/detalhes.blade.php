@extends('../layouts.layout')

@section('title', 'Home')

@section('content')

    <div class="row container"> <br>
        <div class="col s12 m6">
            <img src="{{ $produto->imagem }}" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h4>{{ $produto->nome }}</h4>
            <h3>R${{ number_format($produto->preco, 2, ',', '.') }}</h3>
            <p>{{ $produto->descricao }}</p>
            <p>Postado por: {{ $produto->TabelaUserRelacionamento->firstName }}</p>
            <p>Categoria de: {{ $produto->TabelaCategoriaRelacionamento->nome }}</p>
            <button class="btn orange btn-large">Comprar</button>
        </div>
    </div>

@endsection
