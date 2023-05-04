<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\VentaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personas', [PersonaController::class,'index'])->name('personas.index');
Route::post('/personas', [PersonaController::class,'store'])->name('personas.store');
Route::get('/personas/edit/{id}', [PersonaController::class,'edit'])->name('personas.edit');
Route::put('/personas/update/{id}', [PersonaController::class,'update'])->name('personas.update');

Route::get('/direcciones', [DireccionController::class,'index'])->name('direcciones.index');
Route::get('/correos', [CorreoController::class,'index'])->name('correos.index');
Route::get('/telefonos', [TelefonoController::class,'index'])->name('telefonos.index');

Route::get('/ventas', [VentaController::class,'index'])->name('ventas.index');
Route::post('/ventas', [VentaController::class,'store'])->name('ventas.store');
Route::get('/ventas/edit/{id}', [VentaController::class,'edit'])->name('ventas.edit');
Route::put('/ventas/update/{id}', [VentaController::class,'update'])->name('ventas.update');

Route::get('/proveedores', [ProveedorController::class,'index'])->name('proveedores.index');
Route::post('/proveedores', [ProveedorController::class,'store'])->name('proveedores.store');
Route::get('/proveedores/edit/{id}', [ProveedorController::class,'edit'])->name('proveedores.edit');
Route::put('/proveedores/update/{id}', [ProveedorController::class,'update'])->name('proveedores.update');

Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class,'store'])->name('productos.store');
Route::get('/productos/edit/{id}', [ProductoController::class,'edit'])->name('productos.edit');
Route::put('/productos/update/{id}', [ProductoController::class,'update'])->name('productos.update');

Route::get('/metodo', [MetodoController::class,'index'])->name('metodo.index');
Route::post('/metodo', [MetodoController::class,'store'])->name('metodo.store');
Route::get('/metodo/edit/{id}', [MetodoController::class,'edit'])->name('metodo.edit');
Route::put('/metodo/update/{id}', [MetodoController::class,'update'])->name('metodo.update');

Route::get('/empleados', [EmpleadoController::class,'index'])->name('empleados.index');
Route::post('/empleados',[EmpleadoController::class,'store'])->name('empleados.store');
Route::get('/empleados/edit/{id}', [EmpleadoController::class,'edit'])->name('empleados.edit');
Route::put('/empleados/update/{id}', [EmpleadoController::class,'update'])->name('empleados.update');

Route::get('/clientes', [ClienteController::class,'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class,'store'])->name('clientes.store');
Route::get('/clientes/edit/{id}', [ClienteController::class,'edit'])->name('clientes.edit');
Route::put('/clientes/update/{id}', [ClienteController::class,'update'])->name('clientes.update');

Route::get('/inv_final', [InventarioController::class,'index'])->name('inv_final.index');
Route::post('/inv_final', [InventarioController::class,'store'])->name('inv_final.store');
Route::get('/inv_final/edit/{id}', [InventarioController::class,'edit'])->name('inv_final.edit');
Route::put('/inv_final/update/{id}', [InventarioController::class,'update'])->name('inv_final.update');

Route::get('/compras', [CompraController::class,'index'])->name('compras.index');
Route::post('/compras',[CompraController::class,'store'])->name('compras.store');
Route::get('/compras/edit/{id}', [CompraController::class,'edit'])->name('compras.edit');
Route::put('/compras/update/{id}', [CompraController::class,'update'])->name('compras.update');

Route::get('/reportes', [ReporteController::class,'index'])->name('reportes.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
