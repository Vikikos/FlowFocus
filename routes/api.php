<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CalendarApiController;
use App\Http\Controllers\Api\ChronometerApiController;
use App\Http\Controllers\Api\TimeBlockController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, 'register']);//publica
Route::post('/login', [AuthApiController::class, 'login']);//publica
Route::post('/logout', [AuthApiController::class, 'logout']);//protegida

Route::apiResource('calendars',CalendarApiController::class);//protegida
Route::apiResource('chronometer', ChronometerApiController::class);//protegida
Route::apiResource('timeblocks', TimeBlockController::class);//protegida
