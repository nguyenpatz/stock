<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index() {
        $order = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname');
        $order = $order->get();
        $header = 'Orders';
        $breadcrumb_item = 'Orders';
        return view('/admin/order/order', compact('order','header','breadcrumb_item'));
    }

    public function show($id)
    {
        $orders = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->where('order.id','=',$id)
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->first();
        $lines = DB::table('order_line')->where('order_id','=',$id)->select('*');
        $lines = $lines->get();
        $header = 'Orders';
        $breadcrumb_item = 'Orders/OrderDetail';
        return view('/admin/order/order_detail', compact('orders','lines','header','breadcrumb_item'));
    }
    
    public function create()
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        return view('/admin/order/create', compact('partners','employees'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        Order::create($data);
        return redirect('order');
    }
    
    public function edit($id)
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $employees = DB::table('employee')->select('*');
        $employees = $employees->get();
        $order = Order::findOrFail($id);
        
        return view('admin/order/edit', compact('order','partners','employees'));
    }
    
    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $orders = Order::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        
        $orders->update($data);
        return redirect('order');
    }
    
    public function create_invoice($id){
        DB::table('invoice')->insert([
            'name'     => 'Invoice id',
            'partner_id' => (int)DB::table('order')->where('id','=',$id)->select('partner_id'),
            'create_date' => date('Y-m-d H:i:s'),
            'date_payment' => '2022-11-17 20:06:0',
            'payment_term' => 'ffff',
            'total_payment'=>0,
            'state'=>'ee',
            'order_id'=> $id,
        ]);
        return redirect('invoice');
    }
}
