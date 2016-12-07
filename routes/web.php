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
Route::get('/categoriaproductos/data','categoriaproductoController@data');
Route::post('/categoriaproductos/add','categoriaproductoController@store');

//editar categoria de producto
Route::get('/categoriaproductos/{categoriaproducto}/edit', 'categoriaproductoController@edit');
Route::patch('/categoriaproductos/{categoriaproducto}', 'categoriaproductoController@update');

//eliminar categoria de producto
Route::post('/categoriaproductos/{categoriaproducto}/delete', 'categoriaproductoController@delete');


//Categoria de Servicios Rutas
//insertar categoria de Servicios
Route::get('/categoriaservicios','categoriaservicioController@index');
Route::get('/categoriaservicios/data','categoriaservicioController@data');
Route::post('/categoriaservicios/add','categoriaservicioController@store');

//editar categoria de Servicios
Route::get('/categoriaservicios/{categoriaservicio}/edit', 'categoriaservicioController@edit');
Route::patch('/categoriaservicios/{categoriaservicio}', 'categoriaservicioController@update');

//eliminar categoria de Servicios
Route::post('/categoriaservicios/{categoriaservicio}/delete', 'categoriaservicioController@delete');


// Marca Rutas
Route::get('/marcas', 'marcaController@index');
Route::get('marcasData', 'marcaController@data');
//Route::post('/deletemarca','ClientesController@deleteMarca');
Route::patch('/marcas/add','marcaController@store');
//editar categoria de Servicios
Route::get('/marcas/{marca}/edit', 'marcaController@edit');
Route::get('/marcas/{marca}/details', 'marcaController@show');
Route::patch('/marcas/{marca}', 'marcaController@update');
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
Route::get('/subcategoriaproductos/data','subcategoriaproductoController@data');
Route::patch('/subcategoriaproductos/{subcategoriaproducto}', 'subcategoriaproductoController@update');

//eliminar subcategoria de producto
Route::post('/subcategoriaproductos/{subcategoriaproducto}/delete', 'subcategoriaproductoController@delete');

//subcategoria de Servicios Rutas
//insertar categoria de Servicios
Route::get('/subcategoriaservicios','subcategoriaservicioController@index');
Route::get('/subcategoriaservicios/data','subcategoriaservicioController@data');
Route::post('/subcategoriaservicios/add','subcategoriaservicioController@store');

//editar subcategoria de Servicios
Route::get('/subcategoriaservicios/{subcategoriaservicio}/edit', 'subcategoriaservicioController@edit');
Route::patch('/subcategoriaservicios/{subcategoriaservicio}', 'subcategoriaservicioController@update');

//eliminar subcategoria de Servicios
Route::post('/subcategoriaservicios/{subcategoriaservicio}/delete', 'subcategoriaservicioController@delete');

//Sugerencia precio articulos Rutas
//insertar Sugerencia precio articulos
Route::get('/sugerenciaprecioarticulos','sugerenciaprecioarticuloController@index');
Route::post('/sugerenciaprecioarticulos/add','sugerenciaprecioarticuloController@store');

//editar Sugerencia precio articulos
Route::get('/sugerenciaprecioarticulos/{subcategoriaservicio}/edit', 'sugerenciaprecioarticuloController@edit');
Route::patch('/sugerenciaprecioarticulos/{subcategoriaservicio}', 'sugerenciaprecioarticuloController@update');

//eliminar Sugerencia precio articulos
Route::delete('/sugerenciaprecioarticulos/{subcategoriaservicio}/delete', 'sugerenciaprecioarticuloController@delete');


// Productos
//insertar Producto
Route::get('/productos','ProductosController@index');
Route::get('/productos/new','ProductosController@fillNew');
Route::get('/productos/data','ProductosController@data');
Route::get('/productos/dataCompras','ProductosController@dataCompras');
Route::get('/productos/dataProveedor/{proveedor}','ProductosController@dataProveedor');
Route::post('/productos/add','ProductosController@store');

//editar Producto
Route::get('/productos/edit/{producto}','ProductosController@edit');
Route::patch('/productos/{producto}', 'ProductosController@update');

//eliminar Producto
Route::post('/productos/{producto}/delete', 'ProductosController@delete');

// --- SERVICIOS ---
Route::get('/serviciosData/select','ServiciosController@serviciosDataToSelect');
//insertar Servicios
Route::get('/servicios','ServiciosController@index');
Route::get('/servicios/new','ServiciosController@fillNew');
Route::get('/servicios/data','ServiciosController@data');
Route::post('/servicios/add','ServiciosController@store');

//editar Servicios
Route::get('/servicios/edit/{servicio}','ServiciosController@edit');
Route::patch('/servicios/{servicio}', 'ServiciosController@update');

//eliminar Servicios
Route::post('/servicios/{servicio}/delete', 'ServiciosController@delete');

// Almacen
//insertar Almacen
Route::get('/almacenes','AlmacenesController@index');
Route::get('/almacenes/new','AlmacenesController@fillNew');
Route::get('/almacenes/data','AlmacenesController@data');
Route::post('/almacenes/add','AlmacenesController@store');

