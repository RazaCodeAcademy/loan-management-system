<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return redirect()->route('admin.dashboard');
            }elseif(2 == Auth::user()->role){
                return redirect()->route('customer.dashboard');
            }
        }
        return view('admin.pages.login.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(
            array('email' => $request->email, 'password' => $request->password), true
            )) {
                if(1 == Auth::user()->role){
                    return redirect()->route('admin.dashboard');
                }elseif(2 == Auth::user()->role){
                    return redirect()->route('customer.dashboard');
                }else{
                    return redirect()->route('login')->with('feedback', 'Your account is deactivated! please contact to admininistration');
                }
        } else {
            return redirect()->route('login')->with('feedback', 'Enter correct email and password!');
        }
    }
}
