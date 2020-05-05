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

// nomeada
Route::any('/nomeada', function(){
	return 'tipo nomeada';
})->name('rota.nomeada');

// redirecionando para o nomeada
Route::any('/redirecionando', function(){
	return redirect()->route('rota.nomeada');
});

// todos os tipos
Route::any('/any', function(){
	return 'tipo any (todos os tipos)';
});

// array com os tipos de requisição
Route::match(['post', 'get'], '/match', function(){
	return 'tipo match (array com os tipos de requisição)';
});

Route::post('/post', function(){
	return 'tipo post';
});

// com parametro
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
