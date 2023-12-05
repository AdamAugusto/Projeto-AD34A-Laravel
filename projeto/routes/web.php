<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/item/create', [ItemController::class, 'create'])->middleware(['auth']);
Route::post('/item/store', [ItemController::class, 'store'])->middleware(['auth']);
Route::post('/item/remove/{id}', [ItemController::class, 'remove'])->middleware(['auth']);
Route::get('/carrinho', [CarrinhoController::class, 'navigate']);
Route::get('/comprar/{id}', [CarrinhoController::class, 'adicionarCarrinho']);
Route::get('/carrinho/excluir', [CarrinhoController::class, 'excluirCarrinho']);
Route::get('/carrinho/removerItem/{id}', [CarrinhoController::class, 'removerItem']);
Route::get('/conta', [ContaController::class, 'navigate'])->middleware(['auth']);
Route::get('/conta/configurar', [ContaController::class, 'configurar'])->middleware(['auth']);
Route::get('/adicionarCartao', [CartaoController::class, 'navigate'])->middleware(['auth']);
Route::post('/adicionarCartao/store', [CartaoController::class, 'store'])->middleware(['auth']);
Route::get('/adicionarEndereco', [EnderecoController::class, 'create'])->middleware(['auth']);
Route::get('/editarEndereco', [EnderecoController::class, 'edit'])->middleware(['auth']);
Route::post('/endereco/store', [EnderecoController::class, 'store'])->middleware(['auth']);
Route::post('/endereco/update/{id}', [EnderecoController::class, 'update'])->middleware(['auth']);
Route::get('conta/editarEndereco', [EnderecoController::class, 'navigate'])->middleware(['auth']);
Route::get('/pedido/edit/{id}', [PedidoController::class, 'edit'])->middleware(['auth']);
Route::get('/pedido/update/{id}/{message}', [PedidoController::class, 'update'])->middleware(['auth']);
Route::get('/finalizarCompra', [PedidoController::class, 'storeItemPedido'])->middleware(['auth']);
Route::get('/pedidos/show', [PedidoController::class, 'show'])->middleware(['auth']);
Route::post('/user/update/{id}', [UserController::class, 'update'])->middleware(['auth']);
Route::get('/user/remove/{id}', [UserController::class, 'remove'])->middleware(['auth']);