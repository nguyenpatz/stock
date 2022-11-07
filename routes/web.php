<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\DashBoard\DashBoardController;

Route::get('login', [
    LoginController::class,
    'index'
]);

Route::get('dashboard', [
    DashBoardController::class,
    'index'
]);

Route::post('admin/users/login/store', [
    LoginController::class,
    'store'
]);

Route::get('/', function () {
    return view('welcome');
});
