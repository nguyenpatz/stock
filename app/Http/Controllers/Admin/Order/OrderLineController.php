<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orderline;

class OrderLineController extends Controller
{
    public function index() {
        return view('admin.order.order_line', [
            'title' => 'OrderLine'
        ]);
    }
    public function create()
    {   
        $id = 3;
        $products = DB::table('product')->select('*');
        $products = $products->get();
        return view('admin.order.order_line', compact('products','id'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        Orderline::create($data);
        echo '<script>alert("Successfull")</script>';
    }
}
