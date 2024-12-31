<?php

namespace App\Service\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginService {
    public function loginView(){
        return view('admin.log.login');
    }

    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $account = User::where('email', $email)->first();
        
        if (!$account) {
            return redirect('/login')->with('error', 'Không tìm thấy tài khoản');
        }

        // Kiểm tra mật khẩu
        if (!Hash::check($password, $account->password)) {
            return redirect('/login')->with('error', 'Thông tin đăng nhập không chính xác');
        }

        Auth::login($account);

        if ($account->role == 'admin' || $account->role == 'editor') {
            return redirect('/admin')->with('message', 'Đăng nhập thành công');
        }

        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login')->with('message', 'Đăng xuất thành công');
    }
}
