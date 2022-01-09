<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Auth;
class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }

    public function loginProcess(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'account_status' => 'Active'])) {
            return redirect()->route('user.home');
        }else{
            if($user->account_status === "Active"){
                $message = "Please Check Your Credentials";
            }else{
                $message = "Your Account Is Not Active";
            }
            Session::flash('message', $message);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
