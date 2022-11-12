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
        $invoices = DB::table('invoice')->join('partners','partners.id','=','invoice.partner_id')->select('*','partners.name as ptname','invoice.name as ivname');
        $invoices = $invoices->get();
        $header = 'Invoices';
        $breadcrumb_item = 'Invoices';
        return view('/admin/invoice/invoice', compact('invoices', 'header', 'breadcrumb_item'));
    }
    
    public function show($id)
    {
        $invoices = DB::table('invoice')->join('partners','partners.id','=','invoice.partner_id')->where('invoice.id','=', $id)->select('*','partners.name as ptname','invoice.name as ivname')->first();
       // $invoices = DB::table('invoice')->where('id', '=', $id)->select('*')->first();
        $lines = DB::table('invoice_line')->join('product', 'product.id', '=', 'invoice_line.product_id')
        ->where('invoice_line.id','=',$id)->select('*');
        $lines = $lines->get();
        $header = 'Invoices';
        $breadcrumb_item = 'Invoices';
        return view('/admin/invoice/invoice_detail', compact('invoices','lines','header','breadcrumb_item'));
    }

    public function create()
    {
        $partners = DB::table('partners')->select('*');
        $lines = $lines->get();
        return view('/admin/invoice/create');
    }

    public function store(Request $request)
    {
//         $name = $request->name;
//         $partner_id = $request->partner_id;
//         $create_date = $request->create_date;
//         $date_payment = $request->date_payment;
//         $payment_term = $request->payment_term;
//         $total_payment = $request->total_payment;
//         $state = $request->state;

//         DB::table('invoice')->insert([
//             'name' => $name,
//             'partner_id' => $partner_id,
//             'create_date' => $create_date,
//             'date_payment' => $date_payment,
//             'payment_term' => $payment_term,
//             'total_payment' => $total_payment,
//             'state' => $state
//         ]);
//         action([InvoiceController::class, 'create']);
//         return Redirect::action([InvoiceController::class, 'create']);     
    }

    public function edit($id)
    {
        $invoices = invoice::findOrFail($id);
        $title = 'Invoices - Update';
        return view('/admin/invoices_update', compact('invoices', 'pageName'));
    }
    
    public function update(Request $request, $id)
    {
        $invoices = invoice::find($id);
        $invoices->name = $request->name;
        $invoices->partner_id = $request->partner_id;
        $invoices->create_date = $request->create_date;
        $invoices->date_payment = $request->date_payment;
        $invoices->payment_term = $request->payment_term;
        $invoices->total_payment = $request->total_payment;
        $invoices->state = $request->state;
        
        $invoices->save();
        return redirect()->action('Admin\Invoice\InvoiceController@index');
    }

    public function destroy($id)
    {
        $invoices = invoice::find($id);
        
        $invoices->delete();
        return redirect()->action('Admin\Invoice\InvoiceController@index')->with('success','Data removed.');
    }
}
