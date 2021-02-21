<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::middleware(['auth'])->group(function () {

Route::get('/', 'HomeController@index');


Route::resource('/venda/artigo', 'venda\artigo\artigosController');
Route::get('/venda/Artigo', 'venda\artigo\artigosController@store1')->name('artigo.store1');

Route::resource('/venda/orcamento', 'venda\orcamento\cotacaoController');

Route::resource('/venda/cliente', 'venda\cliente\clienteController');
Route::get('/venda/Cliente', 'venda\cliente\clienteController@store1')->name('cliente.store1');
Route::get('/venda/Cliente/update/{id}', 'venda\cliente\clienteController@update1')->name('cliente.update1');
Route::get('/venda/Cliente/destroy/{id}', 'venda\cliente\clienteController@destroy1')->name('cliente.destroy1');

Route::resource('/inventario/iventario_artigo', 'inventario\inventarioController');

Route::resource('/despesas/despesas', 'despesas\despesasController');
Route::get('/despesas/Despesas', 'despesas\despesasController@store1')->name('despesa.store1');





});