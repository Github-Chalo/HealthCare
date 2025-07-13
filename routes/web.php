<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/user/login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('/user/register',[AuthController::class,'register'])->name('register');
Route::post('/user/register',[AuthController::class,'postRegister'])->name('postRegister');
Route::get('/user/dashboard',[UserDashboardController::class,'dashboard'])->name('user.dashboard');
Route::get('/user/findCare',[UserDashboardController::class,'findCare'])->name('user.findCare');
Route::get('user/tests',[UserDashboardController::class,'tests'])->name('user.tests');
Route::get('/user/visits',[UserDashboardController::class,'visits'])->name('user.visits');
Route::get('/user/test-info',[UserDashboardController::class,'testInfo'])->name('user.testInfo');



// admin routes
Route::get('/admin/dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/users',[AdminDashboardController::class,'users'])->name('admin.users');

Route::post('/admin/users/update/{id}',[AdminDashboardController::class,'updateUser'])->name('admin.users.update');
Route::get('/admin/users/delete/{id}',[AdminDashboardController::class,'deleteUser'])->name('admin.users.delete');







Route::get('/logout',[AuthController::class,'logout'])->name('logout');