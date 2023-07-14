<?php
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
// Ścieżka do formularza logowania
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');


// Ścieżka do formularza rejestracji
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ścieżki związane z koszykiem
Route::middleware('auth')->group(function () {
Route::post('/cart', [ProductController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Ścieżki związane z zamówieniem
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
Route::delete('/products/{product}', [Admin\ProductController::class, 'destroy'])->name('products.destroy');
});



// Ścieżki związane z weryfikacją adresu e-mail
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Ścieżka dla strony startowej
Route::get('/', function () {
    return view('welcome');
});


// Ścieżki dla strony głównej i wylogowania
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

