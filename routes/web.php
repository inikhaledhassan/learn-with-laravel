<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index']);
Route::post('/add/user/store', [UserController::class, 'store']);

Route::get('/update/user/{id}', [UserController::class, 'updateUser']);
Route::post('/update/user/{id}', [UserController::class, 'update']);


Route::get('/view', [UserController::class, 'viewUser']);
Route::get('/delete/user/{id}', [UserController::class, 'delete']);
