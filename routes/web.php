<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Tipo Impuesto Rutas

//insertar Tipo Impuesto
Route::get('/tipoimpuestos','tipoimpuestoController@index');
Route::post('/tipoimpuestos/add','tipoimpuestoController@store');
//editar Tipo Impuesto
Route::get('/tipoimpuestos/{tipoimpuesto}/edit', 'tipoimpuestoController@edit');
Route::patch('/tipoimpuestos/{tipoimpuesto}', 'tipoimpuestoController@update');
//eliminar Tipo Impuesto
Route::delete('/tipoimpuestos/{tipoimpuesto}/delete', 'tipoimpuestoController@delete');

//Pais Rutas

//insertar pais
Route::get('/paises','paisController@index');
Route::post('/paises/add','paisController@store');

//editar pais
Route::get('/paises/{pais}/edit', 'paisController@edit');
Route::patch('/paises/{pais}', 'paisController@update');

//eliminar pais
Route::delete('/paises/{pais}/delete', 'paisController@delete');

//Tipo Documentos Rutas

//insertar tipo documento
Route::get('/tipodocumentos','tipodocumentoController@index');
Route::post('/tipodocumentos/add','tipodocumentoController@store');

//editar tipo documento
Route::get('/tipodocumentos/{tipodocumento}/edit', 'tipodocumentoController@edit');
Route::patch('/tipodocumentos/{tipodocumento}', 'tipodocumentoController@update');

//eliminar tipo documento
Route::delete('/tipodocumentos/{tipodocumento}/delete', 'tipodocumentoController@delete');

//Tipo telefonos Rutas
//insertar tipo telefono
Route::get('/tipotelefonos','tipotelefonoController@index');
Route::post('/tipotelefonos/add','tipotelefonoController@store');

//editar tipo telefono
Route::get('/tipotelefonos/{tipotelefono}/edit', 'tipotelefonoController@edit');
Route::patch('/tipotelefonos/{tipotelefono}', 'tipotelefonoController@update');

//eliminar tipo telefono
Route::delete('/tipotelefonos/{tipotelefono}/delete', 'tipotelefonoController@delete');


//Tipo Telefono Rutas
//insertar tipo telefono
Route::get('/tipoprofesions','tipoprofesionController@index');
Route::post('/tipoprofesions/add','tipoprofesionController@store');

//editar tipo telefono
Route::get('/tipoprofesions/{tipoprofesion}/edit', 'tipoprofesionController@edit');
Route::patch('/tipoprofesions/{tipoprofesion}', 'tipoprofesionController@update');

//eliminar tipo telefono
Route::delete('/tipoprofesions/{tipoprofesion}/delete', 'tipoprofesionController@delete');

//Genero Rutas
//insertar genero
Route::get('/generos','generoController@index');
Route::post('/generos/add','generoController@store');

//editar genero
Route::get('/generos/{genero}/edit', 'generoController@edit');
Route::patch('/generos/{genero}', 'generoController@update');

//eliminar genero
Route::delete('/generos/{genero}/delete', 'generoController@delete');

//Categoria de Productos Rutas
//insertar categoria de producto
Route::get('/categoriaproductos','categoriaproductoController@index');
Route::post('/categoriaproductos/add','categoriaproductoController@store');

//editar categoria de producto
Route::get('/categoriaproductos/{categoriaproducto}/edit', 'categoriaproductoController@edit');
Route::patch('/categoriaproductos/{categoriaproducto}', 'categoriaproductoController@update');

//eliminar categoria de producto
Route::delete('/categoriaproductos/{categoriaproducto}/delete', 'categoriaproductoController@delete');


//Categoria de Servicios Rutas
//insertar categoria de Servicios
Route::get('/categoriaservicios','categoriaservicioController@index');
Route::post('/categoriaservicios/add','categoriaservicioController@store');

//editar categoria de Servicios
Route::get('/categoriaservicios/{categoriaservicio}/edit', 'categoriaservicioController@edit');
Route::patch('/categoriaservicios/{categoriaservicio}', 'categoriaservicioController@update');

//eliminar categoria de Servicios
Route::delete('/categoriaservicios/{categoriaservicio}/delete', 'categoriaservicioController@delete');


// Marca Rutas
//insertar categoria de Servicios
Route::get('/marcas','marcaController@index');
Route::post('/marcas/add','marcaController@store');

//editar categoria de Servicios
Route::get('/marcas/{marca}/edit', 'marcaController@edit');
Route::patch('/marcas/{marca}', 'marcaController@update');

//eliminar categoria de Servicios
Route::delete('/marcas/{marca}/delete', 'marcaController@delete');