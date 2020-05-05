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

// Companies
Route::prefix('companies')->group(function () {
	Route::get('/', 'CompaniesController@index')->name('companies.index');
	Route::get('/create', 'CompaniesController@create')->name('companies.create');
	Route::post('/store', 'CompaniesController@store')->name('companies.store');
	Route::get('/{id}/edit', 'CompaniesController@edit')->name('companies.edit');
	Route::put('/{id}/update', 'CompaniesController@update')->name('companies.update');
	Route::get('/{id}/show', 'CompaniesController@show')->name('companies.show');
	Route::delete('/{id}/destroy', 'CompaniesController@destroy')->name('companies.destroy');
});

// Employees
Route::prefix('employees')->group(function () {
	Route::get('/', 'EmployeesController@index')->name('employees.index');
	Route::get('/create', 'EmployeesController@create')->name('employees.create');
	Route::post('/store', 'EmployeesController@store')->name('employees.store');
	Route::get('/{id}/edit', 'EmployeesController@edit')->name('employees.edit');
	Route::put('/{id}/update', 'EmployeesController@update')->name('employees.update');
	Route::get('/{id}/show', 'EmployeesController@show')->name('employees.show');
	Route::delete('/{id}/destroy', 'EmployeesController@destroy')->name('employees.destroy');
});

Route::get('/dashbord', 'DashController@index')->name('dashbord.index');
Route::get('/dash', 'DashController@index')->name('dashbord.index');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/store', 'HomeController@store')->name('home.store');

Auth::routes();
