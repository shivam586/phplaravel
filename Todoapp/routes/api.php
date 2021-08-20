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

Route::get('/tasks',[\App\Http\Controllers\TaskController::class,'gettasks']);
Route::post('/createtask',[\App\Http\Controllers\TaskController::class,'createtask']);
Route::get('/task/{id}',[\App\Http\Controllers\TaskController::class,'gettaskbyid']);
Route::get('/task/{name}',[\App\Http\Controllers\TaskController::class,'gettasskbyname']);
Route::patch('updatetaskstatus/{id}',[\App\Http\Controllers\TaskController::class,'updatetaskstatus']);
Route::delete('/deletetask/{id}',[\App\Http\Controllers\TaskController::class,'deletetask']);

