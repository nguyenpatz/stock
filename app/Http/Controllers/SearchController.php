<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $order = DB::table('order')->join('partner','partner.id','=','order.partner_id')
        ->join('employee','employee.id','=','order.employee_id')
        ->select('*','order.id as oid','order.name as odname','partner.name as ptname','employee.name as epname')->paginate(4);
        $title = __('lang.orders');
        $action = 'order_create';
        $search = $request->input('search');
        
        // Search in the title and body columns from the posts table
        $posts = Order::query()
        ->where('name', 'LIKE', "%{$search}%")
       // ->orWhere('body', 'LIKE', "%{$search}%")
        ->get();
        $title ='Search';
        // Return the search view with the resluts compacted
        return view('/admin/order/order', compact('order','posts','title'));
    }
}
