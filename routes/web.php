<?php

use App\Http\Controllers\SpotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/spots',[SpotController::class,'index'])->name('spots.index');
Route::get('/spots/create',[SpotController::class,'create'])->name('spots.create');
Route::post('/spots',[SpotController::class,'store'])->name('spots.store');
Route::delete('/spots/{spot}',[SpotController::class,'destroy'])->name('spots.destroy');
Route::get('/spots/{spot}/edit',[SpotController::class,'edit'])->name('spots.edit');
Route::put('/spots/{spot}',[SpotController::class,'update'])->name('spots.update');
Route::get('/spots/{spot}', [SpotController::class, 'show'])->name('spots.show');

