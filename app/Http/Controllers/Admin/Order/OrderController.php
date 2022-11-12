<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = DB::table('order')->join('partners','partners.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')->select('*','order.name as odname','partners.name as ptname','employee.name as epname');
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
        return view('/admin/order/detail', compact('orders','lines','header','breadcrumb_item'));
    }
}
