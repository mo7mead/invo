<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['register' => false]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';



/*
|--------------------------------------------------------------------------
| Web Routes invoices
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('invoices', [InvoicesController::class, 'index'])->name('invoices.index');
    Route::get('invoices/create', [InvoicesController::class, 'create'])->name('invoices.create');
    Route::post('/inavoces',  [InvoicesController::class, 'store'])->name('invoices.store');
    Route::get('/section/{id}', [InvoicesController::class, 'getproducts']);
});
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes section
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/sections',   [SectionsController::class, 'index'])->name('sections.index');
    Route::post('/section',   [SectionsController::class, 'store'])->name('sections.store');
    Route::put('/section',    [SectionsController::class, 'update'])->name('sections.update');
    Route::delete('/section', [SectionsController::class, 'destroy'])->name('sections.destroy');
});
require __DIR__ . '/auth.php';



/*
|--------------------------------------------------------------------------
| Web Routes Products
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::post('/product', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/product', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/product', [ProductsController::class, 'destroy'])->name('products.destroy');
});
