<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orderline;
use App\Models\Order;
use App\Http\Controllers\Admin\IP_EP\IpEpController;

class OrderLineController extends Controller
{
    public function index() {
        return view('admin.order.order_line');
    }
    public function create($id)
    {
        $products = DB::table('product')->select('*',);
        $products = $products->get();
        $title = 'Order Line Create';
        return view('admin.order.order_line', compact('products','id','title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Orderline::create($data);
        $order = Order::findOrFail($data['order_id']);
        $id = $order->id;
        $order ->update(['total_payment'=> $order->total_payment+ $data['price']*$data['amount']]);
        return app('App\Http\Controllers\Admin\Order\OrderController')->show($id);
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
        return app('App\Http\Controllers\Admin\Order\OrderController')->show($orderlines->order_id);;
    }
    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $OrderLine = OrderLine::findOrFail($id);
        $order = Order::findOrFail($OrderLine->order_id);
        $ipep = DB::table('import__export')->where('order_id',$order->id)->select('*');
        $price = $OrderLine->price;
        $amount = $OrderLine->amount;
        $ipep->delete();
        $OrderLine->delete();
        $order->update(['total_payment'=>$order->total_payment- ($price*$amount)]);
        $lines = DB::table('order_line')->where('order_id',$order->id)->select('*');
        $lines = $lines->get();
        if ($order->total_payment < 0 || $lines->value('id')==null){
            $order->total_payment =0;
            $order->save();
        }
        return app('App\Http\Controllers\Admin\Order\OrderController')->show($order->id);
    }
}
