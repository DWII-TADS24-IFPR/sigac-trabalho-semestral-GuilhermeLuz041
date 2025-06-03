<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role_id === 1) {
            return redirect('/admin');
        } elseif ($user->role_id === 2) {
            return redirect('/aluno');
        } else {
            return redirect('/home'); // ou outra página padrão
        }
    }
    return view('home');
});

Route::get('/padrao', function () {
    return view('padrao');  
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('admin.dashboard');
    //eixo
    Route::get('/admin/eixos', [EixoController::class, 'index'])->name('admin.eixos.index');
    Route::get('/eixos/create', [EixoController::class, 'create'])->name('eixos.create');
    Route::post('/eixos', [EixoController::class, 'store'])->name('eixos.store');
    Route::delete('eixos/{eixo}', [EixoController::class, 'destroy'])->name('eixos.destroy');
    Route::get('/eixos/{id}/edit', [EixoController::class, 'edit'])->name('eixos.edit');
    Route::put('/eixos/{id}', [EixoController::class, 'update'])->name('eixos.update');

    //Nivel
    Route::get('/admin/niveis', [NivelController::class, 'index'])->name('admin.niveis.index');
    Route::get('/niveis/create', [NivelController::class, 'create'])->name('niveis.create');
    Route::post('/niveis', [NivelController::class, 'store'])->name('niveis.store');
    Route::delete('niveis/{nivel}', [NivelController::class, 'destroy'])->name('niveis.destroy');
    Route::get('/niveis/{id}/edit', [NivelController::class, 'edit'])->name('niveis.edit');
    Route::put('/niveis/{id}', [NivelController::class, 'update'])->name('niveis.update');

    //Curso
    Route::get('/admin/cursos', [CursoController::class, 'index'])->name('admin.cursos.index');
    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    Route::get('/cursos/{id}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{id}', [CursoController::class, 'update'])->name('cursos.update');

    //Categoria
    Route::get('/admin/categorias', [categoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::delete('categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');

    //Turma
    Route::get('/admin/turmas', [TurmaController::class, 'index'])->name('admin.turmas.index');
    Route::get('/turmas/create', [TurmaController::class, 'create'])->name('turmas.create');
    Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');
    Route::delete('turmas/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');
    Route::get('/turmas/{id}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
    Route::put('/turmas/{id}', [TurmaController::class, 'update'])->name('turmas.update');

    //aluno
    Route::get('/admin/alunos', [AlunoController::class, 'index'])->name('admin.alunos.index');
    Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
    Route::delete('alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
    Route::get('/alunos/{id}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
    Route::put('/alunos/{id}', [AlunoController::class, 'update'])->name('alunos.update');

});

Route::middleware(['auth', 'checkrole:aluno'])->group(function () {
    Route::get('/aluno', [DashboardController::class, 'aluno'])->name('aluno.dashboard');
    
});

require __DIR__.'/auth.php';
