<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseInventoryController extends Controller
{
    public function index() {
        return view('admin.warehouse.warehouse_inventory', [
            'title' => "Inventory"
            
        ]);
    }
}
