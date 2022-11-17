<?php

namespace App\Http\Controllers\Admin\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use Illuminate\Support\Facades\Redirect;


class InvoiceController extends Controller
{
    public function index() {
        $invoices = DB::table('invoice')->join('partner','partner.id','=','invoice.partner_id')->select('*','invoice.id as ivid','partner.name as ptname','invoice.name as ivname');
        $invoices = $invoices->get();
        $header = 'Invoices';
        $breadcrumb_item = 'Invoices';
        return view('/admin/invoice/invoice', compact('invoices', 'header', 'breadcrumb_item'));
    }
    
    public function show($id)
    {
        $invoices = DB::table('invoice')->join('partner','partner.id','=','invoice.partner_id')
        ->where('invoice.id','=', $id)
        ->select('*','invoice.id as ivid','partner.name as ptname','invoice.name as ivname')->first();
        $lines = DB::table('invoice_line')->join('product','product.id','=','invoice_line.product_id')->where('invoice_id','=',$id)->select('*','invoice_line.id as ivlid','product.name as pname');
        $lines = $lines->get();
        $header = 'Invoices';
        $breadcrumb_item = 'Invoices';
        return view('/admin/invoice/invoice_detail', compact('invoices','lines','header','breadcrumb_item'));
    }

    public function create()
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $orders = DB::table('order')->select('*');
        $orders = $orders->get();
        return view('/admin/invoice/create', compact('partners','orders'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Invoice::create($data);
        echo '<script>alert("Successfull")</script>';
    }

    public function edit($id)
    {
        $partners = DB::table('partner')->select('*');
        $partners = $partners->get();
        $orders = DB::table('order')->select('*');
        $orders = $orders->get();
        $invoice = Invoice::findOrFail($id);
        
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin/invoice/edi', compact('invoice','partners','orders'));
    }
    
    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $invoices = Invoice::findOrFail($id);
        
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        
        $invoices->save();
        echo"success update invoice";
    }

    public function destroy($id)
    {
        $invoices = invoice::find($id);
        
        $invoices->delete();
        return redirect()->action('Admin\Invoice\InvoiceController@index')->with('success','Data removed.');
    }

    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $invoice = Invoice::findOrFail($id);
        
        $invoice->delete();
        return redirect('invoice');
    }
}
