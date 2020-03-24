<?php

use App\Http\Controllers\CreateApplicationController;
use App\Http\Controllers\CurrentApplicationController;
use App\Http\Controllers\FinishApplicationController;
use App\Http\Controllers\ListApplicationsController;
use App\Http\Controllers\QrScannedApplicationsController;
use Illuminate\Support\Facades\Route;

Route::post('/applications', CreateApplicationController::class);
Route::post('/applications/finish', FinishApplicationController::class);
Route::get('/applications/current', CurrentApplicationController::class);
Route::get('/applications', ListApplicationsController::class);
Route::get('/applications/{qr_scanned_value}', QrScannedApplicationsController::class);
