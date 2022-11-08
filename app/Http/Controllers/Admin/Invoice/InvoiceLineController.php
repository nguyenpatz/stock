<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceLineController extends Controller
{
    public function index() {
        return view('admin.invoice.invoice_line', [
            'title' => 'InvoiceLine'
        ]);
    }
}
