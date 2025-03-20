<!-- Topbar Start -->
<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center  bg-white py-3 px-lg-5">

        <div class="col-lg-4 d-flex align-items-center justify-content-around">
            <a href="{{url('/')}}" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">{{__('msg.rangpur')}}<span
                            class="text-secondary font-weight-normal">{{__('msg.news')}}</span></h1>
            </a>

            {{--      language  dropdown--}}
            <div class="col-md-4 btn bg-warning">
                <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

                </select>
            </div>

        </div>


    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Rangpur<span
                        class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{url('/')}}" class="nav-item nav-link active">{{__('msg.homeMenu')}}</a>
                @foreach($categories as $category)
                    <a href="{{route('wb.cat', $category->id)}}"
                       class="nav-item nav-link">{{ __('msg.category.' . strtolower($category->category_name)) }}</a>
                @endforeach
            </div>


            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                </div>
            </div>

        </div>
    </nav>
</div>
