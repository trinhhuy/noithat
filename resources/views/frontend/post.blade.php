@extends('frontend.layouts.app')
@section('content')

    <section class="vacation-bg animated out" data-delay="0" data-animation="fadeInUp" style="background:url({{ url('files/'. $category->banner) }});">
        <div class="container">
            <div class="get-start mrgt6x mrgb6x clearfix">
            </div>
        </div>
    </section>

    <section class="border-top">
        <div class="container">
            <div class="page-title mrgb3x mrgt6x clearfix">
                <h4 class="page-name">{{ $category->name }}</h4>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">

            <div class="col-md-12 blog-singlepost">
                <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                    <div class="blogsingle-img"></div>
                    <div class="blog-text">
                        <div class="blog-quote">
                            <p> {!! $posts->first()['content'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection