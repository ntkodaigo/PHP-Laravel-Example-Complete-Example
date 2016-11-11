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
Route::get('/paises/{pais}/details', 'paisController@show');

Route::patch('/paises/{pais}', 'paisController@update');

//eliminar pais
Route::delete('/paises/{pais}/delete', 'paisController@delete');


// Departamentos
//insertar Departamentos
Route::get('/departamentos','DepartamentoController@index');
Route::post('/departamentos/add','DepartamentoController@store');

//editar Departamentos
Route::get('/departamentos/{departamento}/edit', 'DepartamentoController@edit');
Route::patch('/departamentos/{departamento}', 'DepartamentoController@update');

//eliminar Departamentos
Route::delete('/departamentos/{departamento}/delete', 'DepartamentoController@delete');






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
Route::patch('/marcas/add','marcaController@store');
//Route::post('/marcas/add','marcaController@newMarca');

//editar categoria de Servicios
Route::get('/marcas/{marca}/edit', 'marcaController@edit');
Route::get('/marcas/{marca}/details', 'marcaController@show');
Route::patch('/marcas/{marca}', 'marcaController@update');

//eliminar categoria de Servicios
Route::get('/marcas/{marca}/delete', 'marcaController@delete');

// Modelos
//insertar Modelo
Route::get('/modelos','ModelosController@index');
Route::post('/modelos/add','ModelosController@store');

//editar Modelo
Route::get('/modelos/{modelo}/edit', 'ModelosController@edit');
Route::patch('/modelos/{modelo}', 'ModelosController@update');

//eliminar Modelo
Route::delete('/modelos/{modelo}/delete', 'ModelosController@delete');


// Corrreoelectronico
//insertar Corrreoelectronico
Route::get('/correoelectronicos','CorreoelectronicosController@index');
Route::post('/correoelectronicos/add','CorreoelectronicosController@store');

//editar Corrreoelectronico
Route::get('/correoelectronicos/{correoelectronico}/edit', 'CorreoelectronicosController@edit');
Route::patch('/correoelectronicos/{correoelectronico}', 'CorreoelectronicosController@update');

//eliminar Corrreoelectronico
Route::delete('/correoelectronicos/{correoelectronico}/delete', 'CorreoelectronicosController@delete');

//Subcategoria Productos Rutas
//insertar subcategoria de producto
Route::get('/subcategoriaproductos','subcategoriaproductoController@index');
Route::post('/subcategoriaproductos/add','subcategoriaproductoController@store');

//editar subcategoria de producto
Route::get('/subcategoriaproductos/{subcategoriaproducto}/edit', 'subcategoriaproductoController@edit');
Route::patch('/subcategoriaproductos/{subcategoriaproducto}', 'subcategoriaproductoController@update');

//eliminar subcategoria de producto
Route::delete('/subcategoriaproductos/{subcategoriaproducto}/delete', 'subcategoriaproductoController@delete');

//subcategoria de Servicios Rutas
//insertar categoria de Servicios
Route::get('/subcategoriaservicios','subcategoriaservicioController@index');
Route::post('/subcategoriaservicios/add','subcategoriaservicioController@store');

//editar subcategoria de Servicios
Route::get('/subcategoriaservicios/{subcategoriaservicio}/edit', 'subcategoriaservicioController@edit');
Route::patch('/subcategoriaservicios/{subcategoriaservicio}', 'subcategoriaservicioController@update');

//eliminar subcategoria de Servicios
Route::delete('/subcategoriaservicios/{subcategoriaservicio}/delete', 'subcategoriaservicioController@delete');

//Sugerencia precio articulos Rutas
//insertar Sugerencia precio articulos
Route::get('/sugerenciaprecioarticulos','sugerenciaprecioarticuloController@index');
Route::post('/sugerenciaprecioarticulos/add','sugerenciaprecioarticuloController@store');

//editar Sugerencia precio articulos
Route::get('/sugerenciaprecioarticulos/{subcategoriaservicio}/edit', 'sugerenciaprecioarticuloController@edit');
Route::patch('/sugerenciaprecioarticulos/{subcategoriaservicio}', 'sugerenciaprecioarticuloController@update');

//eliminar Sugerencia precio articulos
Route::delete('/sugerenciaprecioarticulos/{subcategoriaservicio}/delete', 'sugerenciaprecioarticuloController@delete');



//buscar cliente
Route::get('datatables', 'ClientesController@getIndex');
Route::get('data', 'ClientesController@data');
//Route::post('/deletemarca','ClientesController@deleteMarca');
// Clientes
Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/new', 'ClientesController@fillNew');
Route::post('/clientes/add', 'ClientesController@store');
Route::get('/clientes/{cliente}/show', 'ClientesController@store');

Route::post('/clientes/update', 'ClientesController@update');
Route::post('/clientes/{cliente}/delete', 'ClientesController@store');

