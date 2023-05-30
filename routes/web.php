<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\userAuthController;
use Illuminate\Support\Facades\Route;

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



// for auth
Route::get('/register', [userAuthController::class, 'registerShow'])->name('registerShow');
Route::get('/registerGet', [userAuthController::class, 'registerGet'])->name('registerGet');

Route::get('/emailVerify/{user_id}/{token}', [userAuthController::class, 'emailVerify'])->name('emailVerify');

Route::get('/login', [userAuthController::class, 'loginShow'])->name('loginShow');
Route::get('/loginGet', [userAuthController::class, 'loginGet'])->name('loginGet');
Route::get('/logout', [userAuthController::class, 'logout'])->name('logout');




Route::group(['middleware' => ['userAuth','verifyUser']], function(){
    Route::get('/', [indexController::class, 'index'])->name('index');

    // for question
    Route::get('/question', [questionController::class, 'question'])->name('question'); 
});