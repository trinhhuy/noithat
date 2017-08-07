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
            <?php $url_current = url()->current();?>
            @if(strpos($url_current, 'gioi-thieu') == true )
                <div class="col-md-12 blog-singlepost">
                    <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                        @if(count(json_decode($post->images)) > 0)
                            @foreach(json_decode($post->images) as $image)
                                <div class="blogsingle-img"> <img src="{{ url('files/'. $image) }}" class="img-responsive" alt="#" /> </div>
                            @endforeach
                        @else
                            <div class="blog-text"> {!! $post->content !!} </div>
                        @endif
                    </div>
                </div>
                @else
                    <div class="col-md-9 blog-singlepost">
                        <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                            @if(count(json_decode($post->images)) > 0)
                                @foreach(json_decode($post->images) as $image)
                                    <div class="blogsingle-img"> <img src="{{ url('files/'. $image) }}" class="img-responsive" alt="#" /> </div>
                                @endforeach
                            @else
                                <div class="blog-text"> {!! $post->content !!} </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="right-side-bar">
                            <div class="blog-post mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
                                @foreach($category->posts as $post)
                                    <div class="post-area">
                                        <a href="{{ url($category->slug .'/'. $post->slug) }}"><div class="property-image">
                                                <img src="{{ url('files/'. json_decode($post->images)[0])  }}" class="img-responsive" alt="#"  width="100%" style="height: 200px"/></div>
                                        </a>
                                        <a href="{{ url($category->slug .'/'. $post->slug) }}"><h4>{{ $post->name }}</h4></a>
                                        <span class="best-place">{{ \Carbon\Carbon::parse($post->updated_at)->format('m-d-Y') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection

