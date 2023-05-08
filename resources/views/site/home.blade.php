@extends('../layouts.layout')

@section('title', 'Home')

@section('content')

    @foreach ($produtos as $produto)

        <div class="row container">
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                    <img src="{{ $produto->imagem }}">
                    <a href="{{ route('site.detalhes', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">remove_red_eye</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ Str::limit($produto->nome, 20) }}</span>
                        <p>{{ Str::limit($produto->descricao, 40) }}.</p>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

    <div class="row center">
        {{ $produtos->links('pagination::default') }}
    </div>

@endsection
