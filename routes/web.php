<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;


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

Route::resource('address', AddressController::class)->middleware('auth');
Route::resource('payment', PaymentController::class)->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');

Route::get('/miCarrito', [ProductController::class, 'carrito']);
Route::post('/agregarCarrito', [ProductController::class, 'agregarCarrito']);
Route::post('/eliminarCarrito', [ProductController::class, 'eliminarCarrito']);

Route::post('/guardarArchivo/{platillo_id}', [ProductController::class, 'guardarArchivo'])->name('guardar');
Route::post('/editarArchivo/{platillo_id}', [ProductController::class, 'editarArchivo'])->name('editar');
Route::post('/eliminarArchivo/{platillo_id}', [ProductController::class, 'eliminarArchivo'])->name('eliminar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

