<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Models\Ekitaldia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo/n1', function () {
    //$ekitaldiak = Ekitaldia::all();
    $ekitaldiak = Ekitaldia::with('kategoria')->get();
    return view('demo.n1', compact('ekitaldiak'));
});

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
