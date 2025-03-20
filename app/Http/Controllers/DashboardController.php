<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categoryCount = Category::count();
        $newsCount = News::count();
        $commentCount = Comment::count();

        return view('backend.dashboard', compact('categoryCount', 'newsCount', 'commentCount'));
    }
    public function news()
    {
        return view('backend.news');
    }
    public function contact()
    {
        return view('backend.contact');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}