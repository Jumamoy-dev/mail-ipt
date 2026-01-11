<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhoneController;


Route::resource('phones',PhoneController::class);