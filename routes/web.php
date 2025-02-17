<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ApaSiapaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TataTertibController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dprd', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.list');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.list');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/tags', [TagsController::class, 'index'])->name('tags.list');
    Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::get('/tags/{id}/edit', [TagsController::class, 'edit'])->name('tags.edit');
    Route::post('/tags/{id}', [TagsController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{id}', [TagsController::class, 'destroy'])->name('tags.destroy');

    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.list');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::post('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    // Route::post('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

    Route::get('/apa-siapa', [ApaSiapaController::class, 'index'])->name('apa_siapa.list');
    Route::get('/apa-siapa/create', [ApaSiapaController::class, 'create'])->name('apa_siapa.create');
    Route::post('/apa-siapa', [ApaSiapaController::class, 'store'])->name('apa_siapa.store');
    Route::get('/apa-siapa/{apaSiapa}/edit', [ApaSiapaController::class, 'edit'])->name('apa_siapa.edit');
    Route::post('/apa-siapa/{apaSiapa}', [ApaSiapaController::class, 'update'])->name('apa_siapa.update');
    // Route::post('/apa-siapa/{id}', [ApaSiapaController::class, 'update'])->name('apa-siapa.update');
    Route::delete('/apa-siapa/{id}', [ApaSiapaController::class, 'destroy'])->name('apa_siapa.destroy');

    Route::get('/tupoksi/create', [TupoksiController::class, 'create'])->name('tupoksi.create');
    Route::post('/tupoksi', [TupoksiController::class, 'store'])->name('tupoksi.store');

    Route::get('/tata-tertib/create', [TataTertibController::class, 'create'])->name('tata_tertib.create');
    Route::post('/tata-tertib', [TataTertibController::class, 'store'])->name('tata_tertib.store');
});

require __DIR__ . '/auth.php';
