@extends('layout')
@section('title')
    <title>{{__('Register')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('Register')}}">
@endsection

@section('public-content')


       <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset($breadcrumb) }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="wsus__breadcrumb_text">
                    <h1>{{__('Register')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('register') }}">{{__('Register')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->

    <!--=========================
        SIGNIN START
    ==========================-->
    <section class="wsus__signin" style="background: url({{ asset($setting->login_page_image) }});">
        <div class="wsus__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="wsus__login_area">
                            <h2>{{__('Registration')}}</h2>
                            <p>{{__('Do not have an account ? please fill up the form below')}}</p>
                            <form action="{{ route('store-register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <label>{{__('Name')}}</label>
                                            <input type="text" name="name" placeholder="{{__('Name')}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <label>{{__('Email')}}</label>
                                            <input type="email" name="email" placeholder="{{__('Email')}}">
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <label>{{__('Password')}}</label>
                                            <input type="password" name="password" placeholder="{{__('Password')}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <label>{{__('Confirm Password')}}</label>
                                            <input type="password" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                                        </div>
                                    </div>

                                    @if($recaptcha_setting->status==1)
                                        <div class="col-xl-12 mb-3">
                                            <div class="g-recaptcha" data-sitekey="{{ $recaptcha_setting->site_key }}"></div>
                                        </div>
                                    @endif

                                    <div class="col-xl-12">
                                        <div class="wsus__login_imput">
                                            <button type="submit" class="common_btn">{{__('Register')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p class="create_account">{{__('Already have an account ?')}} <a href="{{ route('login') }}">{{__('Login here')}}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGNIN END
    ==========================-->

@endsection
