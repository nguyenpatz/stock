<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\InvoiceLine;
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
        $lines = DB::table('order_line')->join('product','product.id','=','order_line.product_id')->where('order_id','=',$id)->select('*','order_line.id as olid','product.name as pname');
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
        $order_line =DB::table('order_line')->where('order_id','=',$id)->select('*')->get();
        $invoice = new Invoice;
        $invoice -> name = 'Invoice id';
        $invoice ->partner_id = DB::table('order')->where('id','=',$id)->select('partner_id')->value('partner_id');
        $invoice->create_date = date('Y-m-d H:i:s');
        $invoice->date_payment = '2022-11-17 20:06:0';
        $invoice->payment_term = 'aa';
        $invoice->order_id = $id;
        $invoice->total_payment = 0;
        $invoice->state='New';
        $invoice->save();

        foreach($order_line as $row){
            $invoice_line = new InvoiceLine;
            $invoice_line->product_id = $row->product_id;
            $invoice_line->invoice_id = $invoice->id;
            $invoice_line->total_money = 0;
            $invoice_line->amount = $row->amount;
            $invoice_line->unit_price = $row->price;
            $invoice_line->note='a';
            $invoice_line->save();
        }
        return redirect('invoice');
    }

    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $order = Order::findOrFail($id);
        $orderline = DB::table('order_line')->where('order_id','=',$id)->select('id');
        $invoice = DB::table('invoice')->where('order_id','=',$id)->select('id');
        $invoiceline = DB::table('invoice_line')->where('invoice_id','=',$invoice->value('id'))->select('id');
        $invoiceline->delete();
        $invoice->delete();
        $orderline->delete();
        return redirect('order');
    }
}
