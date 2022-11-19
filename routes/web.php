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
use App\Http\Controllers\Admin\Repair\RepairController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SearchController;
// trả về view đăng nhập

Route::get('login', [
    LoginController::class,
    'index'
])->name('login');



/*
khi click button login, phương thức post lấy dữ liệu email 
và password của người dùng để LoginController check
*/
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');


Route::get('registration', [
    LoginController::class,
    'register'
])->name("register");

Route::post('post-registration', [
    LoginController::class,
    'postRegistration'
])->name("register.post");


// đăng nhập thành công chạy về dashboard
Route::get('dashboard', [LoginController::class, 'dashboard']);

Route::get('product', [
    ProductController::class,
    'index'
]);

Route::get('product/{id}', [
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

Route::post('order_update/{id}', [
    OrderController::class,
    'update'
]);

Route::get('order_edit/{id}', [
    OrderController::class,
    'edit'
]);

Route::post('orderline_update/{id}', [
    OrderLineController::class,
    'update'
]);

Route::get('orderline_edit/{id}', [
    OrderLineController::class,
    'edit'
]);

Route::get('order_create', [
    OrderController::class,
    'create'
]);


Route::post('order/store', [
    OrderController::class,
    'store'
]);

Route::get('product_create', [
    ProductController::class,
    'create'
]);


Route::post('product/store', [
    ProductController::class,
    'store'
]);

Route::get('orderline_create/{id}', [
    OrderLineController::class,
    'create'
]);

Route::post('order_line/store',[
    OrderLineController::class,
    'store'
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

Route::get('create_invoice_from_order/{oid}',[
    OrderController::class,
    'create_invoice'
]);

Route::get('/admin/invoice/edit/{id}', [
    InvoiceController::class,
    'edit'
]);

Route::get('invoice/update/{id}', [
    InvoiceController::class,
    'update'
]);

Route::get('invoice_done/{id}', [
    InvoiceController::class,
    'action_done'
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

Route::get('/invoice_delete/{id}', [
    InvoiceController::class,
    'delete'
]);

Route::get('/invoiceline_delete/{id}', [
    InvoiceLineController::class,
    'delete'
]);

Route::get('/order_delete/{id}', [
    OrderController::class,
    'delete'
]);

Route::get('/create_ipep/{id}', [
    IpEpController::class,
    'create'
]);

Route::post('/ipep/create', [
    IpEpController::class,
    'store'
]);

Route::get('/orderline_delete/{id}', [
    OrderLineController::class,
    'delete'
]);

Route::post('admin/users/login/store', [
    LoginController::class,
    'store'
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('order_done/{id}', [
    IpEpController::class,
    'action_done'
]);

Route::post('ipep/store', [
    IpEpController::class,
    'store'
]);

Route::get('/ipep_done/{id}', [
    IpEpController::class,
    'done'
]);
Route::get('lang/{locale}', [App\Http\Controllers\LanguageController::class, 'index']);

Route::get('/search/', [
    OrderController::class,
    'search']);

