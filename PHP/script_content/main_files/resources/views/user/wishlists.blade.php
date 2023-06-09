@extends('layout')
@section('title')
    <title>{{__('Wishlist')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('Wishlist')}}">
@endsection

@section('public-content')


    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="tf__breadcrumb" style="background: url({{ asset($breadcrumb) }});">
        <div class="tf__breadcrumb_overlay">
            <div class="container">
                <div class="tf__breadcrumb_text">
                    <h1>{{__('Wishlist')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('user.Home')}}</a></li>
                        <li><a href="javascript:;">{{__('Wishlist')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


        <!--=========================
        DASHBOARD START
    ==========================-->
    <section class="tf__dashboard mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="tf__dashboard_area">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__dashboard_menu">
                            <div class="dasboard_header">
                                <div class="dasboard_header_img">

                                    @if ($personal_info->image)

                                    <img id="preview-user-avatar" src="{{ asset($personal_info->image) }}" alt="user" class="img-fluid w-100">
                                    @else
                                    <img id="preview-user-avatar" src="{{ asset($default_user_avatar) }}" alt="user" class="img-fluid w-100">
                                    @endif

                                    <label for="upload"><i class="far fa-camera"></i></label>
                                    <form id="upload_user_avatar_form" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input type="file" name="image" id="upload" hidden onchange="previewThumnailImage(event)">
                                    </form>
                                </div>
                                <h2>{{ html_decode($personal_info->name) }}</h2>
                            </div>

                            @include('user.sidebar')

                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="tf__dashboard_content">
                            <div class="tf_dashboard_body dashboard_review">
                                <h3>{{__('Wishlist')}}</h3>
                                <div class="tf__dashoard_wishlist">
                                    <div class="row">

                                        @foreach ($products as $product)
                                            <div class="col-xxl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                                                <div class="tf__menu_item">
                                                    <div class="tf__menu_item_img">
                                                        <img src="{{ asset($product->thumb_image) }}" alt="menu" class="img-fluid w-100">
                                                    </div>
                                                    <div class="tf__menu_item_text">
                                                        <a class="category" href="{{ route('products',['category' => $product->category->slug]) }}">{{ $product->category->name }}</a>
                                                        <a class="title" href="{{ route('show-product', $product->slug) }}">{{ $product->name }}</a>
                                                        @php
                                                            if ($product->total_review > 0) {
                                                                $average = $product->average_rating;

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
                                                        <p class="rating">
                                                            @if ($product->total_review > 0)
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
                                                            <span>({{ $product->total_review }})</span>
                                                        </p>
                                                        @if ($product->is_offer)
                                                                <h5 class="price">{{ $currency_icon }}{{ $product->offer_price }} <del>{{ $currency_icon }}{{ $product->price  }}</del> </h5>
                                                            @else
                                                                <h5 class="price">{{ $currency_icon }}{{ $product->price }}</h5>
                                                            @endif

                                                        <a class="tf__add_to_cart" href="javascript:;" onclick="load_product_model({{ $product->id }})">{{__('add to cart')}}</a>
                                                        <ul class="d-flex flex-wrap justify-content-end">

                                                            @auth('web')
                                                                <li><a href="javascript:;" onclick="add_to_wishlist({{ $product->id }})"><i class="fal fa-heart"></i></a></li>
                                                                @else
                                                                <li><a href="javascript:;" onclick="before_auth_wishlist({{ $product->id }})"><i class="fal fa-heart"></i></a></li>
                                                                @endauth

                                                            <li><a href="{{ route('show-product', $product->slug) }}"><i class="far fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
