<?php

namespace App\Http\Controllers\Admin\IP_EP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\IpEp;
use App\Models\Product;
use App\Models\Template;

class IpEpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ipep = DB::table('import__export')->select('*');
        $ipep = $ipep->get();
        $title = 'Import/Export';
        return view('/admin/import_export/ip_ep', compact('ipep','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $order = Order::findOrFail($data['order_id']);
//        $orderline = DB::table('order_line')->where('order_id','=',$order->id)->select('id');
        $data['name']='IPEP'.$order->id;
        $data['partner_id'] = $order->partner_id;
        $data['status'] = 'New';
        $ipep = IpEp::create($data);
        return $this->show($ipep->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipeps = DB::table('import__export')->where('id', '=', $id)->select('*')->first();
        $title = 'Import/Export Detail';
        return view('/admin/import_export/detail', compact('ipeps','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Tìm đến đối tượng muốn xóa
        $ipep = IpEp::findOrFail($id);
        $ipep->delete();
        return redirect('ipep');
    }
    public function done($id){
        $ipep = IpEp::findOrFail($id);
        $order = Order::findOrFail($ipep->order_id);
        $order_line = DB::table('order_line')->where('order_id','=',$order->id)->select('*');
        foreach($order_line->get() as $row){
            $product = Template::findOrFail($row->product_id);
            $product->state='Stored';
            $product->save();
        }
        $ipep->status = 'Done';
        $ipep->save();
        $order->state = 'Done';
        $order->save();
        return redirect('ipep');
    }
    public function action_done($id){
        Order::findOrFail($id)->update(['state'=>'Created IP/EP']);
        $ipep = IpEp::where('order_id',$id)->select('id')->get();
        $title = 'Ipep create';
        if ($ipep->value('id') == null){
            return view('/admin/import_export/ipep_create', compact('id','title'));}
        else{
             echo'<script>alert("Order has been shipped")</script>';
             return app('App\Http\Controllers\Admin\Order\OrderController')->show($id);
            }
    }
}
