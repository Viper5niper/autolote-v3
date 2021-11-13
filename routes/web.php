<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dash.index');
})->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home','dash.index')->name('home');

Route::resource('cliente', 'ClienteController')->middleware(['auth:sanctum', 'verified']);
Route::get('cliente/delete/{id}', [ClienteController::class, 'destroy'])
    ->name('cliente.destroy')->middleware(['auth:sanctum', 'verified']);

/** Ruta de Vehiculos */

Route::resource('vehiculo', 'VehiculoController')->name('index', 'vehiculo')->middleware(['auth:sanctum', 'verified']);

/** Ruta de rentas */
Route::post('renta/buscarVC', 'RentaController@buscarVC')
    ->name('renta.buscarvc')->middleware(['auth:sanctum', 'verified']);

Route::resource('renta', 'RentaController')->name('index', 'renta')->except(['create'])->middleware(['auth:sanctum', 'verified']);
Route::get('renta/crear/{vehiculo_id?}/{cliente_id?}', 'RentaController@create')
    ->name('renta.create')->middleware(['auth:sanctum', 'verified']);

Route::get('renta/devolver/{renta_id?}', 'RentaController@return_vehiculo')
    ->name('renta.return')->middleware(['auth:sanctum', 'verified']);

/** Ruta de Ventas */
Route::post('venta/buscarVC', 'VentaController@buscarVC')
    ->name('venta.buscarvc')->middleware(['auth:sanctum', 'verified']);

Route::resource('venta', 'VentaController')->name('index', 'venta')->middleware(['auth:sanctum', 'verified']);
Route::get('/venta/crear/{vehiculo_id?}/{cliente_id?}', 'VentaController@create_venta_vehiculo')->name('venta.vehiculo')->middleware(['auth:sanctum', 'verified']);
Route::post('/venta/vehiculo', 'VentaController@store_venta_vehiculo')->name('store.venta.vehiculo')->middleware(['auth:sanctum', 'verified']);

/** Rutas Factura */
Route::resource('factura', 'FacturaController')->name('index', 'factura')->middleware(['auth:sanctum', 'verified']);
Route::get('/servicio/factura/{id}', 'FacturaController@show_print_invoice')->name('factura_print')->middleware(['auth:sanctum', 'verified']);

/** Rutas Usuario*/
Route::resource('user', 'UserController')->name('index', 'user')->middleware(['auth:sanctum', 'verified']);

/** Rutas Perfil de Usuario */
Route::view('perfil/reset', 'auth.passwords.reset')->name('perfil.reset')->middleware(['auth:sanctum', 'verified']);
Route::post('perfil/password', 'PerfilController@changePwd')->name('perfil.change')->middleware(['auth:sanctum', 'verified']);
Route::resource('perfil', 'PerfilController')->name('index', 'perfil')->middleware(['auth:sanctum', 'verified']);

/** Rutas Empleado */
Route::post('empleado/buscar', 'EmpleadoController@buscaremp')->name('empleado.buscaremp')->middleware(['auth:sanctum', 'verified']);
Route::resource('empleado', 'EmpleadoController')->name('index', 'empleado')->middleware(['auth:sanctum', 'verified']);

/** Calculadora */

Route::post('calculadora/generar', "CalculadoraController@generate")->name('calculadora.generate');
Route::resource('calculadora', 'CalculadoraController')->name('index', 'calculadora');

/** Rutas Creditos */

Route::get('creditos/pay/{param?}', 'CreditoController@credito_pay')->name('credito.pay')->middleware(['auth:sanctum', 'verified']);
Route::post('creditos/buscar', 'CreditoController@buscar_credito')->name('credito.buscar')->middleware(['auth:sanctum', 'verified']);
Route::resource('creditos', 'CreditoController')->name('index', 'creditos')->middleware(['auth:sanctum', 'verified']);