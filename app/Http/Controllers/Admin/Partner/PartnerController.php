<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;
use App\Models\Bank_account;

class PartnerController extends Controller
{
    //trả về view khi ấn button contact
    protected $bank_id;

    public function index() {
        $partners = DB::table('partner')->join('bank_account','bank_account.id','=','partner.bank_id')->select('*',
        'partner.name as ptname', 'bank_account.name as bn', 'partner.address as paddr',
        'partner.phone as phone', 'partner.email as email', 'partner.birthday as old');
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
        $banks = [
            'VietcomBank',
            'BIDV',
            'VBSP',
            'Vietinbank',
            'VN-Agribank',
            'Techcombank',
            'Sacombank',
            'MB Bank',
            'VPBank',
            'ACB',
            'SHB',
            'VIB',
            'Viet A bank',
            'Eximbank',
            'Đông Á Bank',

        ];
        $title = 'Create Partner';
        return view('/admin/partner/create',compact('banks', 'title'));
    }

    // insert vào table bank_account
    public function addBank($data) {
        return Bank_account::create([
            'name' => $data['bank_name'],
            'number_account' => $data['account_number'],
        ]);
    }

    // insert vào table partner
    public function addPartner($data) {
        $bank_id = $this->addBank($data);
        // lấy id của bank_account mới tạo
        $id = $bank_id->id;
        return Partner::create([
            'bank_id' => $id,
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'note' => $data['note'],
            'birthday' => $data['birthday'],
        ]);
    }

    // insert vào cả 2 bảng bank_account, partner
    public function store(Request $request) {
        $data = $request->all();
        $check = $this->addPartner($data);

        return redirect('/partner');

    }


}
