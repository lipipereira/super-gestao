<?php

use App\Http\Controllers\{
    AboutController,
    ContactController,
    MainController
};
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class,'main']);
Route::get('/about', [AboutController::class,'about']);
Route::get('/contact', [ContactController::class,'contact']);
