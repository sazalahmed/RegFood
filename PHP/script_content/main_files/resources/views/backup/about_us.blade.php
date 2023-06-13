@extends('layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('public-content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset($breadcrumb) }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="wsus__breadcrumb_text">
                    <h1>{{__('About Us')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('about-us') }}">{{__('About Us')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->



    <!--=============================
        ABOUT PAGE START
    ==============================-->
    <section class="wsus__about_us mt_120 xs_mt_90">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__about_us_img">
                        <img src="{{ asset($about_us->image) }}" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__section_heading mb_40">
                        <h4>{{ $about_us->short_title }}</h4>
                        <h2>{{ $about_us->long_title }}</h2>
                        <span>
                            <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                        </span>
                    </div>
                    <div class="wsus__about_us_text">
                       {!! clean($about_us->about_us) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__about_video mt_100 xs_mt_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="wsus__about_video_bg" style="background: url({{ url($video_section->background_image) }});">
                <div class="wsus__about_video_overlay">
                    <div class="row">
                        <div class="col-12">
                            <div class="wsus__about_video_text">
                                <p>{{ $video_section->title }}</p>
                                <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                    href="https://youtu.be/{{ $video_section->video_id }}">
                                    <i class=" fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__about_choose mt_95 xs_mt_65">
        <div class="container">
            <div class="wsus__about_choose_bg_area">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-10 wow fadeInUp" data-wow-duration="1s">
                        <div class="wsus__about_choose_img">
                            <span class="img_1">
                                <img src="{{ asset($why_choose_us->background_image) }}" alt="about us" class="img-fluid w-100">
                            </span>
                            <span class="img_2">
                                <img src="{{ asset($why_choose_us->foreground_image_one) }}" alt="about us" class="img-fluid w-100">
                            </span>
                            <span class="img_3">
                                <img src="{{ asset($why_choose_us->foreground_image_two) }}" alt="about us" class="img-fluid w-100">
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                        <div class="wsus__section_heading mt_25 mb_10">
                            <h4>{{ $why_choose_us->short_title }}</h4>
                            <h2>{{ $why_choose_us->long_title }}</h2>
                            <span>
                                <img src="{{ asset('user/images/heading_shapes.png') }}" alt="shapes" class="img-fluid w-100">
                            </span>
                            {!! clean($why_choose_us->description) !!}
                        </div>
                        <div class="wsus__about_choose_text">
                            <ul>
                                @foreach ($why_choose_us->items as $single_item)
                                    <li><span><i class="{{ $single_item->icon }}"></i></span> {{ $single_item->title }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
    <!--=============================
        ABOUT PAGE END
    ==============================-->

@endsection
