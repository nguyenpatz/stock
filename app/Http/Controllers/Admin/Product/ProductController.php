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
        ->where('product.state','Stored')->select('*', 'product.id as pid', 'template.name as tname')->paginate(5);
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
        $template->amount = $template->amount+1;
        $template->save();
        return app('App\Http\Controllers\Admin\Product\TemplateController')->show($product->template_id);
    }
}
