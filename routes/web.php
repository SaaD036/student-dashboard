<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use App\Models\District;
use App\Http\Controllers;

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

//AdminRoutes
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'home'])->name('admin-home');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth controllers
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLogin']);
Auth::routes();

//user
Route::group(['prefix' => 'user'], function(){
    Route::get('/{id}', 'App\Http\Controllers\User\UserController@show');
    Route::post('/{id}', 'App\Http\Controllers\User\UserController@update');
});
