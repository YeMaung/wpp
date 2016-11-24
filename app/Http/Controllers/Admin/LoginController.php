<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function loginForm()
    {
        // dd(strtoupper(md5('12345')));
    	return view('admin.login');
    }

    public function login(Request $request)
    {
        $user = User::whereName($request->name)->first();

        if (!$user) {
            return "User not found";
        }
    	if (!($user->password === strtoupper(md5($request->password)))) {
            return "Password Mismatch";
        }

        Auth::login($user);

        session(['user' => $user]);

        return redirect('/admin/post/create');
    }

    // public function login()
    // {
    //     if (Auth::attempt(['email' => 'admin@email.com', 'password' => 'admin123'])) {
    //         // Authentication passed...
    //         return "OK";
    //         return redirect()->intended('dashboard');
    //     }
    // }

}
