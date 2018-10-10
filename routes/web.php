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
    return \redirect("/login");
});
Route::get('/cargamasiva', function (){
    return view('subir2');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//-----------------------------------------------------------------------
Route::get('/CrearCliente', 'ClientesController@MostrarFormCrearCliente');
Route::post('/CrearCliente', 'ClientesController@CrearCliente');
//-----------------------------------------------------------------------

Route::get('/EditarCliente', 'ClientesController@MostrarFormClientes');
Route::get('EditarCliente2/{idUsuario}', 'ClientesController@MostrarFormaParaEditarClientes');
Route::post('EditarCliente2/{idUsuario}', 'ClientesController@ActualizarCliente');
//-----------------------------------------------------------------------
Route::get('/EliminarCliente', 'ClientesController@EliminarClientes');
Route::get('/EliminarCliente/{idUsuario}', 'ClientesController@EliminarClientes2');

//-----------------------------------------------------------------------
/*Route::get('/PruebaCrearCliente', function(){
  return view('CRUDClientes.CrearCliente');
});*/
/*Route::get('/PruebaEditarCliente2', function(){
  return view('CRUDClientes.EditarCliente2');
});*/

/*Route::get('/PruebaEditarCliente', function(){
  return view('CRUDClientes.EditarCliente');
});
*/

//-----------------------------------------------------------------------
Route::post('/CrearProducto','ProductosController@guardar');
Route::get('/CrearProducto', 'ProductosController@mostrar');
//-----------------------------------------------------------------------

Route::get('/Editar', 'ProductosController@MostrarFormProductos');
Route::get('Editar2/{idProducto}', 'ProductosController@MostrarFormaParaEditarProductos');
Route::post('Editar2/{idProducto}', 'ProductosController@ActualizarProducto');
//-----------------------------------------------------------------------
Route::get('/Eliminar', 'ProductosController@EliminarProductos');
Route::get('/Eliminar/{idProducto}', 'ProductosController@EliminarProductos2');


Route::get('/facturacompra', 'FacturaCompraController@index');

Route::get('/Carrito/ListarProductos', 'CarritoController@listar');
Route::get('/Carrito/EliminarProducto/{id}', 'CarritoController@eliminar');
Route::post('/Carrito/AgregarProducto/{id}', 'CarritoController@agregaralcarrito')->name('AgregarProducto');
Route::post('/Carrito/ActualizarCantidad/{id}', 'CarritoController@actualizarcantidad')->name('ActualizarCantidad');
Route::get('/Carrito/Vaciar', 'CarritoController@vaciarRuta');
Route::get('/Carrito/FinalizarCompra', 'CarritoController@finalizarCompra');
Route::get('/Catalogo', 'CatalogoController@Catalogo');
Route::get('/PerfilProducto/{idproducto}', 'CatalogoController@PerfilProducto');
Route::get('/Facturas/DetalleFactura/{id}', 'FacturaVentaController@mostrarfactura');
Route::get('/Facturas/Listar', 'FacturaVentaController@listarFacturasUsuario');

Route::get('/EnviosAdmin', 'EnviosController@EnviosAdmin');
Route::get('/CambiarEstado/{estado}/{factura}', 'EnviosController@CambiarEstado');
Route::get('/Admin', 'EnviosController@Dashboard');
Route::post('/ProveedorProducto','FacturaCompraController@guardar');
Route::get('/ProveedorProducto', 'FacturaCompraController@index');
Route::get('/ProveedorProducto/eliminar/{id}', 'FacturaCompraController@eliminar');
Route::get('/ProveedorProducto/finalizar', 'FacturaCompraController@finalizar');
