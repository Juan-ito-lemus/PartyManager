<?php

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
    return view('welcome');
});

use App\Http\Controllers\ClientController;
Route::resource('/Clients', ClientController::class);
Route::get('/Client/Create', [ClientController::class, 'Create']);
Route::delete('/Client/Delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/Client/Show/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/Clients/Edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/Clients/{client}', [ClientController::class, 'update'])->name('clients.update');


use App\Http\Controllers\ProductController;
Route::resource('/Products', ProductController::class);
Route::get('/Product/Create', [ProductController::class, 'Create']);
Route::delete('/Product/Delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/Product/Show/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/Product/Edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/Product/{product}', [ProductController::class, 'update'])->name('products.update');

use App\Http\Controllers\InventoryController;
Route::get('/Inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/Inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/Inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/Inventory/Create', [InventoryController::class, 'Create']);
Route::delete('/Inventory/Delete/{Inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
Route::get('/Inventory/Show/{Inventory}', [InventoryController::class, 'show'])->name('inventory.show');
Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/Inventory/{Inventory}', [InventoryController::class, 'update'])->name('inventory.update');

use App\Http\Controllers\OrderController;
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/create', [OrderController::class, 'create']);
Route::delete('/orders/delete/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('menu');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
