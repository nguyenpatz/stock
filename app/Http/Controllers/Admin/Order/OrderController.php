<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index() {
        $order = DB::table('order')->join('partners','partners.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')->select('*','order.id as oid','order.name as odname','partners.name as ptname','employee.name as epname');
        $order = $order->get();
        $header = 'Orders';
        $breadcrumb_item = 'Orders';
        return view('/admin/order/order', compact('order','header','breadcrumb_item'));
    }

    public function show($id)
    {
        $orders = DB::table('order')->join('partners','partners.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')->select('*','order.name as odname','partners.name as ptname','employee.name as epname')->first();
        $lines = DB::table('order_line')->where('order_id','=',$id)->select('*');
        $lines = $lines->get();
        $header = 'Orders';
        $breadcrumb_item = 'Orders/OrderDetail';
        return view('/admin/order/order_detail', compact('orders','lines','header','breadcrumb_item'));
    }
    
    public function create()
    {
        $partners = DB::table('partners')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        return view('/admin/order/create', compact('partners','employees'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        Order::create($data);
        echo '<script>alert("Successfull")</script>';
    }
    
    public function edit($id)
    {
        $partners = DB::table('partners')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        $order = Order::findOrFail($id);
        
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin/order/edit', compact('order','partners','employees'));
    }
    
    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $orders = Order::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        
        $orders->save();
        echo"success update invoice";
    }
    public function newoderline($id){
        return view('/admin/order/order_line',compact('id'));
    }
    public function store2(Request $request){
        $data = $request->all();
        Orderline::create($data);
        echo '<script>alert("Successfull")</script>';
    }
}
