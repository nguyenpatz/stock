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
    public function create($id)
    {   
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

    public function edit($id)
    {
        $products = DB::table('product')->select('*');
        $products = $products->get();
        $orderline = OrderLine::findOrFail($id);
        
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin/order/orderline_edit', compact('orderline','products'));
    }
    
    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $orderlines = OrderLine::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        
        $orderlines->update($data);
        return redirect('order');
    }
}
