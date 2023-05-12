<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'Index'])->name('site.index');    // index do site
Route::get('/produto/{slug}', [SiteController::class, 'Detalhes'])->name('site.detalhes');  // mostrar mais informacoes do produto clicado e construir um uri/slug amigavel

Route::get('/categorias/{id}', [SiteController::class, 'Categorias'])->name('site.categorias');


//  CRUD
// listar items do carrinho
Route::get('/carrinho', [CarrinhoController::class, 'ListarCarrinho'])->name('site.carrinho');

// adicionar ao carrinho
Route::post('/carrinho', [CarrinhoController::class, 'AdicionarCarrinho'])->name('site.addCarrinho');


// remover carrinho
Route::post('/remover', [CarrinhoController::class, 'RemoverCarrinho'])->name('site.removerCarrinho');

// atualizar carrinho
Route::post('/atualizar', [CarrinhoController::class, 'AtualizarCarrinho'])->name('site.atualizarCarrinho');

// limpar carrinho
Route::get('/limpar', [CarrinhoController::class, 'LimparCarrinho'])->name('site.limparCarrinho');

