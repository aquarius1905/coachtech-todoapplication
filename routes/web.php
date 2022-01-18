<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//トップページの表示
Route::get('/', [TodoController::class, 'index']);
//タスクの作成
Route::post('/todo/create', [TodoController::class, 'create']);
//タスクの更新
Route::post('/todo/update/{id}', [TodoController::class, 'update'])->name('update');
//タスクの削除
Route::post('/todo/delete/{id}', [TodoController::class, 'delete'])->name('delete');
