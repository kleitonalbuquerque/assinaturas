<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('phones')->group(function () {
    Route::get('/getphonescompany/{id}', 'PhonesController@getPhonesCompany')->name('phones.getphonescompany');
    Route::post('/store', 'PhonesController@store')->name('phones.store');
    Route::get('/destroy/{id}', 'PhonesController@destroy')->name('phones.destroy');
});

Route::get('employees/validate/{value}', 'EmployeesController@validateEmployee')->name('employees.validate');

Route::prefix('cities')->group(function () {
    Route::get('/getcitiesstate/{id}', 'CitiesController@getCitiesState')->name('cities.getcitiesstate');
});