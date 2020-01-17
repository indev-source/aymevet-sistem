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

Route::get('/','DashBoardController@index')->middleware('auth','userRol');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'dashboard/v/admin'],function(){
	Route::get('/','DashBoardController@index')->middleware('userRol');
	Route::resource('/usuarios','UsuariosController');
	
	Route::get('usuario/{buscar?}','UsuariosController@search');
	Route::resource('/sucursales','BussinesController')->middleware('userRol');
	Route::resource('/productos','ProductsController');

	Route::get('/producto_/{sucursal?}','ProductsController@searchByBussine');
	Route::get('/producto_buscar/{filtro?}','ProductsController@searchLIKE');

	Route::resource('categorias','CategoriasController');
	Route::resource('/ventas','SalesController');
	Route::get('buscar/{filtro_venta?}','SalesController@search');
	Route::get('filtro/{date_start?}/{date_end?}','SalesController@FilterBetweenDates');

	Route::group(['prefix'=>'reporte'],function(){
		Route::get('ventas_del_dia','SalesController@reporte_venta_dia');
		Route::get('ventas','SalesController@reporte_ventas');
		Route::get ('ventas_por_fecha/{inicio?}/{final?}','SalesController@reporte_fechas');
	});

	Route::resource('traspasos','TraspasosController');

	Route::get('reporte/traspaso/{traspaso_id}','TraspasosController@reporte_traspaso');
	Route::put('autorizar/traspaso/{traspaso_id}','TraspasosController@autorizar');
});

Route::group(['prefix'=>'/dashboard'],function(){

	Route::get('traspaso/buscar/producto/{filtro?}/{traspaso?}','ProductsController@searchLIKETraspaso');
	Route::get('seleccionar-sucursal','TraspasosController@bussineSelect');
	Route::get('seleccionar-productos/{traspaso_id}','TraspasosController@productsSelect');
	Route::post('agregar-producto-traspaso','ProductTraspasosController@store');
	Route::post('traspaso/terminar','TraspasosController@terminar');

	Route::put('aceptar/traspaso/{traspaso_id}','TraspasosController@aceptar');

	Route::get('buscar/inventario/{filtro?}','ProductsController@search')->middleware('cors');


	Route::group(['prefix'=>'orden/'],function(){
		Route::get('total','OrderController@total')->middleware('cors');
		Route::get('productos','ProductsOrderController@products');
		Route::post('agregar/producto','ProductsOrderController@store');
		Route::post('producto/inventario','ProductsOrderController@store2');

		Route::get('products/{search?}','ProductsOrderController@search');
		Route::post('productos_orden/delete/','ProductsOrderController@destroy');

	});
	Route::group(['prefix'=>'venta'],function(){
		Route::post('/','SalesController@store');
		Route::get('/{ticket?}','SalesController@ticketSale');
	});
});

Route::post('regresar_traspaso','TraspasosController@regresar');


Route::get('vender','DashBoardController@vender')->middleware('auth');



Route::group(['prefix'=>'administrador','middleware'=>'auth'],function(){

	Route::resource('productos','ProductsController');

	Route::get('/producto/{categoria?}','ProductsController@searchByCategory');
	Route::resource('categorias','CategoriasController');
	Route::get('/producto_/{sucursal?}','ProductsController@searchByBussine');
	Route::resource('/sucursales','BussinesController');
	Route::get('/sucursales/{bussine_id}/productos','BussinesController@products');
	Route::resource('/ventas','SalesController');
	Route::resource('/usuarios','UsuariosController');
	Route::get('/perfil/{id?}','UsuariosController@profile');
	Route::resource('traspasos','TraspasosController');

	Route::resource('marcas','MarcasController');
	Route::resource('proveedores','ProveedoresController');
	Route::resource('creditos','CreditController');

	Route::resource('compras','ComprasController');
    Route::get('producto-compras/{compra_id}','ComprasController@productosAdd');
    Route::post('producto-compras','ComprasController@addToCompra');
    Route::put('producto-compras/{compra_id}','ComprasController@addToInventario');
});

Route::group(['prefix'=>'reportes'],function(){
    Route::group(['prefix'=>'inventario'],function(){
        Route::get('/','ReportesController@inventarioGeneral');
        Route::get('/sucursal','ReportesController@inventarioSucursal');
        Route::get('/top-10','ReportesController@top10');
    });

    Route::group(['prefix'=>'ventas'],function(){
        Route::get('/','ReportesController@ventasGeneral');
        Route::get('/sucursal','ReportesController@ventasSucursal');
        Route::get('/fechas','ReportesController@ventasFecha');
        Route::get('/vendedores','ReportesController@ventasVendedores');
        Route::get('/vendedores/{seller_id}','ReportesController@vendedoresShow');
    });
});

Route::group(['prefix'=>'vendedor','middleware'=>'auth'],function(){

	Route::resource('productos','ProductsController');
	Route::resource('/ventas','SalesController');
	Route::get('/perfil/{id?}','UsuariosController@profile');
	Route::resource('traspasos','TraspasosController');

});

Route::get('servicios','ServiciosController@index');
Route::get('servicios/{venta_id}','ServiciosController@create');
Route::post('servicios','ServiciosController@store');
Route::get('servicio/{servicio_id}','ServiciosController@show');

Route::get('reportes','ReportesController@index');
Route::post('reportes/inventario','ReportesController@inventario');

Route::get('reportes/servicios/{servicio_id}','ReportesController@servicios');
Route::post('reportes/servicios_dia','ReportesController@serviciosDia');

Route::get('productos','ProductsController@api');

Route::post('agregar-pago','CreditController@agregarPago');


Route::get('sincronizacion','SyncController@syncMenu');

Route::get('perfil','UsuariosController@profile');
Route::put('administrador/usuarios/password-update/{usuario_id}','UsuariosController@password');

Route::get('productos-categoria/{categoria?}','ProductsController@category');
Route::get('productos-marca/{marca?}','ProductsController@brand');
Route::get('productos-proveedor/{proveedor?}','ProductsController@provider');
Route::get('productos-sucursal/{sucursal?}','ProductsController@business');
Route::get('filtrar','ProductsController@search');

Route::get('ventas-menu','SalesController@menu');
Route::get('vender','SalesController@toSell');
Route::get('ventas-cliente/{cliente?}','SalesController@customer');

//creditos
Route::resource('pagos','PayController')->only('store','destroy');

//clientes
Route::resource('clientes', 'ClientesController');

//traspasos
Route::get('traspasos','TraspasosController@index');
Route::get('traspasos-realizados','TraspasosController@realizados');
Route::get('traspasos-recibidos','TraspasosController@recibidos');
Route::get('traspasos-autorizados','TraspasosController@autorizados');
Route::get('seleccionar-sucursales','TraspasosController@seleccionarSucursal');



