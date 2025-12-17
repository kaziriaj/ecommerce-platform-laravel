<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::guard('admin')->check()){
            //Already logged in
            $role = strtolower(Auth::guard('admin')->user()->role->name);

            return match($role){
                'admin' => redirect('/admin/dashboard'),
            'editor' => redirect('/editor/dashboard'),
            'seller' => redirect('/seller/dashboard'),
            'receiver' => redirect('/receiver/dashboard'),
            default => redirect('/admin/dashboard')
            };
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::guard('admin')->attempt($credentials))
            {
                $request->session()->regenerate();

                $role = Auth::guard('admin')->user()->role->name;

                return match($role) {
                    'admin' => redirect('/admin/dashboard'),
                    'editor' => redirect('/editor/dashboard'),
                };
            }

            return back()->withErrors([
                'email' => 'Invalid Credentials',
            ]);
        }

        public function logout(Request $request)
        {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerate();

            return redirect('/admin/login');
        }

}
