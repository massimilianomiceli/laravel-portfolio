<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;

//Pagina iniziale del sito, non serve essere loggati per vederla
Route::get('/', function () {
    return view('welcome');
});


//Breeze, dopo il login, normalmente porta l'utente su /dashboard
Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect()->route('admin.index'); //reindirizzo l'utente dopo il login all'area admin
})->middleware(['auth', 'verified'])->name('dashboard');


//Queste sono le rotte create da Breeze per modificare il profilo, aggiornare i dati dell'utente e cancellare l'account.
//Sono protette da middleware auth, quindi serve essere loggati.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Tutte le rotte dentro questo gruppo:
 - richiedono login
 - richiedono verifica email, se attiva
 - iniziano con /admin
 - hanno nomi che iniziano con admin.
*/
Route::middleware(['auth','verified']) //Tutte le rotte dentro questo gruppo sono accessibili solo agli utenti loggati
->name('admin.') //Tutti i nomi delle rotte dentro il gruppo iniziano con admin
->prefix('admin') //Tutte le rotte dentro il gruppo iniziano con /admin
->group(function () {
    Route::get("/", [DashboardController::class,'index'])->name("index");
});

Route::resource("projects", ProjectController::class); //->middleware(['auth','verified']);
Route::resource("types", ProjectController::class); //->middleware(['auth','verified']);

require __DIR__.'/auth.php';
