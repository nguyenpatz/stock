<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index() {
        return view('admin.warehouse.warehouse', [
            'title' => "Warehouse"
        ]);
    }
}
