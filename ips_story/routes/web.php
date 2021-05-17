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
    Route::get('/home', 'HomeController@index');


Route::resource('/venda/artigo', 'venda\artigo\artigosController');
Route::get('/venda/Artigo', 'venda\artigo\artigosController@store1')->name('artigo.store1');
Route::get('/venda/Artigo/add_preco/{id}', 'venda\artigo\artigosController@add_preco')->name('artigo.add_preco');
Route::get('/venda/Artigo/add_armazem/{id}', 'venda\artigo\artigosController@add_armazem')->name('artigo.add_armazem');
Route::get('/venda/Artigo/add_stok/{id}', 'venda\artigo\artigosController@add_stok')->name('artigo.add_stok');
Route::get('/venda/Artigo/alterar_status_preco/{status}/{preco_id}/{artigo_id}', 'venda\artigo\artigosController@alterar_status_preco')->name('artigo.alterar_status_preco');
Route::get('/venda/Artigo/alterar_stock_minimax/{artigo}', 'venda\artigo\artigosController@alterar_stock_minimax')->name('artigo.alterar_stock_minimax');

Route::resource('/venda/orcamento', 'venda\orcamento\cotacaoController');
Route::get('/venda/Orcamento/store1', 'venda\orcamento\cotacaoController@store1')->name('orcamento.store1');
Route::get('/venda/Orcamento/add_artigo/{cotacao}', 'venda\orcamento\cotacaoController@add_artigo')->name('orcamento.add_artigo');
Route::get('/venda/Orcamento/remove_artigo/{id}', 'venda\orcamento\cotacaoController@remove_artigo')->name('orcamento.remove_artigo');
Route::get('/venda/Orcamento/Alter_artigo/{atigo}', 'venda\orcamento\cotacaoController@Alter_artigo')->name('orcamento.Alter_artigo');
Route::get('/venda/Orcamento/validar_cotacao/{cotacao}', 'venda\orcamento\cotacaoController@validar_cotacao')->name('orcamento.validar_cotacao');
Route::get('/venda/Orcamento/detalhes_orcamento/{cotacao}', 'venda\orcamento\cotacaoController@detalhes')->name('orcamento.detalhes');
Route::get('/venda/Orcamento/alterar_orcamento/{cotacao}', 'venda\orcamento\cotacaoController@alterar_orcamento')->name('orcamento.alterar_orcamento');
Route::get('/venda/Orcamento/salvar_alteracao/{cotacao}', 'venda\orcamento\cotacaoController@salvar_alteracao')->name('orcamento.salvar_alteracao');


Route::apiResource('orcamento.artigos', 'venda\orcamento\CotacaoArtigoController');

Route::resource('/venda/cliente', 'venda\cliente\clienteController');
Route::get('/venda/Cliente', 'venda\cliente\clienteController@store1')->name('cliente.store1');
Route::match(['get', 'post'],'/venda/Cliente/update/{id}', 'venda\cliente\clienteController@update1')->name('cliente.update1');
Route::get('/venda/Cliente/destroy/{id}', 'venda\cliente\clienteController@destroy1')->name('cliente.destroy1');

Route::resource('/inventario/iventario_artigo', 'inventario\inventarioController');

Route::resource('/despesas/despesas', 'despesas\despesasController');
Route::get('/despesas/Despesas', 'despesas\despesasController@store1')->name('despesa.store1');

Route::resource('/venda/fatura', 'venda\fatura\faturaController');
Route::get('/venda/fatura/add_artigo/{fatura}', 'venda\fatura\faturaControllerr@add_artigo')->name('fatura.add_artigo');

Route::get('pdf/{cotacoes}', 'pdfController@gerapdf')->name('cotacao.pdf');



});