<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index(){
        return view('backend.auth.login');
    }

//    for dashboard
    public function doLogin(Request $request){
        $credentials = [
            'email' =>  $request->input('email'),
            'password' =>  $request->input('password'),
        ];


        $login = Auth::attempt($credentials);
        if($login){
            return redirect()->route('dashboard');
        }else{
            Session::flash('failed', 'Login Failed');
            return redirect()->back();
        }


    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

//for comment login

    public function login(Request $request){
        $credentials = [
            'email' =>  $request->input('email'),
            'password' =>  $request->input('password'),
        ];


        $login = Auth::guard('visitor')->attempt($credentials);

        if($login){
            return redirect()->url($request->input('url'));
        }else{
            Session::flash('failed', 'Login Failed');
            return redirect()->back();
        }


    }



}

