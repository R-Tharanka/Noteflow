<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MongoTestController;

Route::get('/', function () {
    return view('welcome');
});

// MongoDB connection test route
Route::get('/mongo-test', [MongoTestController::class, 'index']);
