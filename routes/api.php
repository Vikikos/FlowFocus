<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PomodoroApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CalendarApiController;
use App\Http\Controllers\Api\ChronometerApiController;
use App\Http\Controllers\Api\TimeBlockController;
use App\Http\Controllers\Api\MarkApiController;
use App\Http\Controllers\Api\UserApiController;

Route::post('/signup', [AuthApiController::class, 'signup']);//publica
Route::post('/login', [AuthApiController::class, 'login']);//publica

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/user', [UserApiController::class, 'getSessionData']);
    
    Route::apiResource('chronometers', ChronometerApiController::class);

    Route::apiResource('calendars',CalendarApiController::class);
    Route::prefix('calendars/{idCalendar}')->group(function () {
        
        Route::get('timeblocks', [TimeblockController::class, 'index']);
        Route::get('timeblocks/{timeblock}', [TimeblockController::class, 'show']);
        Route::post('timeblocks', [TimeblockController::class, 'store']);
        Route::put('timeblocks/{timeblock}', [TimeblockController::class, 'update']);
        Route::delete('timeblocks/{timeblock}', [TimeblockController::class, 'destroy']);
        
    });

    Route::apiResource('marks', MarkApiController::class)->except([
        'update'
    ]);

    Route::get('kanban', [TaskApiController::class, 'index']);
    Route::patch('tasks/{task}/move', [TaskApiController::class, 'changeColumn']);
    Route::apiResource('tasks', TaskApiController::class)->except([
        'update',
        'index'
    ]);

    Route::apiResource('pomodoro',PomodoroApiController::class);
});


