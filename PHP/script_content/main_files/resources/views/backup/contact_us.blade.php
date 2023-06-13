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
                    <h1>{{__('Contact us')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('contact-us') }}">{{__('Contact us')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


        <!--=============================
        CONTACT PAGE START
    ==============================-->
    <section class="wsus__contact mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__contact_info" style="background: url({{ asset($contact->image) }});">
                        <span><i class="fal fa-phone-alt"></i></span>
                        <h3>{{__('call')}}</h3>
                        <p>{!! nl2br($contact->phone) !!}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__contact_info" style="background: url({{ asset($contact->image) }});">
                        <span><i class="fal fa-envelope"></i></span>
                        <h3>{{__('Email')}}</h3>
                        <p>{!! nl2br($contact->email) !!}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__contact_info" style="background: url({{ asset($contact->image) }});">
                        <span><i class="fas fa-street-view"></i></span>
                        <h3>{{__('Location')}}</h3>
                        <p>{!! nl2br($contact->address) !!}</p>
                    </div>
                </div>
            </div>
            <div class="wsus__contact_form_area mt_100 xs_mt_70">
                <div class="row">
                    <div class="col-xl-7 wow fadeInUp" data-wow-duration="1s">
                        <form class="wsus__contact_form" method="POST" action="{{ route('send-contact-us') }}">
                            <h3>{{__('Feel free to contact us')}}</h3>
                                @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-6">
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <input type="text" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-envelope"></i></span>
                                        <input type="email" name="email"  placeholder="{{__('Email')}}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-phone-alt"></i></span>
                                        <input type="text" name="phone"  placeholder="{{__('Phone')}}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6">
                                    <div class="wsus__contact_form_input">
                                        <span><i class="fal fa-book"></i></span>
                                        <input type="text" placeholder="{{__('Subject')}}" name="subject">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__contact_form_input textarea">
                                        <span><i class="fal fa-book"></i></span>
                                        <textarea rows="5" placeholder="{{__('Message')}}" name="message"></textarea>
                                    </div>

                                </div>
                                @if($recaptcha_setting->status==1)
                                    <div class="col-xl-12">
                                        <div class="wsus__contact_form_input">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptcha_setting->site_key }}"></div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-xl-12">
                                    <button type="submit">{{__('send now')}}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-xl-5 wow fadeInUp" data-wow-duration="1s">
                        <div class="wsus__contact_map">
                                {!! $contact->map !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        CONTACT PAGE END
    ==============================-->

@endsection
