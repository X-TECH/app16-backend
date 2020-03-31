<?php

use App\Http\Controllers\CreateApplicationController;
use App\Http\Controllers\CurrentApplicationController;
use App\Http\Controllers\CurrentApplicationQrCodeController;
use App\Http\Controllers\DeleteAllApplicationsController;
use App\Http\Controllers\FinishApplicationController;
use App\Http\Controllers\ListApplicationsController;
use Illuminate\Support\Facades\Route;

Route::post('/applications', CreateApplicationController::class);
Route::post('/applications/finish', FinishApplicationController::class);
Route::get('/applications/current', CurrentApplicationController::class);
Route::get('/applications', ListApplicationsController::class);
Route::get('/applications/qr_code', CurrentApplicationQrCodeController::class);
Route::delete('/applications', DeleteAllApplicationsController::class);
