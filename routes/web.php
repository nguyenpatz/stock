<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\DashBoard\DashBoardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\TemplateController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Order\OrderLineController;
use App\Http\Controllers\Admin\Invoice\InvoiceController;
use App\Http\Controllers\Admin\Invoice\InvoiceLineController;
use App\Http\Controllers\Admin\Warehouse\WarehouseController;
use App\Http\Controllers\Admin\IP_EP\IpEpController;
use App\Http\Controllers\Admin\Warehouse\WarehouseInventoryController;

Route::get('login', [
    LoginController::class,
    'index'
]);

Route::get('dashboard', [
    DashBoardController::class,
    'index'
]);

Route::get('product', [
    ProductController::class,
    'index'
]);

Route::get('/admin/product/{id}', [
    ProductController::class,
    'show'
]);

Route::get('template', [
    TemplateController::class,
    'index'
]);

Route::get('category', [
    CategoryController::class,
    'index'
]);

Route::get('order', [
   OrderController::class,
    'index'
]);

Route::get('order/{id}', [
    OrderController::class,
    'show'
]);

Route::get('ipep', [
    IpEpController::class,
    'index'
]);

Route::get('ipep/{id}', [
    IpEpController::class,
    'show'
]);

Route::get('invoice', [
    InvoiceController::class,
    'index'
]);

Route::get('invoice/create', [
    InvoiceController::class,
    'create'
]);

Route::post('invoice/create', [
    InvoiceController::class,
    'store'
]);

Route::get('invoice/edit/{id}', [
    InvoiceController::class,
    'edit'
]);

Route::post('invoice/update/{id}', [
    InvoiceController::class,
    'update'
]);

Route::get('invoice/{id}', [
    InvoiceController::class,
    'show'
]);


Route::get('/admin/invoice/edit/{id}', [
    InvoiceController::class,
    'edit'
]);

Route::get('invoice/update/{id}', [
    InvoiceController::class,
    'update'
]);

Route::get('invoice/unlink/{id}', [
    InvoiceController::class,
    'destroy'
]);

Route::get('invoice_line', [
    InvoiceLineController::class,
    'index'
]);

Route::get('partner', [
    PartnerController::class,
    'index'
]);

Route::get('employee', [
    EmployeeController::class,
    'index'
]);

Route::get('warehouse', [
    WarehouseController::class,
    'index'
]);

Route::get('WarehouseInventory', [
    WarehouseInventory::class,
    'index'
]);

Route::post('admin/users/login/store', [
    LoginController::class,
    'store'
]);

Route::get('/', function () {
    return view('welcome');
});
