<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('teams', TeamController::class)->only(['index', 'create', 'store']);
    Route::get('team/change/{teamId}', [TeamController::class, 'changeCurrentTeam'])->name('team.change');
    Route::resource('tasks', TaskController::class);
    Route::resource('users', UserController::class)->only(['index', 'create', 'store']);
});

require __DIR__.'/auth.php';
