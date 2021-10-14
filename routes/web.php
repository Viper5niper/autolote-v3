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

Route::resource('cliente','ClienteController')->middleware(['auth:sanctum', 'verified']);
Route::get('cliente/delete/{id}', [ClienteController::class,'destroy'])
     ->name('cliente.destroy')->middleware(['auth:sanctum', 'verified']);

Route::resource('vehiculo','VehiculoController')->name('index','vehiculo')->middleware(['auth:sanctum', 'verified']);

/** Ruta de rentas */
Route::resource('renta','RentaController')->name('index','renta')->except(['create'])->middleware(['auth:sanctum', 'verified']);
Route::get('renta/crear/{vehiculo_id?}/{cliente_id?}','RentaController@create')
->name('renta.create')->middleware(['auth:sanctum', 'verified']);

Route::get('/venta/{id}','VehiculoController@venta')->name('venta')->middleware(['auth:sanctum', 'verified']);

Route::get('/factura/{id}','FacturaController@index')->name('factura')->middleware(['auth:sanctum', 'verified']);