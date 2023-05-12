@extends('../layouts.layout')

@section('title', 'Carrinho')

@section('content')

<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Parabens!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($mensagem = Session::get('aviso'))
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title">Tudo bem!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if ($items->count() == 0)

        <div class="card orange">
            <div class="card-content white-text">
                <span class="card-title">O carrinho esta vazio!</span>
                <p>Aproveite para adicionar produtos</p>
            </div>
        </div>
        
    @else
        
        <h5>Seu carrinho tem {{ $items->count() }} produtos </h5>

        <table class="striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Preco</th>
                    <th>Quantidade</th>
                    <th></th>
                </tr>
            </thead>

            @foreach ($items as $item)
                <tbody>
                    <tr>
                        <td>
                            <img src="{{ $item->atributes->image }}" alt="img" width="70" class="responsive-img circle">
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            R${{ number_format($item->price, 2, ',', '.') }}
                        </td>

                        {{-- BTN ATUALIZAR --}}
                        <form action="{{ route('site.atualizarCarrinho') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <td>
                                <input type="number" style="width: 40px; font-weight:900;" name="quantity" id="" value="{{ $item->quantity }}">
                            </td>
                            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                        </form>


                        {{-- BTN REMOVER --}}
                        <td>
                            <form action="{{ route('site.removerCarrinho') }}" method="post" enctype="multipar/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                            </form>
                            
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>

        <h5>Valor Total: R${{ number_format(\Cart::getTotal, 2, ',', '.') }}</h5>

        <div class="row container center">
            <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{ route('site.limparCarrinho') }}" class="btn waves-effect waves-light blue">Limpar Carrinho<i class="material-icons right">clear</i></a>
            <button class="btn waves-effect waves-light green">Finalizar Pedido<i class="material-icons right">check</i></button>
        </div>

    @endif


</div>

@endsection
