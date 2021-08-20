<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/person', [\App\Http\Controllers\PersonController::class,'index']);
Route::get('/person/{id}', [\App\Http\Controllers\PersonController::class,'show']);
Route::post('/person/create',[\App\Http\Controllers\PersonController::class,'store']);
Route::delete('/person/{id}',[\App\Http\Controllers\PersonController::class,'deleteUser']);
