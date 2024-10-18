<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function League\Flysystem\path;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $data['news'] = News::join('users', 'news.created_by', '=', 'users.id')->select('news.*', 'users.name as user_name')->get();
        return view('backend.news.newsList', $data);
    }

    public function create()
    {
        $data['categories'] = Category::where('status', 1)->get();
        return view('backend.news.newsCreate', $data);
    }


    public function store(Request $request)
    {
       $this->validate($request, [
           'title' => 'required',
           'details' => 'required',
           'category_id' => 'required',
           'thumbnail'=>'required',
       ]);

        $imageName = '';
        if ($image = $request->file('thumbnail')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(storage_path('uploads'), $imageName);
        }

       $input = $request->except('_token');

       $news=new News();
       $news->fill($input);

       $news->date = date('Y-m-d');
       $news->created_by = auth()->user()->id;
       $news->thumbnail = $imageName;
       $news->view_count = 0;
       $news->save();


       Session::flash('Success', 'Succesfully Created');
       return redirect()->back();

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $news = News::where('id', $id)->first();
        $item = Category::where('status',1)->get();
        return view('backend.news.newsEdit',[
            'news' => $news,
            'item' => $item
        ]);

    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'details' => 'sometimes',
        ]);
        $id = request()->input('id');

        $news = News::where('id', $id)->first();
        if ($news){

            $imageName = null;
            if ($image = $request->file('thumbnail')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(storage_path('uploads'), $imageName);
            }

            $news->title = $request->input('title');
            $news->category_id = $request->input('category_id');
            $news->details = $request->input('details');

            $news->thumbnail = $imageName ?? $news-> thumbnail;
            $news->save();

            Session::flash('success', 'Successfully Updated');

            return redirect()->back();
        }

        Session::flash('success', 'Data not found');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $news = News::where('id', $id)->first();
        if ($news){
            $news->delete();

            Session::flash('success', 'Successfully Delete');
            return redirect()->back();

        } else {
            Session::flash('error', 'Data not Found');
        }

        return redirect()->back();
    }
}
