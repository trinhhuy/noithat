@extends('frontend.layouts.app')

@section('content')
    <div id="mainslider">
        <div class="slider">
            <div class="fullscreen-container">
                <div class="fullscreenbanner">
                    <ul>
                        <li data-transition="slide" data-slotamount="10"> <img class="img-responsive" alt="" src="{{ url('frontend/images/sliderimg-1.png') }}"/>
                            <div class="caption sfb"
                                 data-x="center"
                                 data-y="160"
                                 data-speed="1000"
                                 data-start="1000"
                                 data-easing="easeOutExpo">
                                <div class="slider-text clearfix">
                                    <div class="text-box">
                                        <h2>Luxurious Hotel Suite</h2>
                                        <p>Whether you’re looking to sell or let your home or want to buy or rent a</p>
                                        <p> home, we really are the people for you to come to.</p>
                                    </div>
                                    <div class="slider-button">
                                        <div class="view-btn"> <a href="#">VIEW DETAILS</a> </div>
                                        <div class="signup-btn"> <a href="#">SIGNUP NOW</a> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slide" data-slotamount="10"> <img class="img-responsive" alt="" src="{{ url('frontend/images/sliderimg-2.png') }}"/>
                            <div class="caption sfb"
                                 data-x="center"
                                 data-y="center"
                                 data-speed="1000"
                                 data-start="1000"
                                 data-easing="easeOutExpo">
                                <div class="slider-text clearfix">
                                    <div class="text-box">
                                        <h2>Luxurious Hotel Suite</h2>
                                        <p>Whether you’re looking to sell or let your home or want to buy or rent a</p>
                                        <p> home, we really are the people for you to come to.</p>
                                    </div>
                                    <div class="slider-button">
                                        <div class="view-btn"> <a href="#">VIEW DETAILS</a> </div>
                                        <div class="signup-btn"> <a href="#">SIGNUP NOW</a> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li data-transition="slide" data-slotamount="10"> <img class="img-responsive" alt="" src="images/sliderimg-3.png"/>
                            <div class="caption sfb"
                                 data-x="center"
                                 data-y="center"
                                 data-speed="1000"
                                 data-start="1000"
                                 data-easing="easeOutExpo">
                                <div class="slider-text clearfix">
                                    <div class="text-box">
                                        <h2>Luxurious Hotel Suite</h2>
                                        <p>Whether you’re looking to sell or let your home or want to buy or rent a</p>
                                        <p> home, we really are the people for you to come to.</p>
                                    </div>
                                    <div class="slider-button">
                                        <div class="view-btn"> <a href="#">VIEW DETAILS</a> </div>
                                        <div class="signup-btn"> <a href="#">SIGNUP NOW</a> </div>
                                    </div>
                                </div>
                            </div>
                        </li>
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
                            <li class="mix {{ $post['category'] }} col-md-4 col-sm-6 animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="property-box border-hover">
                                    <div class="appartment-img"><img src="{{ url('files/'. json_decode($post['post']->images)[0])  }}" class="img-responsive" alt="#" width="100%"/>
                                        <div class="detail-btn"> <a href="#" class="more-detail"><i class="fa fa-angle-right"></i>Chi tiết</a> </div>
                                    </div>
                                    <div class="property-text">
                                        <div class="appartment-name">
                                            <h4>{{ $post['post']->name }}</h4>
                                            <p>{!! $post['post']->content  !!} </p>

                                        </div>
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

@endsection
