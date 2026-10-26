<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Models\Ekitaldia;
use App\Http\Controllers\EkitaldiaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ekitaldia', [EkitaldiaController::class, 'index'])->name('ekitaldia.index');
Route::get('/ekitaldia/create', [EkitaldiaController::class, 'create'])->name('ekitaldia.create');
Route::post('/ekitaldia', [EkitaldiaController::class, 'store'])->name('ekitaldia.store');
Route::get('/ekitaldia/{id}', [EkitaldiaController::class, 'show'])->name('ekitaldia.show');
Route::get('/ekitaldia/{id}/edit', [EkitaldiaController::class, 'edit'])->name('ekitaldia.edit');
Route::put('/ekitaldia/{id}', [EkitaldiaController::class, 'update'])->name('ekitaldia.update');
Route::delete('/ekitaldia/{id}', [EkitaldiaController::class, 'destroy'])->name('ekitaldia.destroy');

Route::get('/dashboard', [CharacterController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/submit', [CharacterController::class, 'create'])->middleware(['auth', 'verified'])->name('submit');
Route::post('/submit', [CharacterController::class, 'store'])->middleware(['auth', 'verified'])->name('store');

Route::get('/characters/{id}', [CharacterController::class, 'show'])->middleware(['auth', 'verified'])->name('characters.show');
Route::get('/characters/{id}/edit', [CharacterController::class, 'edit'])->middleware(['auth', 'verified'])->name('characters.edit');
Route::put('/characters/{id}', [CharacterController::class, 'update'])->middleware(['auth', 'verified'])->name('characters.update');

Route::delete('/characters/{id}', [CharacterController::class, 'destroy'])->middleware(['auth', 'verified'])->name('characters.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/lang/{lang}', function ($lang){
    if(in_array($lang, ['eu', 'es', 'en'])){
        session(['locale' => $lang]);
    }
    return back();
})->name('lang.switch');

require __DIR__.'/auth.php';
