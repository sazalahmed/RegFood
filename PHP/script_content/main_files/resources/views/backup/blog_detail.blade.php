@extends('layout')
@section('title')
    <title>{{ $blog->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $blog->seo_description }}">
@endsection

@section('public-content')


    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset($breadcrumb) }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="wsus__breadcrumb_text">
                    <h1>{{__('Blog Details')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('blogs') }}">{{__('Our Blogs')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


        <!--=========================
        BLOG DETAILS START
    ==========================-->
    <section class="wsus__blog_details mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="wsus__blog_det_area">
                        <div class="wsus__blog_details_img wow fadeInUp" data-wow-duration="1s">
                            <img src="{{ asset($blog->image) }}" alt="blog details" class="imf-fluid w-100">
                        </div>
                        <div class="wsus__blog_details_text wow fadeInUp" data-wow-duration="1s">
                            <ul class="details_bloger d-flex flex-wrap">
                                <li><i class="far fa-user"></i> {{__('By Admin')}}</li>
                                <li><i class="far fa-comment-alt-lines"></i> {{ $blog->total_comment }} {{__('Comments')}}</li>
                                <li><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('d M Y') }}</li>
                            </ul>
                            <h2>{{ $blog->title }}</h2>
                            {!! clean($blog->description) !!}

                            <div class="blog_tags_share d-flex flex-wrap justify-content-between align-items-center">
                                <div class="share d-flex flex-wrap align-items-center">
                                    <span>{{__('share')}}:</span>
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('show-blog', $blog->slug) }}&t={{ $blog->title }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('show-blog', $blog->slug) }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('show-blog', $blog->slug) }}&title={{ $blog->title }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.pinterest.com/pin/create/button/?description={{ $blog->title }}&media=&url={{ route('show-blog', $blog->slug) }}"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="blog_det_button mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        @if($prev_blog)
                            <li>
                                <a href="{{ route('show-blog', $prev_blog->slug) }}">
                                    <img src="{{ asset($prev_blog->image) }}" alt="button img" class="img-fluid w-100">
                                    <p>{{ $prev_blog->title }}
                                        <span> <i class="far fa-long-arrow-left"></i> {{__('Previous')}}</span>
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if ($next_blog)
                            <li>
                                <a href="{{ route('show-blog', $next_blog->slug) }}">
                                    <p>{{ $next_blog->title }}
                                        <span>{{__('next')}} <i class="far fa-long-arrow-right"></i></span>
                                    </p>
                                    <img src="{{ asset($next_blog->image) }}" alt="button img" class="img-fluid w-100">
                                </a>
                            </li>
                        @endif
                    </ul>

                    <div class="wsus__comment mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4>{{ $blog->total_comment }} {{__('Comments')}}</h4>
                        @foreach ($active_comments as $active_comment)
                            <div class="wsus__single_comment m-0 border-0">
                                <img src="http://www.gravatar.com/avatar/75d23af433e0cea4c0e45a56dba18b30" alt="review" class="img-fluid">
                                <div class="wsus__single_comm_text">
                                    <h3>{{ $active_comment->name }} <span>{{ $active_comment->created_at->format('d M, Y') }} </span></h3>
                                    <p>{{ $active_comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment_input mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4>{{__('Write a comment')}}</h4>
                        <p>{{__('Your email address will not be published. Required fields are marked')}} *</p>
                        <form id="blogCommentForm">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <label>{{__('name')}} *</label>
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <input type="text" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <label>{{__('Email')}} *</label>
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <input type="email" placeholder="{{__('Email')}}" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <label>{{__('comment')}} *</label>
                                    <div class="wsus__contact_form_input textarea">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <textarea rows="5" placeholder="{{__('Your Comment')}}" name="comment"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                @if($recaptcha_setting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__contact_form_input mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptcha_setting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-xl-12">
                                    <button type="submit" class="common_btn mt_20">{{__('Submit comment')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div id="sticky_sidebar">
                        <div class="wsus__blog_search blog_sidebar m-0 wow fadeInUp" data-wow-duration="1s">
                            <h3>{{__('Search')}}</h3>
                            <form action="{{ route('blogs') }}">
                                <input name="search" type="text" placeholder="{{__('Type your keyword')}}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="wsus__related_blog blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>{{__('Popular Post')}}</h3>
                            <ul>
                                @foreach ($popular_posts as $popular_post)
                                    <li>
                                        <img src="{{ asset($popular_post->image) }}" alt="blog" class="img-fluid w-100">
                                        <div class="text">
                                            <a href="{{ route('show-blog', $popular_post->slug) }}">{{ $popular_post->title }}</a>
                                            <p><i class="far fa-calendar-alt"></i> {{ $popular_post->created_at->format('d M Y') }}</p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="wsus__blog_categori blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="{{ route('blogs', ['category' => $category->slug]) }}">{{ $category->name }} <span>{{ $category->total_blog }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        BLOG DETAILS END
    ==========================-->


    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#blogCommentForm").on('submit', function(e){
                    e.preventDefault();
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 0){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#blogCommentForm').serialize(),
                        url: "{{ route('blog-comment') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message)
                                $("#blogCommentForm").trigger("reset");
                            }
                        },
                        error: function(response) {
                            if(response.responseJSON.errors.name)toastr.error(response.responseJSON.errors.name[0])
                            if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                            if(response.responseJSON.errors.comment)toastr.error(response.responseJSON.errors.comment[0])

                            if(!response.responseJSON.errors.name || !response.responseJSON.errors.email || !response.responseJSON.errors.comment){
                                toastr.error("{{__('Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                })


            });
        })(jQuery);

    </script>

@endsection
