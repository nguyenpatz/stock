<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {

        $category = DB::table('product_category')
        ->join('warehouse', 'warehouse.id' , '=', 'product_category.warehouse_id')
        ->select('product_category.*', 'warehouse.name as wname');
        $category = $category->get();
        $title = $header = 'Category';
        
        return view('admin.product.category', [
            'title' => $title,
            'categories' => $category,
        ]);
    }

    public function create() {
        $title = "Create Category";
        $warehouse = DB::table('warehouse')->select('*');
        $warehouse = $warehouse->get();
        return view('/admin/product/category_create', [
            'title' => $title,
            'warehouses' => $warehouse,
        ]);
    }

    public function addCategory($data) {
        return Category::create([
            'name' => $data['name'],
            'warehouse_id' => $data['warehouse_id'],
        ]);
    }
    
    public function store(Request $request) {
        $data = $request->all();
        $save = $this->addCategory($data);
        
        return redirect('/category');
    }
}
