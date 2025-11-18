<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('customers.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Customers CRUD — sekarang create & edit aktif lagi
    Route::resource('customers', CustomerController::class)
        ->except(['show']); // show tetap di-disable kalau memang tidak dipakai
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

// web.php
Route::resource('products', ProductController::class);
Route::resource('income', IncomeController::class)->only(['index']);
Route::get('/income', [IncomeController::class, 'index'])->name('income.index');



// Endpoint JSON (aman untuk auth)
Route::get('/customers/{customer}/json', function(Customer $customer) {
    return $customer;
})->middleware('auth');

require __DIR__.'/auth.php';
