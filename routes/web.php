<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;


//一覧表示
Route::get('/', [DiaryController::class, 'index']);

// 日記作成
Route::post('/store', [DiaryController::class, 'store'])->name('diary.store');

//　日記削除
Route::delete('/delete/{id}', [DiaryController::class, 'destroy'])->name('diary.delete');