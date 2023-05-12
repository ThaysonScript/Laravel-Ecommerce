<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function ListarCarrinho()
    {
        $items = \Cart::getContent();
        return view('site.carrinho', compact('items'));
    }

    public function AdicionarCarrinho(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'atributes' => 'required',
        ]);


        \Cart::add(array(
            $validatedData['id'] => $request->id,
            $validatedData['name'] => $request->nome,
            $validatedData['price'] => $request->preco,
            $validatedData['quantity'] => abs($request->quantidade),
            $validatedData['atributes'] => array(
                'image' => $request->imagem
            )
        ));

        return redirect()->route('site.carrinho')->with('sucesso', 'produto adicionado no carrinho');
    }

    public function RemoverCarrinho(Request $request)
    {
        \Cart::remove($request->id);

        return redirect()->route('site.carrinho')->with('sucesso', 'produto removido no carrinho');
    }

    public function AtualizarCarrinho(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'produto atualizado no carrinho');
    }

    public function LimparCarrinho()
    {
        \Cart::clear();

        return redirect()->route('site.carrinho')->with('aviso', 'carrinho foi limpo');
    }
}