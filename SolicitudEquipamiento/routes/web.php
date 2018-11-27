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

Route::get('/', 'UsuarioController@vista');

Route::post('IniciarSesion', 'UsuarioController@iniciar');

Route::get('/Solicitud', 'SolicitudController@mostrar')->name('Solicitud');

Route::get('solicitud/{id}', 'SolicitudController@select');

Route::post('/Solicitud', 'SolicitudController@generar')->name('generar');



Route::get('/Solicitud/buscar-equipo', 'SolicitudController@buscarEquipo')->name('Solicitud.buscar-equipo');

Route::get('/Filtrar', 'EquipoController@Filtrar');

Route::get('ListaSolicitudes', 'SolicitudController@listarSolicitud');

Route::post('/ListaSolicitud','SolicitudController@filtrarSolicitud')->name('Buscar');

Route::get('/create','EquipoController@vista');

Route::post('/create', 'EquipoController@create');

Route::post('/crear','EquipoController@create');

Route::get('/DetalleDeEquipo/{id}', 'EquipoController@show');

Route::get('/ListarEquipos','EquipoController@read');

Route::get('/DetalleDeEquipo', 'EstadoEquipoController@read');

Route::get('/DetalleDeEquipo', 'EquipoController@show');

Route::get('/AgregarEquipo', 'TipoDeEquipoController@read');


Route::get('/detalle', 'ticket@detalle');

Route::get('/detalle-soporte', 'ticketSoporte@detalleS');


Route::get('/delete', 'EquipoController@delete');

Route::any('/update', 'EquipoController@update');