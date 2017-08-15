<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thiết kế thi công nội thất</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">
    <link href="{{ url('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/photobox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/revolution-slider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <style>
        .ht-hotline{
            position: fixed;
            bottom: 12px;
            left: 12px;
        }
        .ht-hotline a{
            display: block;
            white-space:nowrap;
            padding: 6px 12px;
            border-radius: 4px;
            color: #fff;
        }
        .ht-hotline a i{
            display: inline-block;
            margin-right: 8px;
            padding-right: 8px;
            border-right: 1px solid rgba(255,255,255,.2);
        }
        .ht-hotline a span{
            font-size: 16px;
        }
    </style>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '261524767694542'); // Insert your pixel ID here.
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=261524767694542&ev=PageView&noscript=1"
        /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
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
        <?php $agent = new \Jenssegers\Agent\Agent(); ?>
        @if (!($agent->isMobile()))
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
        @endif
    </div>
</div>

@include('frontend.common.header')
@yield('content')

@include('frontend.common.footer')
@if ($agent->isMobile())
    <div class="ht-hotline">
      <a href="tel: 0466846669" class="" style="background: #26C281; white-space: nowrap">
          <i class="fa fa-phone" style="display: inline-block;"></i>
          <span style="display: inline-block; white-space: nowrap"><strong> TƯ VẤN DỰ TOÁN</strong></span>
      </a>
    </div>
@endif

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
