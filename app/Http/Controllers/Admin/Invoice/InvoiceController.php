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
        $invoices = DB::table('invoice')->join('partner','partner.id','=','invoice.partner_id')
        ->select('*','invoice.id as ivid','partner.name as ptname','invoice.name as ivname')->paginate(5);
        $title = __('lang.invoice');
        return view('/admin/invoice/invoice', compact('invoices', 'title'));
    }
    
    public function show($id)
    {
        $invoices = DB::table('invoice')->join('partner','partner.id','=','invoice.partner_id')
        ->where('invoice.id','=', $id)
        ->select('*','invoice.id as ivid','partner.name as ptname','invoice.name as ivname')->first();
        $lines = DB::table('invoice_line')->join('template','template.id','=','invoice_line.product_id')
        ->where('invoice_id','=',$id)
        ->select('*','invoice_line.id as ivlid','invoice_line.amount as lamount','template.name as pname');
        $lines = $lines->get();
        $title = __('lang.invoice_detail');
        return view('/admin/invoice/invoice_detail', compact('invoices','lines','title'));
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
        $invoiceline = DB::table('invoice_line')->where('invoice_id','=',$id)->select('*');
        $invoiceline->delete();
        $invoice->delete();
        return redirect('invoice');
    }
}
