<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{HomeController, UserController, ManagerController, SupervisorController, StaffController, RoleController};

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth' ,'middleware' => 'auth'], function() {
    Route::get('/normal_users', [HomeController::class, 'index'])->name('home');
    //Route::get('/normal_users', [HomeController::class, 'index']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::post('/users/{id}/update', [UserController::class, 'update']);
    Route::get('/users/{id}', [UserController::class, 'delete']);

    Route::get('/managers', [ManagerController::class, 'index']);

    Route::get('/supervisors', [SupervisorController::class, 'index']);

    Route::get('/staffs', [StaffController::class, 'index']);

    Route::get('/roles', [RoleController::class, 'index']);
});

Auth::routes();
