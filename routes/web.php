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

// Routes da pagina publica

Route::get('/', function () {
    return view('publica.entrada');
})->name('entrada');

Route::get('/sobre', function () {
    return view('publica.sobre');
})->name('sobre');

Route::get('/noticias', [ViewController::class, 'noticias'])->name('noticias');

Route::get('/galeria', [ViewController::class, 'galeria'])->name('galeria');

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

// Routes das dashboards

Route::get('/users', function () {
    return view('Funcionario.users.index');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/equipamento', function () {
    return view('Funcionario.equipamento.index');
})->middleware(['auth', 'verified'])->name('equipamento');

Route::get('/entradas', function () {
    return view('Funcionario.entradas.index');
})->middleware(['auth', 'verified'])->name('entradas');

Route::get('/marcacoes', function (){
    return view('marcacoes.cliente');
})->name('marcacoes');

Route::get('/sugestao', function(){
    return view('sugestoes.index');
})->name('sugestao');

Route::get('/planos', function(){
    return view('planos.index');
})->name('planos');


require __DIR__ . '/auth.php';
