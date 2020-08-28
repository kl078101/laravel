<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLogin;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){

        return view('admin.login');

    }

    public function check(AdminLogin $adminlogin){

        $data = $adminlogin->validated();
        $data['state'] = AdminUser::NORMAL;

        $is = Auth::guard('admin')->attempt($data);

        if(!$is){
            return back()->withErrors(['username' => '账号不可用']);
        }

        return redirect()->route('admin.index');
    }

    public function logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');

    }
}
