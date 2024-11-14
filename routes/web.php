<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeesController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees',employeesController::class);

