<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Template;

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
        ->where('product.id', '=', $id)->select('*','template.name as tname','product.id as pid')->first();
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
        $product = Product::create($data);
        $template->amount = Product::where('template_id',$product->template_id)->count();
        $template->save();
        return app('App\Http\Controllers\Admin\Product\TemplateController')->show($product->template_id);
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $template = Template::findOrFail($product->template_id);
        if ($product->state == 	'Stored'){
            echo'<script>alert("Order has been shipped")</script>';
            return app('App\Http\Controllers\Admin\Product\TemplateController')->show($template->id);
        }
        else{
            $product->delete();
            $template->amount = Product::where('template_id',$id)->count();
            $template->save();
            return app('App\Http\Controllers\Admin\Product\TemplateController')->show($id);}
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
        return $this->show($id);
    }
}
