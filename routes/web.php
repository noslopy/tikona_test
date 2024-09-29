<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LocationValid;


Route::get('/', function () {
    return view('welcome');
})->middleware(LocationValid::class);
