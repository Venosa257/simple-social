<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class,'index'])->middleware('auth');

Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class,'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/account', AccountController::class)->middleware('auth');

Route::resource('/dashboard/bookmark', BookmarkController::class)->middleware('auth');

Route::post('/likes',[LikeController::class, 'change']);