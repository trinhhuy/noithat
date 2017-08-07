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
            <div class="col-md-12 blog-rightbar">
                @foreach($posts as $post)
                <div class="blog-section mrgb9x clearfix col-md-4 col-sm-4 animated out" data-delay="0" data-animation="fadeInUp" style="margin-top: 15px;">
                    <div class="blogsingle-img " style="height: 200px;">
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
                        {{--<span>{{ $post->updated_at }}</span>--}}
                        <a href="{{ url($category->slug .'/'. $post->slug) }}" class=""><h4>{{ $post->name }}</h4></a>
                        <p>{!! $post->desc !!}</p>
                        <a href="{{ url($category->slug .'/'. $post->slug) }}" class=""><i class="fa fa-angle-right"></i> Chi tiết</a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="numbering mrgb5x">
                @include('pagination.default', ['paginator' => $posts])
            </div>



        </div>
    </div>
@endsection

