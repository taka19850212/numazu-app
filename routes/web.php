<?php

use App\Http\Controllers\SpotController;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;
use App\Models\Spot;

Route::get('/', function () {
    // データベースから最新のスポットを4つだけ取得
    $spots = Spot::latest()->take(4)->get();

    // データをwelcomeページに渡す
    return view('welcome', compact('spots'));
});

Route::get('/spots', [SpotController::class, 'index'])->name('spots.index');
Route::get('/spots/create', [SpotController::class, 'create'])->name('spots.create');
Route::post('/spots', [SpotController::class, 'store'])->name('spots.store');
Route::delete('/spots/{spot}', [SpotController::class, 'destroy'])->name('spots.destroy');
Route::get('/spots/{spot}/edit', [SpotController::class, 'edit'])->name('spots.edit');
Route::put('/spots/{spot}', [SpotController::class, 'update'])->name('spots.update');
Route::get('/spots/{spot}', [SpotController::class, 'show'])->name('spots.show');
Route::post('/spots/{spot}/reserve', [SpotController::class, 'reserve'])->name('spots.reserve');
Route::post('/bookmarks/toggle/{spot}', [BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
// フォームを送信したときのルート（既存）
Route::post('/spots/{spot}/reserve', [SpotController::class, 'reserve'])->name('spots.reserve');

// ★これを追加：完了画面（サンクスページ）を表示するルート
Route::get('/thanks', function () {
    return view('spots.thanks');
})->name('spots.thanks');
