<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ __('msg.GetNtouch') }}</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Podumshahar, Shaghata, Gaibandha</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>01734-041004</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>morshedmohon4@gmail.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">{{ __('msg.follow') }}</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://github.com/mohonsarker40" target="_blank"><i class="fab fa-github"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.linkedin.com/in/mohonsarker40/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/mohonsarker4/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="https://www.youtube.com/@mohonsarker40" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>


{{--        footer popular news--}}
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ __('msg.popularNews') }}</h5>
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
            <div class="">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>
                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">Lorem ipsum dolor sit amet elit. Proin vitae porta diam...</a>
            </div>
        </div>


{{--        footer category--}}
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ __('msg.footCat') }}</h5>
            <div class="m-n1">

                @foreach($categories as $category)
                    <a href="{{route('wb.cat', $category->id)}}" class="btn btn-sm btn-secondary m-1">
                        {{ __('msg.category.' . strtolower($category->category_name)) }}</a>
                    @endforeach
            </div>
        </div>

{{--        footer flickr images--}}
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">{{ __('msg.flickrImg') }}</h5>
            <div class="row">

                @foreach($flickrs as $flickr)
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="{{env('STORAGE_PATH')}}/{{$flickr->thumbnail}}" alt=""></a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Rangpur News</a>. All Rights Reserved.

        Design by <a href="https://mohonsarker40.github.io/">Mohon Sarker</a></p>
</div>
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>