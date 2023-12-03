<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');   

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/task', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/task/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/task/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});