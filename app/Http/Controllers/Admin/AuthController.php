<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('backend.login');
    }
    public function Login(LoginAdminRequest $request)
    {
        $remember_me = $request->has('remember') ? true : false; 
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember_me)) {
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc Password Không đúng');
        return redirect()->back();
    }
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function Logout()
    {
        if (Auth::user()) {
            Auth::logout();
            return redirect()->route('admin.login');
        }  
    }
}
