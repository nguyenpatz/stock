<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvoiceLine;

class InvoiceLineController extends Controller
{
    public function index() {
        return view('admin.invoice.invoice_line', [
            'title' => 'InvoiceLine'
        ]);
    }
    public function create($id)
    {
        return view('admin.invoice.invoice_line', compact('id'));
    }
    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $invoiceline = InvoiceLine::findOrFail($id);
        
        $invoiceline->delete();
        return redirect('invoice');
    }
}
