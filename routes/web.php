<?php

use App\Http\Controllers\{ClienteController, ProfileController, ViewController};
use Illuminate\Support\Facades\Route;

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
    return view('publica.entrada');
})->name('entrada');

Route::get('/sobre', function () {
    return view('publica.sobre');
})->name('sobre');

Route::get('/noticias', function () {
    return view('publica.noticias');
})->name('noticias');

Route::get('/galeria', function () {
    return view('publica.galeria');
})->name('galeria');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/informacoes', function () {
        return view('cliente.index');
    })->name('clieInform');
});

require __DIR__ . '/auth.php';
