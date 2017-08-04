@extends('frontend.layouts.app')
@section('content')
    <section class="border-top">
        <div class="container">
            <div class="page-title mrgb3x mrgt6x clearfix">
                <h4 class="page-name">{{ $post->name }}</h4>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">

            <div class="col-md-12 blog-singlepost">
                <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                    <div class="blog-text">
                        {!! $post->content !!}
                    </div>
                    @foreach(json_decode($post->images) as $image)
                        <div class="blogsingle-img"> <img src="{{ url('files/'. $image) }}" class="img-responsive" alt="#" /> </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection