<?php

namespace App\Http\Controllers;

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

    public function detalhes($slug)
    {
        $produto = Produto::where('slug', $slug)->first();

        return view('site.detalhes', compact('produto'));
    }
}
