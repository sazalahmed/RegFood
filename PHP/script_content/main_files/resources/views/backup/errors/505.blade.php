@php
    $error_404=App\Models\ErrorPage::find(1);
@endphp
@extends('layout')
@section('title')
    <title>{{ $error_404->page_name }}</title>
@endsection
@section('public-content')


 <!--=============================
        404 PAGE START
    ==============================-->
    <section class="wsus__404">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-7 m-auto">
                    <div class="wsus__404_text wow fadeInUp" data-wow-duration="1s">
                        <img src="{{ asset($error_404->image) }}" alt="404" class="img-fluid w-100">
                        <h2>{{ $error_404->header }}</h2>
                        <p>{{ $error_404->description }}</p>
                        <a class="common_btn" href="{{ route('home') }}">{{__('home')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        404 PAGE END
    ==============================-->
@endsection



