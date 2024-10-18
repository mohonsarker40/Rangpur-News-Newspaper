@extends('backend.layouts.master')
@section('dashboard_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News Edit</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{route('news.index')}}" class="btn btn-primary">News List</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('news.update',$news->id)}}">
                    @csrf
                    @method('PUT')

                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>

                    <input type="hidden" name="id" value="{{$news->id}}">

                    <div class="form-group">
                        <label>Category name</label>
                        <select class="form-control" name="category_id">
                            <option>Select</option>

                            @foreach($item as $category)
                                <option value="{{$category->id}}" {{$category->id == $news->category_id ? 'selected':''}} >{{$category->category_name}}</option>
                            @endforeach


                        </select>
                        <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="{{$news->title}}">
                        <span class="text-danger">{{$errors->has('title') ? $errors->first('title') : ''}}</span>
                    </div>
                    <div class="form-group">
                        <label>Details</label>
                        <textarea rows="10" id="mytextarea" class="form-control" name="details">{{$news->details}}</textarea>
                        <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail">
                        <span class="text-danger">{{$errors->has('details') ? $errors->first('details') : ''}}</span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


@section('script')
    <script src="{{asset('backend/plugin/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            menubar:false,
            statusbar: false,
            plugins: "powerpaste advcode searchreplace autolink directionality code visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave",
            toolbar: "undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat | code",
            height: "500px",
        });
    </script>
@endsection
