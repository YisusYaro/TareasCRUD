<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TareaController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/tareas',[TareaController::class, 'create'])->name('dashboard.tareas');

Route::middleware(['auth:sanctum', 'verified'])->get('/tareas',[TareaController::class, 'index'])->name('tareas');

Route::middleware(['auth:sanctum', 'verified'])->post('/tareas',[TareaController::class, 'store'])->name('tareas');

Route::middleware(['auth:sanctum', 'verified'])->put('/tareas/{id}',[TareaController::class, 'update'])->name('tareas');

Route::middleware(['auth:sanctum', 'verified'])->delete('/tareas/{id}',[TareaController::class, 'destroy'])->name('tareas');

