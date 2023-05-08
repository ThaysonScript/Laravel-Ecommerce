<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function Index()
    {
        //$produtos = Produto::all();

        //return view('welcome', [dd($produtos)]);
        return view('site.home');
    }

    public function show($id = 0)
    {
        return 'este e o produto: ' . $id;
    }
}
