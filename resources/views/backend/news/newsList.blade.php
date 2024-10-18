@extends('backend.layouts.master')
@section('dashboard_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{route('news.create')}}" class="btn btn-primary">Add News</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>details</th>
                            <th>author</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($news as $key => $value)
                            <tr>
                                <th>{{$key+1}}</th>
                                <th><img style="width:80px; height: 60px;" src="{{env('STORAGE_PATH')}}/{{$value->thumbnail}} "></th>
                                <th>{{$value->title}}</th>
{{--                                <th class="w-auto">{{substr_replace($value->details, "...", 80)}}</th>--}}
                                <td class="w-auto">{{ Str::limit(strip_tags($value->details), 80, '...') }}</td>

                                <th>{{$value->user_name}}</th>
                                <th>{{$value->created_at}}</th>
                                <th class="d-flex">
                                    <a href="{{route('news.edit', $value->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('news.destroy', $value->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure to delete!')" type="submit" class="btn btn-danger ">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

