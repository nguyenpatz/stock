<?php

namespace App\Http\Controllers\Admin\Order;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orderline;
use App\Models\Order;
use App\Http\Controllers\Admin\IP_EP\IpEpController;
use App\Models\Template;

class OrderLineController extends Controller
{
    public function index() {
        return view('admin.order.order_line');
    }
    public function create($id)
    {
        $templates = DB::table('template')->where('state','New')->select('*');
        $templates = $templates->get();
        $title = 'Order Line Create';
        return view('admin.order.order_line', compact('templates','id','title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $template = Template::findOrFail($data['template_id']);
        // amount của orderline bằng
        $data['amount'] = $template->amount;
        $data['volume']  = $template->volume;
        Orderline::create($data);
        $order = Order::findOrFail($data['order_id']);
        $id = $order->id;
        return redirect('/order/'.$id.'');
    }

    public function edit($id)
    {
        //lọc ra các template nào đang có trang thái là new để gắn cho order line
        $templates = Template::where('state','New');
        $orderline = OrderLine::findOrFail($id);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('admin/order/orderline_edit', compact('orderline','templates'));
    }

    public function update(Request $request, $id){
        // Tìm đến đối tượng muốn update
        $orderlines = OrderLine::findOrFail($id);

        // gán dữ liệu gửi lên vào biến data
        $data = $request->all();

        $orderlines->update($data);
        // quay trở lại trang chi tiết order chưa order line vừa sửa
        return redirect('/order/'.$orderline->order_id.'');
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
