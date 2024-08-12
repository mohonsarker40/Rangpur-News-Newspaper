<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App;

class localization extends Controller
{
    public function change(Request $request)
    {
        App::setLocale($request->msg);
        session()->put('locale', $request->msg);

        return redirect()->back();
    }

}
