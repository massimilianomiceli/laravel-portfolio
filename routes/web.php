<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//pagina pubblica
Route::get('/', function () {
    return view('welcome');
})->name('home');

//dopo il login si viene reindirizzati alla pagina dei progetti protetta dal middleware
Route::get('/dashboard', function () {
    return redirect()->route('projects.index');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


//rotte interne del sito, progetti, tecnologie e tipi tutte protette dal middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('projects', ProjectController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('types', TypeController::class);
});


//rotte automaticamente generate da breeze per la gestione del profilo utente
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__ . '/auth.php';
