<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{
    //

    public function index(){
        return view('admin.login');
    }

    /**
     * Login function for system.
     *
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function LoginUser(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data)){
            
            return redirect('admin/dashboard')->with('message','Logged In Successfully');
        }
        return redirect()->back()->with('message','INVALID Login');
    }

    /**
     * Remove the specified Auth and session from storage.
     *
     * @param  \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function LogOut(){
        Auth::logout();
        Session::flush();

        return redirect('/login')->with('message','Logged Out');
    }

    public function indexProfile(){

        return view('admin.profile');
    }

    public function updatePassword(Request $request,$id)
    {
        $validation = Validator::make($request->all(),[
            'password'=>'required|min:8|confirmed',
        ]);;

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }else{

            $user = User::find($id);
            $user->password = bcrypt($request->input('password'));
          
            $result = $user->save();
            if($result)
            {
                return Redirect::back()->with('successMsg', 'Password change successful..!');;
            }
        }
    }
}
