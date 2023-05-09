<?php

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
