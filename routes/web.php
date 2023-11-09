<?php

use App\Http\Controllers\{
    AboutController,
    ClientController,
    ContactController,
    HomeController,
    LoginController,
    MainController,
    OrderController,
    OrderProductController,
    ProductController,
    ProductDetailController,
    SupplierController
};

use Illuminate\Support\Facades\Route;
/*
Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [MainController::class,'index'])
    ->name('main.index');

or

Route::middleware('log.acesso')
    ->get('/', [MainController::class,'index'])
    ->name('main.index');
*/

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('main.about');
Route::get('/contact', [ContactController::class, 'index'])->name('main.contact');
Route::post('/contact', [ContactController::class, 'create'])->name('main.contact');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('main.login');
Route::post('/login', [LoginController::class, 'authetication'])->name('main.login');
Route::middleware('authetication:default,profile')
    ->prefix('app')->group(function () {

        Route::get('/home', [HomeController::class, 'index'])->name('app.home');
        Route::get('/logout', [LoginController::class, 'logout'])->name('app.logout');

        // Fornecedores
        Route::get('/supplier', [SupplierController::class, 'index'])->name('app.supplier');
        Route::get('/supplier/show', [SupplierController::class, 'show'])->name('app.supplier.show');
        Route::post('/supplier/show', [SupplierController::class, 'show'])->name('app.supplier.show');
        Route::get('/supplier/store', [SupplierController::class, 'store'])->name('app.supplier.store');
        Route::post('/supplier/store', [SupplierController::class, 'store'])->name('app.supplier.store');
        Route::get('/supplier/edit/{id}/{msg?}', [SupplierController::class, 'edit'])->name('app.supplier.edit');
        Route::get('/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('app.supplier.destroy');

        // Produtos
        Route::resource('/product', ProductController::class);

        // Produtos detalhes
        Route::resource('/product-detail', ProductDetailController::class);

        // Clientes
        Route::resource('/client', ClientController::class);

        // Pedidos
        Route::resource('/order', OrderController::class);

        // Produto dos pedidos
        //Route::resource('/order-product', OrderProductController::class);
        Route::prefix('order-product')->group(function () {
            Route::get('/create/{order}', [OrderProductController::class, 'create'])->name('order-product.create');
            Route::post('/store/{order}', [OrderProductController::class, 'store'])->name('order-product.store');
            Route::delete('/destroy/{orderProduct}/{order_id}', [OrderProductController::class, 'destroy'])->name('order-product.destroy');
            //Route::delete('/destroy/{order}/{product}', [OrderProductController::class, 'destroy'])->name('order-product.destroy');
        });
    });

Route::fallback(function () {
    echo 'Página indisponível';
    echo ' <a href="' . route('main.index') . '">Voltar</a>';
});
