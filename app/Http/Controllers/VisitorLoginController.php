<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Session; // Import Session facade

class VisitorLoginController extends Controller
{
    public function store(Request $request)
    {
        $visitor = new Visitor();
        $visitor->fill($request->all());
        $visitor->password = Hash::make($request->password);
        $visitor->save();

        $data['url'] = \request()->input('back_url');
        return redirect()->route('comment.index', $data);
    }

    public function visitor_do_login(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

//        $login = Auth::guard('visitor')->attempt($credentials);

        if (Auth::guard('visitor')->attempt($credentials)) {
            $backUrl = $request->input('back_url');
            return redirect()->to("$backUrl#commentSection");
        } else {
            Session::flash('failed', 'Login Failed');
            return redirect()->back();
        }
    }
}
