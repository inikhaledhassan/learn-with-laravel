<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/addname', [FirstController::class, 'index']);
Route::get('/updatename/{id}', [FirstController::class, 'updateName']);
Route::get('/view', [FirstController::class, 'viewName']);
Route::post('/addname/store', [FirstController::class, 'store']);
Route::post('/updatename/{id}', [FirstController::class, 'update']);
Route::get('/deletename/{id}', [FirstController::class, 'delete']);
