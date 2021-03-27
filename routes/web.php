<?php

use Illuminate\Support\Facades\Route;

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

Route::get('crear','EmpleadosController@create');
Route::post('/crear','EmpleadosController@store');
Route::get('/','EmpleadosController@index');
Route::get('editar/{id}','EmpleadosController@show');
Route::post('editar/{id}','EmpleadosController@update');
Route::get('eliminar/{id}','EmpleadosController@destroy');
