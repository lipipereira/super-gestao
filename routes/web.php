<?php

use App\Http\Controllers\{
    AboutController,
    ContactController,
    CustomerController,
    MainController,
    ProductController,
    SupplierController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'index'])->name('main.index');
Route::get('/about', [AboutController::class,'index'])->name('main.about');
Route::get('/contact', [ContactController::class,'index'])->name('main.contact');
Route::post('/contact', [ContactController::class,'create'])->name('main.contact');
Route::get('/login', function(){ return 'Login'; })->name('main.login');

Route::prefix('app')->group(function(){
    Route::get('/customers',[CustomerController::class,'index'])->name('app.customers');
    Route::get('/suppliers',[SupplierController::class,'index'])->name('app.suppliers');
    Route::get('/products',[ProductController::class,'index'])->name('app.products');
});

Route::fallback(function(){
    echo 'Pagina indisponivel';
    echo ' <a href="'.route('main.index').'">Voltar</a>';
});
