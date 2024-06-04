<?php


use Livewire\Livewire;
use App\Livewire\Planos\Main;
use App\Livewire\Graficos\Index;
use App\Livewire\Publica\Customize;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ClienteController, ProfileController, ViewController};
use App\Livewire\Atividades\Index as AtividadesIndex;

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

Route::get('/',[ViewController::class, 'index'])->name('entrada');

Route::get('/sobre', [ViewController::class, 'sobre'])->name('sobre');

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

Route::middleware('adminFun')->group(function () {
    Route::get('/users', function () {
        return view('Funcionario.users.index');
    })->middleware(['auth', 'verified'])->name('users');
    Route::get('/equipamento', function () {
        return view('Funcionario.equipamento.index');
    })->middleware(['auth', 'verified'])->name('equipamento');
    Route::get('/entradas/{cliente?}', function () {
        return view('Funcionario.entradas.index');
    })->middleware(['auth', 'verified'])->name('entradas');
    Route::get('/sugestaos', function(){
        return view('sugestoes.index');
    })->name('sugestao');
    Route::get('/mensalidades', function(){
        return view('mensalidade.index');
    })->name('mensalidade');
    Route::get('/customize', Customize::class)->name('customize');
    Route::get('/atividades', AtividadesIndex::class)->name('atividades');
});



// Routes das dashboards

Route::middleware('clientePer')->group(function () {
    Route::get('/marcacoes', function (){
        return view('marcacoes.cliente');
    })->name('marcacoes');
});

Route::get('/planos/{cliente?}/{plano?}', Main::class)->middleware('notPer')->name('planos');

Route::get('/entradas-data', [Index::class, 'getData'])->name('getEntradas');


require __DIR__ . '/auth.php';