//editar Almacen
Route::get('/almacenes/edit/{almacen}','AlmacenesController@edit');
Route::patch('/almacenes/{almacen}', 'AlmacenesController@update');

//eliminar Almacen
Route::post('/almacenes/{almacen}/delete', 'AlmacenesController@delete');

// Compras
//insertar Compras
Route::get('/compras','ComprasController@index');
Route::get('/compras/new','ComprasController@fillNew');
Route::get('/compras/data','ComprasController@data');
Route::post('/compras/add','ComprasController@store');

//editar Compras
Route::get('/compras/edit/{compra}','ComprasController@edit');
Route::patch('/compras/{compra}', 'ComprasController@update');

//eliminar Compras
Route::post('/compras/{compra}/delete', 'ComprasController@delete');


// Proveedorproductos
//insertar Proveedorproductos
Route::get('/proveedorproductos','ProveedorproductoController@index');
Route::get('/proveedorproductos/new','ProveedorproductoController@fillNew');
Route::get('/proveedorproductos/data','ProveedorproductoController@data');
Route::post('/proveedorproductos/add','ProveedoresController@storeProducto');

//editar Proveedorproductos
Route::get('/proveedorproductos/edit/{proveedorproducto}','ProveedorproductoController@edit');
Route::patch('/proveedorproductos/{proveedorproducto}', 'ProveedorproductoController@update');

//eliminar Proveedorproductos
Route::post('/proveedorproductos/{proveedorproducto}/delete', 'ProveedorproductoController@delete');

//buscar cliente
//Route::get('datatables', 'ClientesController@getIndex');
//Route::get('data', 'ClientesController@data');
//Route::post('/deletemarca','ClientesController@deleteMarca');
// Clientes
// Documentos
Route::get('documentosData/{personanatural}','ClientesController@documentosData');
Route::post('/clientes/pn/{personanatural}/documentos/add', 'ClientesController@storeDocumento');
Route::post('/clientes/pn/{personanatural}/documentos/update', 'ClientesController@updateDocumento');
Route::post('/clientes/pn/{personanatural}/documentos/delete', 'ClientesController@deleteDocumento');

// --- PERSONA ---
Route::get('/personas', 'PersonasController@index');
Route::get('/personasData', 'PersonasController@personasMorphData');
Route::post('/personas/{persona}/searchRoles','PersonasController@searchRoles');
// Nacimiento creacion
Route::post('/personas/{persona}/update/nac-creac', 'PersonasController@updateNC');

// Telefonos
Route::get('telefonosData/{persona}','PersonasController@telefonosData');
Route::post('/p/{persona}/telefonos/add', 'PersonasController@storeTelefono');
Route::post('/p/{persona}/telefonos/update', 'PersonasController@updateTelefono');
Route::post('/p/telefonos/{personatelefono}/delete', 'PersonasController@deleteTelefono');
// Anexo telefono
Route::get('anexosData/{personatelefono}','PersonasController@anexosData');
Route::post('/p/telefonos/{personatelefono}/anexos/add', 'PersonasController@storeAnexoTelefono');
Route::post('/p/telefonos/{personatelefono}/anexos/update', 'PersonasController@updateAnexoTelefono');
Route::post('/p/anexotelefonos/{anexotelefono}/delete', 'PersonasController@deleteAnexoTelefono');
// Direcciones
Route::get('direccionesData/{persona}','PersonasController@direccionesData');
Route::post('/p/{persona}/direcciones/add', 'PersonasController@storeDireccion');
Route::post('/p/{persona}/direcciones/update', 'PersonasController@updateDireccion');
Route::post('/p/direcciones/{direccionpersona}/delete', 'PersonasController@deleteDireccion');
// Ubigeo
Route::post('paises/{pais}/departamentos', 'paisController@getDepartamentos');
Route::post('departamentos/{departamento}/provincias', 'DepartamentoController@getProvincias');
Route::post('provincias/{provincia}/distritos', 'ProvinciasController@getDistritos');
// Correos
Route::get('correosData/{persona}','PersonasController@correosData');
Route::post('/p/{persona}/correos/add', 'PersonasController@storeCorreo');
Route::post('/p/{persona}/correos/update', 'PersonasController@updateCorreo');
Route::post('/p/correos/{correoelectronico}/delete', 'PersonasController@deleteCorreo');
// --- PERSONA NATURAL ---
Route::post('/pn/{personanatural}/update', 'PersonanaturalController@update');
// Documentos
Route::get('documentosData/{personanatural}','PersonanaturalController@documentosData');
Route::post('/pn/{personanatural}/documentos/add', 'PersonanaturalController@storeDocumento');
Route::post('/pn/{personanatural}/documentos/update', 'PersonanaturalController@updateDocumento');
Route::post('/pn/{personanatural}/documentos/delete', 'PersonanaturalController@deleteDocumento');
// Profesiones
Route::get('profesionesData/{personanatural}','PersonanaturalController@profesionesData');
Route::post('/pn/{personanatural}/profesiones/add', 'PersonanaturalController@storeProfesion');
Route::post('/pn/{personanatural}/profesiones/update', 'PersonanaturalController@updateProfesion');
Route::post('/pn/{personanatural}/profesiones/delete', 'PersonanaturalController@deleteProfesion');
// Genero
Route::post('/pn/{personanatural}/update/genero', 'PersonanaturalController@updateGenero');
// --- PERSONA JURIDICA ---
Route::post('/pj/{personajuridica}/update', 'PersonajuridicaController@update');
// --- VEHICULOS ---
Route::get('vehiculosData/select', 'VehiculosController@vehiculosDataToSelect');
Route::post('/vehiculos/add/ajax', 'VehiculosController@storeAjax');
Route::post('/vehiculos/{vehiculo}/update/ajax', 'VehiculosController@updateAjax');
Route::get('/vehiculos', 'VehiculosController@index');
Route::post('/vehiculos/add', 'VehiculosController@store');
Route::post('/vehiculos/{vehiculo}/update', 'VehiculosController@update');
Route::post('/vehiculos/{vehiculo}/delete', 'VehiculosController@delete');
// Marcas
Route::post('marcas/{marca}/modelos','marcaController@getModelos');
// --- CLIENTES ---
// Vehiculos
Route::get('vehiculosData/{cliente}','ClientesController@vehiculosData');
Route::post('/clientes/{cliente}/vehiculos/add', 'ClientesController@storeVehiculo');
Route::post('/clientes/{cliente}/vehiculos/update', 'ClientesController@updateVehiculo');
Route::post('/clientes/{cliente}/vehiculos/delete', 'ClientesController@deleteVehiculo');
// Revisiones
Route::get('/vehiculos/{idvehiculo}/revisionesData/{cliente}','RevisionesController@cliVehRevisionesData');
// --- CLIENTES ---
// --- Clientes - Persona Natural ---
Route::get('/clientes/new/pn', 'ClientesController@fillNewPN');
Route::post('/clientes/add/pn', 'ClientesController@storePN');
Route::post('/clientes/addfrom/{personanatural}/pn', 'ClientesController@storeFromPN');
Route::get('/clientes/show/pn/{personanatural}', 'ClientesController@showPN');

