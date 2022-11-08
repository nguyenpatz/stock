<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    public function index() {
        return view('admin.order.order_line', [
            'title' => 'OrderLine'
        ]);
    }
}
