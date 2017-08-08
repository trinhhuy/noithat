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
            <div class="col-md-9 blog-rightbar">
                @foreach($posts as $post)
                <div class="blog-section mrgb9x clearfix animated out" data-delay="0" data-animation="fadeInUp">
                    <div class="blogsingle-img">
                        @foreach(json_decode($post->images) as $key => $image)
                            @if($key == 0)
                                <a href="{{ url('files/'. $image)  }}"><div class="property-image">
                                        <img src="{{ url('files/'. $image)  }}" class="img-responsive" alt="#"  width="100%" style="height: 200px"/></div>
                                </a>
                            @else
                                <a href="{{ url('files/'. $image)  }}" width="100%"></a>
                            @endif
                        @endforeach
                    </div>
                    <div class="blog-text">
                        <a href="{{ url($category->slug .'/'. $post->slug) }}" class=""><h4>{{ $post->name }}</h4></a>
                    </div>
                </div>
                @endforeach

                    <div class="numbering mrgb5x">
                        @include('pagination.default', ['paginator' => $posts])
                    </div>
            </div>

            <div class="col-md-3">
                <div class="right-side-bar">
                    <div class="blog-post mrgt6x animated out" data-delay="0" data-animation="fadeInUp">
                        @foreach($cost->posts as $post)
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
        </div>
    </div>
@endsection

