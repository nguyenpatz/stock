<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table('product')
        ->join('template','template.id','product.template_id')
        ->where('state','Stored')->select('*', 'product.id as pid', 'template.name as tname')->paginate(5);
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
    
    public function create()
    {
        $products = DB::table('product')->select('*');
        $products = $products->get();
        $templates = DB::table('template')->select('*');
        $templates = $templates->get();
        $title = 'Create Product';
        return view('/admin/product/product_create', compact('products','templates','title'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        $data['state']= __('lang.state1');
        $data['amount']=0;
        $product = Product::create($data);
        return $this->show($product->id);
    }
}
