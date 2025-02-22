<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrayectoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRoleController;
use App\Models\Trayecto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

    // Users




 // Modulo empresas
    Route::resource('empresas', EmpresaController::class)->middleware('auth');
    Route::get('empresas', [EmpresaController::class, 'index'])->name('empresas.index')->middleware('auth');
    Route::post('empresas/create', [EmpresaController::class, 'store'])->name('empresas.store')->middleware('auth');
    Route::get('empresas/create', [EmpresaController::class, 'create'])->name('empresas.create')->middleware('auth');

    Route::put('empresas/edit', [EmpresaController::class, 'edit'])->name('empresas.edit')->middleware('auth');
    Route::get('empresas/{id_empresa}/edit', [EmpresaController::class, 'edit'])->middleware('auth')->name('empresas.edit')->middleware('auth');

    Route::get('/empresas/{id_empresa}', [EmpresaController::class, 'update'])->middleware('auth')->middleware('auth')->name('empresas.update')->middleware('auth');
    Route::get('/empresas/{id_empresa}', [EmpresaController::class, 'show'])->middleware('auth')->name('empresas.show')->middleware('auth');
    Route::delete('/empresas/{id_empresa}', [EmpresaController::class, 'destroy'])->middleware('auth')->name('empresas.destroy')->middleware('auth');

 // modulo trayectos
    Route::resource('trayectos',TrayectoController::class);
    Route::get('/trayectos', [TrayectoController::class, 'index'])->name('trayectos.index')->middleware('auth');
    Route::post('trayectos/create', [TrayectoController::class, 'store'])->name('trayectos.store')->middleware('auth');
    Route::get('trayectos/create', [TrayectoController::class, 'create'])->name('trayectos.create')->middleware('auth');

    Route::put('trayectos/edit', [TrayectoController::class, 'edit'])->name('trayectos.edit')->middleware('auth');
    Route::get('trayectos/{id_trayecto}/edit', [TrayectoController::class, 'edit'])->middleware('auth')->name('trayectos.edit')->middleware('auth');

    Route::get('/trayectos/{id_trayecto}', [TrayectoController::class, 'update'])->middleware('auth')->name('trayectos.update')->middleware('auth');
    Route::get('/trayectos/{id_trayecto}', [TrayectoController::class, 'show'])->middleware('auth')->name('trayectos.show')->middleware('auth');
    Route::delete('/trayectos/{id_trayecto}', [TrayectoController::class, 'destroy'])->middleware('auth')->name('trayectos.destroy')->middleware('auth');

 // modulo precio
    Route::resource('precios', PrecioController::class)->middleware('auth');
    Route::resource('precios', PrecioController::class);
    Route::resource('/',HomeController::class);


    Route::middleware(['auth'])->group(function () {
        Route::resource('users', UserController::class);
    });
    Route::get('/', [TrayectoController::class, 'ind'])->name('welcome');

