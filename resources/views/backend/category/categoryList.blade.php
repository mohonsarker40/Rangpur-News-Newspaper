@extends('backend.layouts.master')
@section('dashboard_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
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
                            <th>Category Name</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($categories as $key => $value)
                            <tr>
                                <th>{{$key+1}}</th>
                                <th>{{$value->category_name}}</th>
                                <th>{{$value->details}}</th>
                                <th>
                                    <a href="{{ route('category.edit', $value->id) }}"
                                       class="btn btn-primary me-3">edit</a>

                                    <form action="{{ route('category.destroy', $value->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
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
