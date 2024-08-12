


@extends('frontend.master')
@section('content')
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
{{--                                <h4 class="m-0 text-uppercase font-weight-bold">Category: {{@$category->category_name}}</h4>--}}
                                <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ __('msg.category.' . strtolower($category->category_name)) }}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>

                        @forelse($news as $new)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{env('STORAGE_PATH')}}/{{$new->thumbnail}}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{@$new->category->category_name}}</a>
                                            <a class="text-body" href=""><small>{{date('M d, Y', strtotime($new->date))}}</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $new->id)}}">{{substr($new->title, 0, 20). '...'}}</a>
                                        <p class="m-0">{{ Str::limit(strip_tags($new->details), 20, '...') }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <small>{{@$new->author->name}}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$new->view_count}}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No news available.</p>
                        @endforelse

                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
