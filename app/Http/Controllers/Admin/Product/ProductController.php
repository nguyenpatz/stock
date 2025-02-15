<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Template;
use App\Models\Orderline;
use App\Models\Order;
class ProductController extends Controller
{
    public function index() {
        $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->select('*', 'product.id as pid', 'template.name as tname')->paginate(5);
        $title = __('lang.product');
        $action = 'product_create';
        return view('/admin/product/product', compact('products', 'title','action'));
    }

    public function show($id)
    {
        $products = DB::table('product')->join('template','template.id','product.template_id')
        ->where('product.id', '=', $id)->select('*','template.name as tname','product.id as pid','product.state as pstate','product.note as pnote')->first();
        $template = DB::table('template')->where('id',$products->template_id)->first();
        $title = __('lang.product_detail');
        $action = 'order_create';
        return view('/admin/product/productdetail', compact('products', 'template','title','action'));
    }

    public function create($id)
    {
        $title = 'Create Product';
        return view('/admin/product/product_create', compact('title','id'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['state']= 'New';
        $template = Template::findOrFail($data['template_id']);
        $data['name']= $template->name;
        $data['volume'] = $data['height']*$data['width']*$data['length'];
        $product = Product::create($data);
        $product_list = Product::where('template_id',$product->template_id);
        $template->amount = $product_list->count();
        $template->save();
        //tìm ra order line chứa template để cập nhật amount và volume
        $order_line = Orderline::where('template_id',$template->id);

            $order_line->update(['amount' => $template ->amount],['volume' => $product_list->sum('volume')]);
        return redirect('template/'.$product->template_id.'');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $template = Template::findOrFail($product->template_id);
        $product->delete();
        $template->amount = Product::where('template_id',$id)->count();
        $template->save();
        return app('App\Http\Controllers\Admin\Product\TemplateController')->show($id);
    }
    public function edit($id){
        $product = Product::findOrFail($id);
        $template = DB::table('template')->select('*');
        $template = $template->get();
        $title = 'EDIT';
        return view('/admin/product/product_edit', compact('template','title','id','product'));
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->update($data);
        $template = Template::findOrFail($product->template_id);
        $template->amount = Product::where('template_id',$template->id)->count();
        $template->save();
        $orderline  = Orderline::where('template_id',$template->id);
        $orderline->update(['amount' => Product::where('template_id',$template->id)->count()]);
        $orderline->update(['volume'=>Product::where('template_id',$template->id)->sum('volume')]);

        //
        return $this->show($id);
    }
    public function view_product_fail(){
    $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->where('product.state','Fail')
        ->select('*', 'product.id as pid', 'template.name as tname','product.state as pstate')->paginate(5);
        $title = 'Product fail';
        $action = 'product_create';
        return view('/admin/product/product', compact('products', 'title','action'));
    }
    public function view_product_stored(){
        $products = DB::table('product')
            ->join('template','template.id','product.template_id')
            ->where('product.state','Stored')
            ->select('*', 'product.id as pid', 'template.name as tname','product.state as pstate')->paginate(5);
            $title = 'Product stored';
            $action = 'product_create';
            return view('/admin/product/product', compact('products', 'title','action'));
    }
}
