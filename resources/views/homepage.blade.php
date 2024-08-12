@extends('frontend.master')
@section('content')



    <div class="container-fluid">
        <div class="row">

            {{--            slider home--}}
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach($slides as $slide)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="{{env('STORAGE_PATH')}}/{{$slide->thumbnail}}"
                                 style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                       href="{{route('wb.cat', @$slide->category->id)}}">{{@$slide->category->category_name}}</a>
                                    <a class="text-white" href="">{{date('M d, Y', strtotime($slide->date))}}</a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                   href="{{route('wb.cat', @$slide->category->id)}}">{{$slide->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{--            news section--}}
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach($news as $new)
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="{{env('STORAGE_PATH')}}/{{$new->thumbnail}}"
                                     style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                           href="{{route('wb.cat', @$new->category->id)}}">{{@$new->category->category_name}}</a>
                                        <a class="text-white" href="">
                                            <small>{{date('M d, Y', strtotime($new->date))}}</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                       href="{{route('wb.cat', @$new->category->id)}}">{{$new->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>



    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">
                            {{(__('msg.breakingNewsT'))}}
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                             style="width: calc(100% - 170px); padding-right: 90px;">

                            @foreach($breakingNews as $breakingNew)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold"
                                       href="{{route('wb.cat', @$breakingNew->category->id)}}">{{$breakingNew->title}}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.featuredNewsT'))}}</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">

                {{--          single featured News --}}
                @foreach($featuredSlides as $featuredSlide)
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="{{env('STORAGE_PATH')}}/{{$featuredSlide->thumbnail}}"
                             style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="{{route('wb.cat', @$featuredSlide->category->id)}}">{{$featuredSlide->category->category_name}}</a>
                                <a class="text-white" href="">
                                    <small>{{date('M d, Y', strtotime($featuredSlide->date))}}</small>
                                </a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                               href="{{route('wb.cat', @$featuredSlide->category->id)}}">{{$featuredSlide->title}}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Featured News Slider End -->


    <!--Latest News -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.latestNewsT'))}}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>


                        {{--                    single latest news--}}
                        @foreach($latestNews as $latestNew)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{env('STORAGE_PATH')}}/{{$latestNew->thumbnail}}"
                                         style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                               href="{{route('wb.cat', @$latestNew->category->id)}}">{{$latestNew->category->category_name}}</a>

                                            <a class="text-body" href="">
                                                <small>{{date ('M, d, Y', strtotime($latestNew->date))}}</small>
                                            </a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                           href="{{route('wb.news', @$latestNew->id)}}">{{substr($latestNew->title, 0, 10). '...'}}</a>

                                        <p class="m-0">{{ Str::limit(strip_tags($new->details), 30, '...') }}</p>

                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{asset('frontend/img/user.jpg')}}" width="25" height="25" alt="">
                                            <small>{{@$latestNew->author->name}}</small>


                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small>{{$latestNew->view_count}}</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $latestNews->links('pagination::bootstrap-5') }}
                    </div>
                </div>


                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.sharePostT'))}}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <a href="#" id="share-facebook" class="d-block w-100 text-white text-decoration-none mb-3"
                               style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3"
                                   style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="#" id="share-linkedin" class="d-block w-100 text-white text-decoration-none mb-3"
                               style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3"
                                   style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="#" id="share-instagram" class="d-block w-100 text-white text-decoration-none mb-3"
                               style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3"
                                   style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="#" id="share-youtube" class="d-block w-100 text-white text-decoration-none mb-3"
                               style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3"
                                   style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.asideAdT'))}}</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href=""><img class="img-fluid" src="{{asset('frontend/img/news-800x500-2.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.asideTrendingNewsT'))}}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{asset('frontend/img/news-110x110-1.jpg')}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                           href="">Business</a>
                                        <a class="text-body" href="">
                                            <small>Jan 01, 2045</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum
                                        dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{asset('frontend/img/news-110x110-1.jpg')}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                           href="">Business</a>
                                        <a class="text-body" href="">
                                            <small>Jan 01, 2045</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum
                                        dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{asset('frontend/img/news-110x110-1.jpg')}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                           href="">Business</a>
                                        <a class="text-body" href="">
                                            <small>Jan 01, 2045</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum
                                        dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{asset('frontend/img/news-110x110-1.jpg')}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                           href="">Business</a>
                                        <a class="text-body" href="">
                                            <small>Jan 01, 2045</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum
                                        dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="{{asset('frontend/img/news-110x110-1.jpg')}}" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                           href="">Business</a>
                                        <a class="text-body" href="">
                                            <small>Jan 01, 2045</small>
                                        </a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum
                                        dolor sit amet elit...</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.asideNewsletterT'))}}</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{(__('msg.asideNewsletterT'))}}</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>


    </div>
    <!-- News With Sidebar End -->










@endsection