Route::get('/clientes/edit/pn/{personanatural}', 'ClientesController@edit');
Route::post('/clientes/update/pn/{personanatural}', 'ClientesController@updatePN');
Route::post('/clientes/{cliente}/delete', 'ClientesController@deletePN');
//Route::get('/clientes/edit/pn/{personanatural}', 'ClientesController@edit');
//Route::post('/clientes/{cliente}/delete', 'ClientesController@deletePN');
// --- Clientes - Persona Juridica ---
Route::get('/clientes/new/pj', 'ClientesController@fillNewPJ');
Route::post('/clientes/add/pj', 'ClientesController@storePJ');
Route::post('/clientes/addfrom/{personajuridica}/pj', 'ClientesController@storeFromPJ');
Route::get('/clientes/show/pj/{personajuridica}', 'ClientesController@showPJ');
// --- PROVEEDORES ---
Route::get('/proveedoresData', 'ProveedoresController@proveedoresMorphData');

Route::get('/ProdProveedor', 'ProveedoresController@ProductoProveedor');

// --- Proveedores - Persona Natural ---
Route::get('/proveedores/new/pn', 'ProveedoresController@fillNewPN');
Route::post('/proveedores/add/pn', 'ProveedoresController@storePN');
Route::post('/proveedores/addfrom/{personanatural}/pn', 'ProveedoresController@storeFromPN');
Route::get('/proveedores/show/pn/{personanatural}', 'ProveedoresController@showPN');
// --- Proveedores - Persona Juridica ---
Route::get('/proveedores/new/pj', 'ProveedoresController@fillNewPJ');
Route::post('/proveedores/add/pj', 'ProveedoresController@storePJ');
Route::post('/proveedores/addfrom/{personajuridica}/pj', 'ProveedoresController@storeFromPJ');
Route::get('/proveedores/show/pj/{personajuridica}', 'ProveedoresController@showPJ');
// --- TECNICOS ---
Route::get('/tecnicosData/select','TecnicosController@tecnicosDataToSelect');
Route::get('/tecnicos/new', 'TecnicosController@fillNew');
Route::post('/tecnicos/add', 'TecnicosController@store');
Route::post('/tecnicos/addfrom/{personanatural}', 'TecnicosController@storeFrom');
Route::get('/tecnicos/show/{personanatural}', 'TecnicosController@show');
// --- REVISIONES---
Route::post('/clientes/{cliente}/vehiculos/{vehiculo}/revisiones/add','RevisionesController@storeForClienteVehiculo');
Route::post('/clientes/{cliente}/vehiculos/revisiones/update','RevisionesController@updateForClienteVehiculo');
Route::post('/revisiones/{revision}/delete', 'RevisionesController@delete');
// --- FACTURAS ---
Route::get('/facturas/add','facturasController@index');
