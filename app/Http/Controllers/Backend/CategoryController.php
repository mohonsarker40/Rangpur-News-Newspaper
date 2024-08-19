<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use function Spatie\FlareClient\message;

class CategoryController extends Controller
{
    public function index()
    {
        return view('backend.category.categoryList');
    }

    public function categoriesGetData()
    {
        try {
            $data = Category::get();
            return response()->json(['result' => $data, 'status' => 2000]);
        } catch (Exception $e) {
            return response()->json(['result' => null, 'message'=>$e->getMessage(), 'status' => 3000]);
        }
    }


    public function create()
    {

        $data['categories'] = Category::get();
        return view('backend.category.categoryCreate');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:255',
            'details' => 'sometimes',
        ]);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->details = $request->input('details');
        $category->save();

        Session::flash('success', 'Successfully Inserted');

        return redirect()->back();
    }


    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('backend.category.categoryEdit', compact('category'));
    }


    public function update(Request $request)
    {

        $id = request()->input('id');

        $this->validate($request, [
            'id' => 'required',
            'category_name' => 'required|max:255',
            'details' => 'sometimes',
        ]);

        $category = Category::where('id', $id)->first();

        if ($category) {
            $category->category_name = $request->input('category_name');
            $category->details = $request->input('details');
            $category->update();

            Session::flash('success', 'Successfully Updated');

            return redirect()->back();
        }

        Session::flash('error', 'Data not found');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category) {
            $category->delete();

            Session::flash('success', 'Successfully Delete');

            return redirect()->back();
        }

        Session::flash('success', 'Data not found');

        return redirect()->back();
    }
}