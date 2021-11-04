<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerloginController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\InboxMessageController;
use App\Http\Controllers\ChatController;



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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/customer',CustomerController::class);
//Route::resource('/user',CustomerloginController::class);
Route::resource('/inbox',InboxController::class);
Route::resource('/showmsg',InboxMessageController::class);
Auth::routes();
Route::get('/inbox/{inbox}/show',[InboxController::class,'show']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/chatview',ChatController::class);
