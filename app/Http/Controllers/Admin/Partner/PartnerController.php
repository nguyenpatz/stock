<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;

class PartnerController extends Controller
{
    //trả về view khi ấn button contact
    public function index() {
        $partners = DB::table('partner')->join('bank_account','bank_account.id','=','partner.bank_id')->select('*', 'partner.id as pid', 'partner.name as ptname', 'bank_account.number_account as bna', 'partner.address as paddr', 'partner.phone as phone', 'partner.email as email', 'partner.birthday as old');
        $partners = $partners->get();
        $title = $header = 'Partners';
        $breadcrumb_item = 'Partners';
        return view('admin/partner/partner', compact('partners', 'header', 'breadcrumb_item', 'title'));
    }


    // Hàm này tạo ra partner nên route của nó sẽ là post
    public function create(Request $request) {
        /*
            banks xuất hiện ở đây vì bank_id là khóa ngoại nằm trong
            table partner, ta phải lấy dữ liệu của nó để có thể 
            tạo ra data cho table partner
        */
        $banks = DB::table('bank_account')->select('*');
        $banks = $banks->get();
        $title = 'Create Partner';
        return view('/admin/partner/create',compact('banks', 'title'));
    }
    
    // hàm này lưu giữ liệu rồi lưu dữ liệu vào database 
    public function store(Request $request) {
        $data = $request->all();
        $partner = Partner::create($data);
        return $this->show($partner->id);
    }
}
