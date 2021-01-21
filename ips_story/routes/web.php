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

Route::resource('/venda/cliente', 'venda\cliente\clienteController');
Route::resource('/venda/artigo', 'venda\artigo\artigosController');
Route::resource('/venda/orcamento', 'venda\orcamento\cotacaoController');



});