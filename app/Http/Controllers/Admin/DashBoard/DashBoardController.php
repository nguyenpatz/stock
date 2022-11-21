<?php

namespace App\Http\Controllers\Admin\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index() {
        $title = 'Dash Board';
        return view('admin.dashboard.index', compact('title'));
    }
}
