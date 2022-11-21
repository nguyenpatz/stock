<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Template;

class TemplateController extends Controller
{
    public function index() {
        $template = DB::table('template')
        ->join('product_category','product_category.id','template.category_id')
        ->select('*','product_category.name as cname','template.name as tname', 'template.id as tid')->paginate(5);
        $title = __('lang.product');
        $action = 'template_create';
        return view('/admin/product/template', compact('template', 'title','action'));
    }

    public function show($id)
    {
        $product = DB::table('product')->join('template','template.id','product.template_id')
        ->where('product.template_id', '=', $id)->select('*','product.id as pid');
        $product = $product->get();
        $template = DB::table('template')->where('id',$id)->select('*')->first();
        $category = DB::table('product_category')->where('id',$template->category_id)->first();
        $title = __('lang.product_detail');
        $action = 'template_create';
        return view('/admin/product/templatedetail', compact('product', 'template','category','title','action'));
    }

    public function create()
    {
        $category = DB::table('product_category')->select('*');
        $category = $category->get();
        $title = 'Create Product Template';
        return view('/admin/product/template_create', compact('title','category'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['state']= __('lang.state1');
        $data['amount']=0;
        $template = Template::create($data);
        return $this->show($template->id);
    }
}
