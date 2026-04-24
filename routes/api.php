<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PomodoroApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CalendarApiController;
use App\Http\Controllers\Api\ChronometerApiController;
use App\Http\Controllers\Api\TimeBlockController;
use App\Http\Controllers\Api\MarkApiController;
use App\Http\Controllers\Api\UserApiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('pomodoro',PomodoroApiController::class);
Route::apiResource('task',TaskApiController::class);
Route::post('/signup', [AuthApiController::class, 'signup']);//publica
Route::post('/login', [AuthApiController::class, 'login']);//publica
Route::post('/logout', [AuthApiController::class, 'logout']);//protegida
Route::middleware('auth:sanctum')->get('/user', [UserApiController::class, 'getSessionData']);

Route::apiResource('calendars',CalendarApiController::class);//protegida
Route::apiResource('chronometer', ChronometerApiController::class);//protegida
Route::apiResource('timeblocks', TimeBlockController::class);//protegida

Route::apiResource('marks', MarkApiController::class);
