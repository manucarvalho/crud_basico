<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos/novo', [ProdutosController::class, 'create']);
Route::post('/produtos/novo', [ProdutosController::class, 'store'])->name('registrar_produto');
Route::get('/produto/ver/{id}', [ProdutosController::class, 'show']);
Route::get('/produto/editar/{id}', [ProdutosController::class, 'edit']);
Route::post('/produto/editar/{id}', [ProdutosController::class, 'update'])->name('alterar_produto');
Route::get('/produto/excluir/{id}', [ProdutosController::class, 'delete']);
Route::post('/produto/excluir/{id}', [ProdutosController::class, 'destroy'])->name('excluir_produto');
Route::get('/produtos', [ProdutosController::class, 'index']);
Route::get('/produtos/export/', [ProdutosController::class, 'export'])->name('produtos_export');
Route::get('/produtos/export-pdf/', [ProdutosController::class, 'exportPDF'])->name('produtos_export_pdf');

Route::get('/vendedores/novo', [VendedorController::class, 'create']);
Route::post('/vendedores/novo', [VendedorController::class, 'store'])->name('registrar_vendedor');