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
    Route::get('/course', [App\Http\Controllers\AdminController::class, 'course'])->name('admin-course');
    Route::post('/course', [App\Http\Controllers\AdminController::class, 'saveCourse'])->name('admin-save-course');
    Route::get('/create-user', [App\Http\Controllers\AdminController::class, 'showCreateUser'])->name('admin-create-user');
    Route::post('/create-user', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin-create-user-post');
    Route::get('/people', [App\Http\Controllers\AdminController::class, 'showPeople'])->name('admin-people');
    Route::get('/make-teacher/{id}', [App\Http\Controllers\AdminController::class, 'makeTeacher']);
    Route::get('/result', [App\Http\Controllers\AdminController::class, 'showResult'])->name('admin-result');
    Route::post('/result/{user_id}/{course_id}', [App\Http\Controllers\AdminController::class, 'saveResult']);
    Route::get('/counseling/{user_id}', [App\Http\Controllers\AdminController::class, 'showCounseling'])->name('admin-counseling');
    Route::post('counseling/{user_id}', [App\Http\Controllers\AdminController::class, 'saveCounseling']);
    Route::get('/faculty', [App\Http\Controllers\AdminController::class, 'showFaculty'])->name('admin-faculty');
    Route::get('/people/{id}', [App\Http\Controllers\AdminController::class, 'showFacultyDetails']);
    Route::get('/transport', [App\Http\Controllers\AdminController::class, 'showTransport'])->name('admin-transport');
    Route::post('/transport', [App\Http\Controllers\AdminController::class, 'saveTransport'])->name('admin-transport-save');
});



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/course', [App\Http\Controllers\HomeController::class, 'course'])->name('user-course');
Route::get('/course/take/{courseID}', [App\Http\Controllers\HomeController::class, 'takeCourse']);
Route::get('/course/delete/{courseID}', [App\Http\Controllers\HomeController::class, 'deletCourse']);
Route::get('/faculty', [App\Http\Controllers\User\UserController::class, 'showFaculty'])->name('user-faculty');
Route::get('/faculty/{id}', [App\Http\Controllers\User\UserController::class, 'showFacultyDetails']);
Route::get('/faculty/counseling/take/{id}', [App\Http\Controllers\User\UserController::class, 'takeCounselling']);




//Auth controllers
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLogin']);
Auth::routes();



//user
Route::group(['prefix' => 'user'], function(){
    Route::get('/{id}', 'App\Http\Controllers\User\UserController@show');
    Route::post('/{id}', 'App\Http\Controllers\User\UserController@update');
});
