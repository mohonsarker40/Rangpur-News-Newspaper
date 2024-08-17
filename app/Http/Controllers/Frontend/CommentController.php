<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Helpers\Support;

class CommentController extends Controller
{
    use Support;

    public function index()
    {
        $data['url'] = \request()->input('url');
//        return response()->json(['message' => 'Comment created successfully', 'status' => 2000], 200);
        return view('auth.visitor_login', $data);
    }

    public function create()
    {
        $data['url'] = request()->input('url');
        return view('auth.visitor_registration', $data);
    }

    public function store(Request $request)
    {
        $comments = new Comment();
        $comments->visitor_id = auth()->guard('visitor')->user()->id;
        $comments->title = $request->input('title');
        $comments->comment = $request->input('message');
        $comments->save();

        return response()->json(['message' => 'message created', 'status' => 2000], 200);
    }

    public function commentList()
    {
        return view('backend.commentList');
    }

    public function getComments()
    {

        $data = Comment::with('visitor:id,name')->get();
        return response()->json(['result' => $data, 'status' => 2000]);

    }

    public function commentDelete()
    {
        try{
            $id = \request()->input('id');

            $comment = Comment::where('id', $id)->first();
            if($comment){
                $comment->delete();
                return retData(null, 'Successfully deleted');
            }

        }catch (\Exception $exception){
            return retData($exception->getMessage(), 'Something Wrong', 5000);
        }
    }

}
