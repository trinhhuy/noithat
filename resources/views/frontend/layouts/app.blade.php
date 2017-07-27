<!doctype html>
<html>

<!-- Mirrored from template-geek.com/demo/html/qvrenti/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2015 09:23:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thiết kế thi công nội thất</title>
    <link href="{{ url('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/photobox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/revolution-slider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=315541562244135";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="top-bar">
    <div class="container">
        <div class="left-bar">

        </div>
        <div class="right-bar">
            <ul class="contact">
                <li><i class="fa fa-phone"></i></li>
                <li></li>
                <li class="contact-info"> 0989.909.000 / 04.668.46.669</li>
            </ul>
            <ul class="mail">
                <li><i class="icon-email4"></i></li>
                <li></li>
                <li class="contact-info">kientrucsdesign@gmail.com</li>
            </ul>
            <ul class="login">
                @if(auth()->check())
                <li><a href="{{ url('/dashboard') }}"><span>{{ auth()->user()->email }}</span></a></li>
                @else
                    <li><i class="icon-login"></i></li>
                    <li><a href="{{ url('/login') }}"><span>Login</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>

@include('frontend.common.header')
@yield('content')


@include('frontend.common.footer')


<script src="{{ url('frontend/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ url('frontend/js/jquery-ui.js') }}" type="text/javascript"></script>
<script src="{{ url('frontend/js/bootstrap.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('frontend/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ url('frontend/js/jquery.photobox.js') }}"></script>
<script src="{{ url('frontend/js/jquery.themepunch.revolution.js') }}" type="text/javascript"></script>
<script src="{{ url('frontend/js/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('frontend/js/scripts.js') }}"></script>
</body>

<!-- Mirrored from template-geek.com/demo/html/qvrenti/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Aug 2015 09:25:34 GMT -->
</html>
