@extends('layout')
@section('title')
    <title>{{__('Terms And Conditions')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('Terms And Conditions')}}">
@endsection

@section('public-content')
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset($breadcrumb) }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="wsus__breadcrumb_text">
                    <h1>{{__('Terms And Conditions')}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                        <li><a href="{{ route('terms-and-condition') }}">{{__('Terms And Conditions')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->

    <!--================================
        PRIVACY POLICY START
    =================================-->
    <section class="wsus__terms_condition mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="wsus__career_det_text">
                        @if ($terms_conditions)
                            {!! clean($terms_conditions->terms_and_condition) !!}
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================================
        PRIVACY POLICY END
    =================================-->
@endsection
