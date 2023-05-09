<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function Index()
    {
        // $produtos = Produto::all();
        $produtos = Produto::paginate(3);

        return view('site.home', compact('produtos'));
    }

    public function Detalhes($slug)
    {
        $produto = Produto::where('slug', $slug)->first();

        return view('site.detalhes', compact('produto'));
    }

    public function Categorias($id)
    {
        $produtos = Produto::where('categoria_id', $id)->paginate(3);

        $categoria = Categoria::find($id);

        return view('site.categorias', compact('produtos', 'categoria'));
    }
}
