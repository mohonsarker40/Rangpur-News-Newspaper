<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data['slides'] = News::with('category:category_name,id')->take(4)->orderBy('id', 'DESC')->get();
        $data['news'] = News::take(4)->skip(0)->orderBy('id', 'DESC')->get();
        $data['categories'] = Category::all();
        $data['breakingNews'] = News::take(3)->skip(0)->orderBy('id', 'DESC')->get();
        $data['featuredSlides'] = News::orderBy('view_count', 'DESC')->get();
        $data['latestNews'] = News::orderBy('id', 'DESC')->paginate(8);
        $data['flickrs'] = News::take(6)->skip(0)->orderBy('id', 'DESC')->get();
        return view('homepage', $data);
    }


    public function webCategory($cateId)
    {
        $data['news'] = News::with('author:name,id')->where('category_id', $cateId)->paginate(3);
        $data['categories'] = Category::all();
        $category = Category::find($cateId);
        $data['category'] = $category;

//        $news = News::find($cateId);
//        $data['news'] = $news;

        $data['flickrs'] = News::take(6)->skip(0)->get();


//        News::find($cateId)->increment('view_count');
        News::where('category_id', $cateId)->increment('view_count');
        return view('category', $data);
    }

    public function newsDetails($newsId)
    {
        $data['news'] = News::with('author:name,id', 'category:category_name,id')->where('id', $newsId)->first();
        $data['categories'] = Category::all();
        $data['flickrs'] = News::take(6)->skip(0)->get();

//        $data['comments'] = Comment::take(5)->orderBy('id', 'DESC')->get();
        $data['comments'] = Comment::where('title', $newsId)->orderBy('id', 'DESC')->take(5)->get();
        $data['comment_count'] = Comment::where('title', $newsId)->count();
        return view('news_details', $data);
    }
}
