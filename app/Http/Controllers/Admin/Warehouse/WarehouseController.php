<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function index() {

        $warehouse = DB::table('warehouse')->select('*');
        $warehouse = $warehouse->get();
        
        return view('admin.warehouse.warehouse', [
            'title' => "Warehouse",
            'header'=>'Warehouse',
            'breadcrumb_item'=>'Warehouse',
            'warehouses' => $warehouse,
        ]);
    }
}
