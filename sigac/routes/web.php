<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');

    //eixo
    Route::get('/admin/eixos', [EixoController::class, 'index'])->name('admin.eixos.index');
    Route::get('/eixos/create', [EixoController::class, 'create'])->name('eixos.create');
    Route::post('/eixos', [EixoController::class, 'store'])->name('eixos.store');
    Route::delete('eixos/{eixo}', [EixoController::class, 'destroy'])->name('eixos.destroy');
    Route::get('/eixos/{id}/edit', [EixoController::class, 'edit'])->name('eixos.edit');
    Route::put('/eixos/{id}', [EixoController::class, 'update'])->name('eixos.update');



});

Route::middleware(['auth', 'checkrole:aluno'])->group(function () {
    Route::get('/aluno', [DashboardController::class, 'aluno'])->name('aluno.dashboard');
});

require __DIR__.'/auth.php';
