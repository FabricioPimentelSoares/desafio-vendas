<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('fabricantes', 'FabricanteController');
    Route::resource('produtos', 'ProdutoController');
    Route::resource('clientes', 'ClienteController');
    Route::resource('Vendas', 'VendaController');
});