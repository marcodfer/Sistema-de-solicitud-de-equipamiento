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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create','EquipoController@vista');
Route::post('/create', 'EquipoController@create');
Route::post('/crear','EquipoController@create');

Route::get('/Detalle_del_equipo', 'EstadoEquipoController@read');

Route::get('/equipoAdm', 'TipoEquipoController@read');

Route::post('/layout', 'logincontrollerSE@layout');

Route::post('/layoutAdm', 'logincontrollerSE@layoutAdm');

Route::get('/layout', 'layoutA@inicio');

Route::get('/ticket', 'layoutA@ticket');

Route::get('/detalle', 'ticket@detalle');

Route::get('/ticket-soporte', 'layoutAdm@ticketS');

Route::get('/layoutAdm', 'layoutAdm@layoutAdm');

Route::get('/Inventario', 'layoutAdm@Inventario');

//Route::get('/equipoAdm', 'layoutAdm@equipoAdm');

Route::get('/detalle-soporte', 'ticketSoporte@detalleS');

//Route::get('/detalleEquipo', 'Inventario@detalleEquipo');