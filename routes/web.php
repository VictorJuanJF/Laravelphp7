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

Route::get('/', 'InicioController@index')->name('inicio');

Auth::routes(); //brus

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/products','ProductController@index'); //listado
Route::get('/admin/products/create','ProductController@create'); //formulario registro
Route::post('/admin/products','ProductController@store'); //registrar
Route::get('/admin/products/{id}/edit','ProductController@edit'); //editar
Route::post('/admin/products/{id}/edit','ProductController@update'); //guardar edicion
Route::delete('/admin/products/{id}','ProductController@destroy'); //Eliminar

//CR
//UD
