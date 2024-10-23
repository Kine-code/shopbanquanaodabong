<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', ['title' => 'Đăng nhập hệ thống']);
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Lưu thông tin xác thực
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Đăng nhập thành công, chuyển hướng tới trang admin
            return redirect()->route('admin');
        }
        FacadesSession::flash('error', 'Email hoặc mật khẩu của bạn không đúng!');
        return redirect()->back();
    }
}
