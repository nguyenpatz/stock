<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index() {
        return view('admin.users.login', [
            'title' => 'Sign in'
        ]);
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // lấy mỗi data của email, password
        $credentials = $request->all('email', 'password');

        // email, password đúng thì chạy vào dashboard
        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Bạn đăng nhập thành công');
        }
        // email, password không đúng thì chạy lại về login để đăng nhập lại
        return redirect('admin.users.login')->withSuccess('Opps! email hoặc password của bạn không đúng');
    }

    // 

    public function register(){
        return view('admin.users.registration');
    }

    public function postRegistration(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'perm' => 'required|max:1',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('admin.dashboard.index')->withSucces('You have successfully logged in');
    }

    public function create(array $data, $perm = 1) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'perm' => (int)$data['perm'],
        ]);
    }

    // 

    public function dashboard() {
        // kiểm tra thành công chạy vào dashboard bằng route
        if(Auth::check()) {
            $title = 'DashBoard';
            $order = COUNT(DB::table('order')->where('state','New')->get());
            $product = COUNT(DB::table('product')->where('state','Stored')->get());
            $ipep = COUNT(DB::table('import__export')->where('status','New')->get());
            return view('admin.dashboard.index', compact('title','order','product','ipep'));
        }
        
        //không thành công
        return redirect('login')->withSuccess('Bạn không thể truy cập vào đây!!!');

    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('admin.users.login');
    }


    public function store(Request $request) {
        dd($request->input());
    }
}
