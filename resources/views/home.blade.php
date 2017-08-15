@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container">
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
        </div>
    </section>

    <?php $agent = new \Jenssegers\Agent\Agent(); ?>
    <section>
        <div class="container">
            <div class="featured-properties" >
                <div class="section-heading mrgt7x mrgb7x">
                    <h3><span style="font-family: 'Times New Roman', serif !important;font-weight: 600;">Sản phẩm của S-design</span></h3>
                </div>
                <div class="properties-listing">
                    @if (!($agent->isMobile()))
                        <ul class="listing-name mrgb5x">
                            <li class="filter active" data-filter="all"><a href="javascript:;">Tất cả</a></li>
                            @foreach($representativeCategories as $category)
                                <li class="filter" data-filter="{{ $category->slug }}"><a href="javascript:;">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    <ul class="filter-list">
                        @foreach($posts as $post)
                            <li class="mix {{ $post['category'] }} col-md-4 col-sm-4 animated out" style="margin-top: 20px;" data-delay="0" data-animation="fadeInUp">
                                <div class="post-area" style="margin-top: 15px;">
                                    <div class="property-image" style="height: 230px;">
                                        <a href="{{ url($post['category'] .'/'. $post['post']->slug) }}" class=""> <img src="{{ url('files/'. json_decode($post['post']->images)[0])  }}" class="img-responsive" alt="#" width="100%" style="height: 250px;"/></a>
                                    </div>
                                    <div class="property-text" style="height: 80px;">

                                        @if ($agent->isMobile())
                                            <div class="appartment-name">
                                                <a href="{{ url($post['category'] .'/'. $post['post']->slug) }}" class=""><h4 style="font-family: 'Times New Roman', serif !important;text-align: center;
                                                                                                                                line-height: 35px;font-weight: 600;">{{ $post['post']->name }}</h4></a>
                                            </div>
                                            <div class="blog-text" style="font-family: 'Times New Roman', serif !important; color: #acacac;font-size: 13px;line-height: 25px">
                                                <p>{!! $post['post']->desc !!}</p>
                                            </div>
                                        @else
                                            <div class="appartment-name">
                                                <a href="{{ url($post['category'] .'/'. $post['post']->slug) }}" class=""><b><h4 style="font-family: 'Times New Roman', serif !important;text-align: center;font-weight: 600;">{{ $post['post']->name }}</h4></b></a>
                                            </div>
                                        @endif
                                        {{--<a href="{{ url($post['category'] .'/'. $post['post']->slug) }}" class=""><i class="fa fa-angle-right"></i> Chi tiết</a>--}}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @if (!($agent->isMobile()))
    <section>
        <div class="container">
            <div class="featured-properties" >
                <div class="section-heading mrgt7x mrgb7x animated out" data-delay="0" data-animation="fadeInUp">
                    <h3><span style="font-family: 'Times New Roman', serif !important;font-weight: 600;">Phong cách thiết kế được ưa chuộng 2017</span></h3>
                </div>
                <div class="properties-listing">
                    <div class="property-image" style="height: 480px;">
                        <img src="{{ url('frontend/images/phong_cach.jpg')  }}" class="img-responsive" alt="#" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section>
        <div class="container">
            <div class="partners mrgt7x mrgb8x animated out" data-delay="0" data-animation="fadeInUp" >
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

    <section class="vacation-bg animated out" style="background:url({{ url('files/'. \App\Components\Functions::getBanner()->image) }}); height: 231px;" data-delay="0" data-animation="fadeInUp">
        <div class="container">
            <div class="get-start mrgt6x mrgb6x clearfix">
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="partners mrgt7x mrgb8x">
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="featured-properties" >
                <div class="section-heading mrgt7x mrgb7x">
                    <h3><span style="font-family: 'Times New Roman', serif !important;font-weight: 600;">DỊCH VỤ MIỄN PHÍ CỦA S-DESIGN</span></h3>
                </div>
                <div class="properties-listing animated out">
                    <div class="jumbotron" style="text-align: center;font-family: 'Times New Roman', serif">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x" style="color: red;"></i>
                            <i class="fa fa-building fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 style="font-weight: 600">Tư vấn thiết kế</h3>
                        <p>Tư vấn thiết kế nội thất trực tiếp bởi đội ngũ Kiến trúc sư dày dặn kinh nghiệm</p>
                    </div>
                    <div class="jumbotron" style="text-align: center; background: #ffffff;font-family: 'Times New Roman', serif">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x" style="color: red;"></i>
                            <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 style="font-weight: 600">Hỗ trợ lên phương án thi công</h3>
                        <p>Lên phương án thi công, tìm ra giải pháp tối ưu nhất cho không gian gia chủ</p>
                    </div>
                    <div class="jumbotron" style="text-align: center;font-family: 'Times New Roman', serif">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x" style="color: red;"></i>
                            <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 style="font-weight: 600">Tư vấn phong thủy</h3>
                        <p>Tư vấn bởi đội ngũ chuyên gia đầu ngành với kiến thức chyên sâu</p>
                    </div><div class="jumbotron" style="text-align: center; background: #ffffff;font-family: 'Times New Roman', serif">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x" style="color: red;"></i>
                            <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 style="font-weight: 600">Hỗ trợ dự toán</h3>
                        <p>Lên kế hoạch, dự toán với kinh phí sát thực tế nhất</p>
                    </div>
                    <div class="jumbotron" style="text-align: center;font-family: 'Times New Roman', serif">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x" style="color: red;"></i>
                            <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 style="font-weight: 600">Báo giá sản phẩm nội thất</h3>
                        <p>Báo giá tất cả các sản phẩm nội thất, tư vấn lựa chọn sản phẩm với chi phí hợp lý nhất</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="partners mrgt7x mrgb8x">
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">

            <div class="testimonial" >
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
                                            Thiết Kế Nội Thất Hoàng Gia S-design với đội ngũ Kiến trúc sư năng động cùng kinh nghiệm hơn 10 năm trong thi công thiết kế xây dựng. Sự đam mê cùng nhiệt huyết sáng tạo ra những sản phẩm kiến trúc đề cao sự tinh tế về hình khối, hợp lý về công năng. Mang đến những sản phẩm hoàn hảo với chi phí thiết kế thi công tối ưu nhất. Với bề dày kinh nghiệm và năng lực trong thi công xây dựng - tư vấn giám sát nhiều công trình như nhà ở dân dụng, văn phòng, biệt thự, khách sạn, nhà hàng.....
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="latest-news">
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
            <div class="partners mrgt7x mrgb8x">
                <div class="partner-carousel owl-carousel">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="featured-properties" >
                <div class="section-heading mrgt7x mrgb7x">
                    <h3><span style="font-family: 'Times New Roman', serif !important;font-weight: 600;">ĐỐI TÁC CHÍNH</span></h3>
                </div>
                <div class="properties-listing">
                    <div class="property-image" style="height: 203px;">
                        <img src="{{ url('frontend/images/doi_tac_chinh.jpg')  }}" class="img-responsive" alt="#" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{--<section>--}}
        {{--<div class="container">--}}
            {{--<div class="partners mrgt7x mrgb8x">--}}
                {{--<div class="partner-carousel owl-carousel">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection
