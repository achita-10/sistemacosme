<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
})->middleware(['guest'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    
    
    //Actividades
    Route::get('/actividad', [ActividadController::class, 'index'])->name("actividad");
    Route::get('/actividad/lista', [ActividadController::class, 'listar'])->name('actividad.lista');
    Route::get('/actividad/eliminar', [ActividadController::class, 'destroy'])->name('actividad.eliminar');
    Route::post('/actividad/save', [ActividadController::class, 'store'])->name('actividad.save');
    Route::post('/actividad/update', [ActividadController::class, 'update'])->name('actividad.update');
    Route::get('/actividad/edit',[ActividadController::class, 'edit'])->name('actividad.edit');
    //Usuarios
    Route::get('/usuario', [UserController::class, 'index'])->name("usuario");
    Route::get('/usuario/lista', [UserController::class, 'listar'])->name('usuario.lista');
    Route::get('/usuario/edit',[UserController::class, 'edit'])->name('usuario.edit');
    Route::post('/usuario/update', [UserController::class, 'update'])->name('usuario.update');
    // Route::post('/usuario/save', [UserController::class, 'store'])->name('usuario.store');
    Route::post('/usuario/update', [UserController::class, 'update'])->name('usuario.update');
    //Categorias
    Route::post('/categoria/save', [CategoriaController::class, 'store'])->name('categoria.save');
    Route::get('/categoria', [CategoriaController::class, 'index'])->name("categoria");
    Route::get('/categoria/eliminar', [CategoriaController::class, 'destroy'])->name('categoria.eliminar');
    Route::post('/categoria/save', [CategoriaController::class, 'store'])->name('categoria.save');
    Route::post('/categoria/update', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::get('/categoria/edit',[CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::get('/categoria/lista', [CategoriaController::class, 'listar'])->name('categoria.lista');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

/* Para modificar la regla de ruteo diferente a dashboard, debes acceder al archivo RouteServiceProvider */
require __DIR__.'/auth.php';
