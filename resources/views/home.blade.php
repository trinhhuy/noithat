@extends('frontend.layouts.app')
@section('content')
    <div id="mainslider">
        <div class="slider">
            <div class="fullscreen-container">
                <div class="fullscreenbanner">
                    <ul>
                        @foreach($slides as $slide)
                        <li data-transition="slide" data-slotamount="10"> <img class="img-responsive" alt="" src="{{ url('files/'. $slide->image) }}"/>
                            <div class="caption sfb"
                                 data-x="center"
                                 data-y="center"
                                 data-speed="1000"
                                 data-start="1000"
                                 data-easing="easeOutExpo">
                                <div class="slider-text clearfix">
                                    <div class="text-box">
                                        <h2>{{ $slide->title }}</h2>
                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="featured-properties animated out" data-delay="0" data-animation="fadeInUp">
                <div class="section-heading mrgt7x mrgb7x">
                    <h3><span>Các dự án tiêu biểu của chúng tôi</span></h3>
                </div>
                <div class="properties-listing animated out" data-delay="0" data-animation="fadeInUp">
                    <ul class="listing-name mrgb5x">
                        <li class="filter active" data-filter="all"><a href="javascript:;">Tất cả</a></li>
                        @foreach($representativeCategories as $category)
                            <li class="filter" data-filter="{{ $category->slug }}"><a href="javascript:;">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                    <ul class="filter-list">
                        @foreach($posts as $post)
                            <li class="mix {{ $post['category'] }} col-md-4 col-sm-4 animated out" data-delay="0" data-animation="fadeInUp" style="margin-top: 20px;">
                                <div class="property-box border-hover" style="margin-top: 15px;">
                                    <div class="property-image" style="height: 230px;">
                                        <img src="{{ url('files/'. json_decode($post['post']->images)[0])  }}" class="img-responsive" alt="#" width="100%" style="height: 250px;"/>
                                    </div>
                                    <div class="property-text" style="height: 80px;">
                                        <div class="appartment-name">
                                            <h4>{{ $post['post']->name }}</h4>

                                        </div>
                                        <a href="{{ url($post['category'] .'/'. $post['post']->slug) }}" class=""><i class="fa fa-angle-right"></i> Chi tiết</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="partners mrgt7x mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

    <section class="vacation-bg animated out" data-delay="0" data-animation="fadeInUp" style="background:url({{ url('files/'. \App\Components\Functions::getBanner()->image) }});">
        <div class="container">
            <div class="get-start mrgt6x mrgb6x clearfix">
            </div>
        </div>
    </section>

    <section>
        <div class="container">

            <div class="testimonial animated out" data-delay="0" data-animation="fadeInUp">
                <div class="col-md-6">
                    <div class="section-heading mrgb4x">
                        <h3>Giới thiệu</h3>
                    </div>
                    <div class="section-detail">
                        <div class="testi-carousel owl-carousel">
                            <div class="item">
                                <div class="testimonial-box">
                                    <div class="client-name">
                                        <h4>Chúng tôi là ai ?</h4>
                                    </div>
                                    <div class="client-review">
                                        <p>
                                            Thiết kế nhà xinh được thành lập bởi đội ngũ giảng viên, kiến trúc sư, kỹ sư năng động, của trường Đại học Xây dựng cùng có niềm đam mê sáng tạo ra những sản phẩm kiến trúc, đề cao sự hợp lý về hình khối, hợp lý về công năng. Với bề dày về kinh nghiệm và năng lực trong thiết kế kiến trúc – thi công xây dựng – tư vấn giám sát qua nhiều công trình như nhà ở dân dụng, văn phòng, nhà xưởng, khách sạn…
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest-news animated out" data-delay="0" data-animation="fadeInUp">
                <div class="col-md-6">
                    <div class="section-heading mrgb4x">
                        <h3>Tin tức</h3>
                    </div>
                    <div class="section-detail">
                    @foreach($news as $post)
                        <div class="blog clearfix">
                            @if(count(json_decode($post->images)) > 0)
                                <div class="blog-img"><img src="{{ url('files/'.json_decode($post->images)[0]) }}" class="img-responsive" alt="#" /></div>
                            @endif
                            <div class="blog-text">
                                <h4>{{ $post->name }}</h4>
                                <ul class="time">
                                    <li><a href="#"><i class="icon-access-time"></i>{{ $post->updated_at }}</a></li>
                                </ul>
                                <p style="">{!! $post->desc !!}</p>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="partners mrgt7x mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

@endsection
