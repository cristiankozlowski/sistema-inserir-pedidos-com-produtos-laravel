<?php

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

/** Renomeando os nomes de url */
Route::resourceVerbs([
    'create' => 'cadastrar',
    'edit' => 'editar'
]);

Route::get('/', function () {
    return view('welcome');
});

/** Rotas para os produtos */
Route::resource('produtos', 'ProductController')->names('products')->parameters(['produtos' => 'product']);

/** Rotas para os pedidos */
Route::resource('pedidos', 'OrderController')->names('orders')->parameters(['pedidos' => 'order']);
