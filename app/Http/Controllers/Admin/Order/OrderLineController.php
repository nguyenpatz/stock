<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orderline;
use App\Models\Order;
use App\Http\Controllers\Admin\IP_EP\IpEpController;
use App\Models\Template;
use App\Models\Product;
class OrderLineController extends Controller
{
    public function index() {
        return view('admin.order.order_line');
    }
    public function create($id)
    {
        $order = Order::findOrFail($id);
        if ($order->type == 'import'){
            $templates = DB::table('template')->where('state','New')->select('*');
            $templates = $templates->get();}
        else {
            $templates = DB::table('template')->where('state','Stored')->select('*');
            $templates = $templates->get();}
        $title = 'Order Line Create';
        return view('admin.order.order_line', compact('templates','id','title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $template = Template::findOrFail($data['template_id']);
        // amount của orderline bằng
        $data['amount'] = $template->amount;
        // lọc ra các product của template của state là new
        $product = Product::where('template_id',$template->id)->where('state','New')->orWhere('state','Stored');
        $data['volume']  = $product->sum('volume');
        Orderline::create($data);
        $order = Order::findOrFail($data['order_id']);
        $id = $order->id;
        return redirect('/order/'.$id.'');
    }

    public function edit($id)
    {
        //lọc ra các template nào đang có trang thái là new để gắn cho order line
        $orderline = OrderLine::findOrFail($id);
        if (Order::findOrFail($orderline->order_id)->type=="import"){
        $templates = Template::where('state','New');
        $templates = $templates->get();}
        else{
        $templates = Template::where('state','Stored');
        }
        $title = 'Order line edit';
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin/order/orderline_edit', compact('orderline','templates', 'title'));
    }

    public function update(Request $request, $id){
        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();
        // Tìm đến đối tượng muốn update
        $orderlines = OrderLine::findOrFail($id);

        //tìm đến template update
        $template = Template::findOrFail($data['template_id']);

        //tinh the tích cho order line
        if (Order::findOrFail($orderlines->order_id)->type='import'){
            $product = DB::table('product')->where('template_id',$template->id)->where('state','New')->select('*');
            $product = $product->get();}
        else{
            $product = DB::table('product')->where('template_id',$template->id)->where('state','Stored')->select('*');
            $product = $product->get();}
        //thể tíc của orderline
        $data['volume']  = $product->sum('volume');
        // amount của orderline bằng
        $data['amount'] = $product->count();
        $orderlines->update($data);
        // quay trở lại trang chi tiết order chưa order line vừa sửa
        return redirect('/order/'.$orderlines->order_id.'');
    }
    public function delete($id){
        // Tìm đến đối tượng muốn xóa
        $OrderLine = OrderLine::findOrFail($id);
        $order = Order::findOrFail($OrderLine->order_id);
        $ipep = IpEp::where('order_id',$order->id);

        $ipep->delete();
        $OrderLine->delete();
        return redirect('/order/'.$order->id.'');
    }
}
