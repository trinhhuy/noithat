@extends('frontend.layouts.app')
@section('content')
    <section class="border-top">
        <div class="container">
            <div class="page-title mrgb3x mrgt6x clearfix">
                <h4 class="page-name">{{ $category->name }}</h4>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-rightbar">
                @foreach($posts as $post)
                <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                    <div class="blogsingle-img"><a href="images/blog-img1.jpg"><img src="{{ url('files/'. json_decode($post->images)[0])  }}" class="img-responsive" alt="#" /></a><a href="images/blog-img2.jpg"></a><a href="images/blog-img3.jpg"></a></div>
                    <div class="blog-text"> <span>{{ $post->updated_at }}</span>
                        <h4>{{ $post->name }}</h4>
                        <p>{!! $post->content !!}</p>
                        <div class="read-btn"> <a href="{{ url($category->slug .'/'. $post->slug) }}" class="read-more">Chi tiết</a> </div>
                    </div>
                </div>
                @endforeach
                <div class="numbering mrgb5x">
                    @include('pagination.default', ['paginator' => $posts])
                </div>
            </div>
        </div>
    </div>
@endsection