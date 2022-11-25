<?php

namespace App\Http\Controllers\Admin\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashBoardController extends Controller
{
    public function index() {
        $title = 'Dash Board';
        $order = COUNT(DB::table('order')->where('state','New')->get());
        $product = COUNT(DB::table('product')->where('state','Stored')->get());
        $productfail = COUNT(DB::table('product')->where('state','Fail')->get());
        $ipep = COUNT(DB::table('import__export')->where('status','New')->get());
        return view('admin.dashboard.index', compact('title','order','product','ipep','productfail'));
    }
}
