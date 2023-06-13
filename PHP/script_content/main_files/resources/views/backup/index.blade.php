@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('public-content')

    <!--=============================
        BANNER START
    ==============================-->
    <section class="wsus__banner" style="background: url({{ asset($slider->slider_background) }});">
        <div class="wsus__banner_overlay">
            <span class="banner_shape_1">
                <img src="{{ asset($slider->foreground_image_one) }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{ asset($slider->foreground_image_two) }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="row banner_slider">
                @foreach ($slider->sliders as $slider_item)
                    <div class="col-12">
                        <div class="wsus__banner_slider">
                            <div class=" container">
                                <div class="row">
                                    <div class="col-xl-5 col-md-5 col-lg-5">
                                        <div class="wsus__banner_img wow fadeInLeft" data-wow-duration="1s">
                                            <div class="img">
                                                <img src="{{ asset($slider_item->image) }}" alt="food item" class="img-fluid w-100">
                                                <span style="background: url({{ asset('user/images/offer_shapes.png') }});">
                                                    {{ $slider_item->offer_text }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-5 col-md-7 col-lg-6">
                                        <div class="wsus__banner_text wow fadeInRight" data-wow-duration="1s">
                                            <h1>{{ $slider_item->title_one }}</h1>
                                            <h3>{{ $slider_item->title_two }}</h3>
                                            <p>{{ $slider_item->description }}</p>
                                            <ul class="d-flex flex-wrap">
                                                <li><a class="common_btn" href="{{ $slider_item->link }}">{{__('Shop now')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--=============================
        BANNER END
    ==============================-->


    <!--=============================
        WHY CHOOSE START
    ==============================-->
    @if($service->status)
    <section class="wsus__why_choose">
        <div class="container">
            <div class="row">
                @foreach ($service->services as $service_item)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="wsus__choose_single d-flex flex-wrap align-items-center justify-content-between">
                            <div class="icon icon_1">
                                <i class="{{ $service_item->icon }}"></i>
                            </div>
                            <div class="text">
                                <h3>{{ $service_item->title }}</h3>
                                <p>{{ $service_item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!--=============================
        WHY CHOOSE END
    ==============================-->


    <!--=============================
        OFFER ITEM START
    ==============================-->
    @if ($today_special_product->status)
        <section class="wsus__offer_item mt_95 xs_mt_65">
            <span class="banner_shape_3">
                <img src="{{ asset($today_special_product->image) }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                        <div class="wsus__section_heading mb_50">
                            <h4>{{ $today_special_product->short_title }}</h4>
                            <h2>{{ $today_special_product->long_title }}</h2>
                            <span>
                                <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                            </span>
                            <p>{{ $today_special_product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row offer_item_slider wow fadeInUp" data-wow-duration="1s">
                    @foreach ($today_special_product->products as $product)
                        <div class="col-xl-4">
                            <div class="wsus__offer_item_single" style="background: url({{ asset($product->thumb_image) }});">

                                @if ($product->is_offer)
                                <span>{{ $product->offer }}% off</span>
                                @endif

                                <a class="title" href="{{ route('show-product', $product->slug) }}">{{ $product->name }}</a>
                                <p>{{ $product->short_description }}</p>
                                <ul class="d-flex flex-wrap">
                                    <li><a href="javascript:;" onclick="load_product_model({{ $product->id }})"><i
                                                class="fas fa-shopping-basket"></i></a></li>

                                    @auth('web')
                                    <li><a href="javascript:;" onclick="add_to_wishlist({{ $product->id }})"><i class="fal fa-heart"></i></a></li>
                                    @else
                                    <li><a href="javascript:;" onclick="before_auth_wishlist({{ $product->id }})"><i class="fal fa-heart"></i></a></li>
                                    @endauth


                                    <li><a href="{{ route('show-product', $product->slug) }}"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <!--=============================
        MENU ITEM START
    ==============================-->
    @if ($menu_section->status)
        <section class="wsus__menu mt_95 xs_mt_65">
            <span class="banner_shape_1">
                <img src="{{ asset($menu_section->left_image) }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{ asset($menu_section->right_image) }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="container">

                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                        <div class="wsus__section_heading mb_45">
                            <h4>{{ $menu_section->short_title }}</h4>
                            <h2>{{ $menu_section->long_title }}</h2>
                            <span>
                                <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                            </span>
                            <p>{{ $menu_section->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-12">
                        <div class="menu_filter d-flex flex-wrap justify-content-center">
                            @foreach ($menu_section->categories as $index => $menu_category )
                                <button class="{{ $index == 0 ? 'first_menu_product' : '' }}" data-filter=".category_{{ $menu_category->id }}">{{ $menu_category->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row grid">
                    @foreach ($menu_section->products as $index => $menu_product )
                        <div class="col-xl-3 col-sm-6 col-lg-4 category_{{ $menu_product->category_id }} wow fadeInUp " data-wow-duration="1s">
                            <div class="wsus__menu_item">
                                <div class="wsus__menu_item_img">
                                    <img src="{{ asset($menu_product->thumb_image) }}" alt="menu" class="img-fluid w-100">
                                    <a class="category" href="#">{{ $menu_product->category->name }}</a>
                                </div>
                                <div class="wsus__menu_item_text">
                                    <p class="rating">
                                        @php
                                            if ($menu_product->total_review > 0) {
                                                $average = $menu_product->average_rating;

                                                $int_average = intval($average);

                                                $next_value = $int_average + 1;
                                                $review_point = $int_average;
                                                $half_review=false;
                                                if($int_average < $average && $average < $next_value){
                                                    $review_point= $int_average + 0.5;
                                                    $half_review=true;
                                                }
                                            }
                                        @endphp

                                        @if ($menu_product->total_review > 0)
                                            @for ($i = 1; $i <=5; $i++)
                                                @if ($i <= $review_point)
                                                    <i class="fas fa-star"></i>
                                                @elseif ($i> $review_point )
                                                    @if ($half_review==true)
                                                        <i class="fas fa-star-half-alt"></i>
                                                        @php
                                                            $half_review=false
                                                        @endphp
                                                    @else
                                                    <i class="far fa-star"></i>
                                                    @endif
                                                @endif
                                            @endfor
                                        @else
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @endif
                                        <span>{{ $menu_product->total_review }}</span>
                                    </p>
                                    <a class="title" href="{{ route('show-product', $menu_product->slug) }}">{{ $menu_product->name }}</a>

                                    @if ($menu_product->is_offer)
                                        <h5 class="price">{{ $currency_icon }}{{ $menu_product->offer_price }} <del>{{ $currency_icon }}{{ $menu_product->price  }}</del> </h5>
                                    @else
                                        <h5 class="price">{{ $currency_icon }}{{ $menu_product->price }}</h5>
                                    @endif

                                    <ul class="d-flex flex-wrap justify-content-center">
                                        <li><a href="javascript:;" onclick="load_product_model({{ $menu_product->id }})"><i
                                                    class="fas fa-shopping-basket"></i></a></li>


                                        @auth('web')
                                        <li><a href="javascript:;" onclick="add_to_wishlist({{ $menu_product->id }})"><i class="fal fa-heart"></i></a></li>
                                        @else
                                        <li><a href="javascript:;" onclick="before_auth_wishlist({{ $menu_product->id }})"><i class="fal fa-heart"></i></a></li>
                                        @endauth

                                        <li><a href="{{ route('show-product', $menu_product->slug) }}"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!--=============================
        MENU ITEM END
    ==============================-->


    <!--=============================
        ADD SLIDER START
    ==============================-->
    @if ($advertisement->status)
        <section class="wsus__add_slider mt_100 xs_mt_70">
            <div class="container">
                <div class="row add_slider wow fadeInUp" data-wow-duration="1s">
                    @foreach ($advertisement->banners as $ad_banner)
                        <div class="col-xl-4">
                            <a href="{{ $ad_banner->link }}" class="wsus__add_slider_single" style="background: url({{ url($ad_banner->image) }});">
                                <div class="text">
                                    <h3>{{ $ad_banner->title }}</h3>
                                    <p>{{ $ad_banner->description }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        ADD SLIDER END
    ==============================-->


    <!--=============================
        TEAM START
    ==============================-->
    @if ($our_chef->status)
        <section class="wsus__team pt_95 xs_pt_65 pb_150 xs_pb_120" style="background: url({{ asset('user/images/chefs_bg.jpg') }});">
            <span class="banner_shape_1">
                <img src="{{ asset($our_chef->left_image) }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{ asset($our_chef->right_image) }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                        <div class="wsus__section_heading mb_25">
                            <h4>{{ $our_chef->short_title }}</h4>
                            <h2>{{ $our_chef->long_title }}</h2>
                            <span>
                                <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                            </span>
                            <p>{{ $our_chef->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="row team_slider">
                    @foreach ($our_chef->chefs as $index => $single_chef )
                        <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="wsus__single_team">
                                <div class="wsus__single_team_img">
                                    <img src="{{ asset($single_chef->image) }}" alt="team" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_team_text">
                                    <h4>{{ $single_chef->name }}</h4>
                                    <p>{{ $single_chef->designation }}</p>
                                    <ul class="d-flex flex-wrap justify-content-center">
                                        @if ($single_chef->facebook)
                                            <li><a href="{{ $single_chef->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif

                                        @if ($single_chef->linkedin)
                                            <li><a href="{{ $single_chef->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif

                                        @if ($single_chef->twitter)
                                            <li><a href="{{ $single_chef->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif

                                        @if ($single_chef->instagram)
                                            <li><a href="{{ $single_chef->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        TEAM END
    ==============================-->


    <!--=============================
        DOWNLOAD APP START
    ==============================-->

    @if ($app_section->status)
        <section class="wsus__download mt_100 xs_mt_70">
            <div class="container">
                <div class="wsus__download_bg" style="background: url({{ asset($app_section->home1_background) }});">
                    <div class="wsus__download_overlay">
                        <div class="row justify-content-between">
                            <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__download_text">
                                    <div class="wsus__section_heading mb_25">
                                        <h2>{{ $app_section->title }}</h2>
                                        <p>{{ $app_section->description }}</p>
                                    </div>
                                    <ul class="d-flex flex-wrap">
                                        <li>
                                            <a href="{{ $app_section->play_store_link }}">
                                                <i class="fab fa-google-play"></i>
                                                <p> <span>{{__('download from')}}</span> {{__('google play')}} </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $app_section->app_store_link }}">
                                                <i class="fab fa-apple"></i>
                                                <p> <span>{{__('download from')}}</span> {{__('apple store')}} </p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__download_img">
                                    <img src="{{ asset($app_section->image) }}" alt="download" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        DOWNLOAD APP END
    ==============================-->


    <!--=============================
        COUNTER START
    ==============================-->
    @if ($counter->status)
        <section class="wsus__counter mt_100 xs_mt_70" style="background: url({{ asset($counter->background_image) }});">
            <div class="wsus__counter_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
                <div class="container">
                    <div class="row">
                        @foreach ($counter->counters as $index => $single_counter )
                            <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__single_counter">
                                    <i class="{{ $single_counter->icon }}"></i>
                                    <div class="text">
                                        <h2 class="counter">{{ $single_counter->quantity }}</h2>
                                        <p>{{ $single_counter->title }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        COUNTER END
    ==============================-->


    <!--=============================
       TESTIMONIAL  START
    ==============================-->
    @if ($testimonial->status)
        <section class="wsus__testimonial pt_90 xs_pt_60 mb_150 xs_mb_120">
            <div class="container">

                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                        <div class="wsus__section_heading mb_40">
                            <h4>{{ $testimonial->short_title }}</h4>
                            <h2>{{ $testimonial->long_title }}</h2>
                            <span>
                                <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                            </span>
                            <p>{{ $testimonial->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="row testi_slider">
                    @foreach ($testimonial->testimonials as $index => $single_testimonial)
                        <div class="col-xl-4 wow fadeInUp" data-wow-duration="1s">
                            <div class="wsus__single_testimonial">
                                <div class="wsus__testimonial_header d-flex flex-wrap align-items-center">
                                    <div class="img">
                                        <img src="{{ asset($single_testimonial->image) }}" alt="clients" class="img-fluid w-100">
                                    </div>
                                    <div class="text">
                                        <h4>{{ $single_testimonial->name }}</h4>
                                        <p>{{ $single_testimonial->designation }}</p>
                                    </div>
                                </div>
                                <div class="wsus__single_testimonial_body">
                                    <p class="feedback">{{ $single_testimonial->comment }}</p>
                                    <span class="rating">
                                        @for ($i = 1; $i <=5 ; $i++)
                                            @if ($i <= $single_testimonial->rating )
                                            <i class="fas fa-star"></i>
                                            @else
                                            <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                </div>
                                <div class="wsus__testimonial_product">
                                    <img src="{{ asset($single_testimonial->product_image) }}" alt="product" class="img-fluid w-100">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        TESTIMONIAL END
    ==============================-->

    <!--=============================
        BLOG START
    ==============================-->

    @if ($blog->status)
        <section class="wsus__blog" style="background: url({{ asset($blog->home1_background) }});">
            <div class="wsus__blog_overlay pt_95 xs_pt_65 pb_100 xs_pb_70">
                <div class="container">

                    <div class="row wow fadeInUp" data-wow-duration="1s">
                        <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                            <div class="wsus__section_heading mb_25">
                                <h4>{{ $blog->short_title }}</h4>
                                <h2>{{ $blog->long_title }}</h2>
                                <span>
                                    <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                                </span>
                                <p>{{ $blog->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($blog->blogs as $index => $single_blog)
                            <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                                <div class="wsus__single_blog">
                                    <a href="{{ route('show-blog', $single_blog->slug) }}" class="wsus__single_blog_img">
                                        <img src="{{ asset($single_blog->image) }}" alt="blog" class="img-fluid w-100">
                                    </a>
                                    <div class="wsus__single_blog_text">
                                        <a class="category" href="{{ route('blogs', ['category' => $single_blog->category->slug ]) }}">{{ $single_blog->category->name }}</a>
                                        <ul class="d-flex flex-wrap mt_15">
                                            <li><i class="fas fa-user"></i>{{__('by admin')}}</li>
                                            <li><i class="fas fa-calendar-alt"></i> {{ $single_blog->created_at->format('d M Y') }}</li>
                                            <li><i class="fas fa-comments"></i> {{ $single_blog->total_comment }}{{__('comment')}}</li>
                                        </ul>
                                        <a class="title" href="{{ route('show-blog', $single_blog->slug) }}">{{ $single_blog->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--=============================
        BLOG END
    ==============================-->

@endsection
