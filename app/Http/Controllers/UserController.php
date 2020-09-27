<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function index(){
        return view('admin.login');
    }

    public function LoginUser(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            
            return redirect('admin/dashboard')->with('message','Logged In Successfully');
        }
        return redirect()->back()->with('message','INVALID Login');
    }

    public function LogOut(){

        Auth::logout();
        Session::flush();

        return redirect('/login')->with('message','Logged Out');
    }
}
