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

Route::get('/CerrarSesion', 'UsuarioController@cerrarSesion');

Route::get('/Solicitud', 'SolicitudController@mostrar')->name('Solicitud');

Route::get('/Solicitud/generar-sala', 'SolicitudController@select')->name('Solicitud.generar-sala');

Route::post('/Solicitud', 'SolicitudController@generar')->name('generar');

Route::get('/ListarEquipos/filtrar', 'EquipoController@FiltrarEquipo')->name('ListaEquipos.filtrar');

Route::get('ListaSolicitudes/Buscar', 'SolicitudController@FiltrarSol')->name('ListaSolicitudes.Buscar');

Route::get('/Solicitud/Detalle/{id}','DetalleController@showDetalle');

Route::get('quitarEquipo/{idEquipo}/{idSolicitud}', 'DetalleController@quitarEquipo');

Route::get('/Solicitud/validar-rut', 'SolicitudController@validarRut')->name('Solicitud.validar-rut');

Route::post('/Solicitud/Detalle/modificar', 'DetalleController@modificar')->name('modificar');

Route::get('/Solicitud/buscar-equipo', 'SolicitudController@buscarEquipo')->name('Solicitud.buscar-equipo');

Route::get('ListaSolicitudes','SolicitudController@vistas');

Route::get('/Solicituds', 'DynamicPDFController@vista');//prueba


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
Route::post('/update', 'EquipoController@update');