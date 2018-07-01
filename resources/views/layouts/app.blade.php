<!DOCTYPE html>
<html lang="{{ $locale }}" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#" >
<head>
	<meta name=“google-site-verification” content=“QbOQ8oTSzmbRDcVYuTo9yZSqFnRNMRGBHjomheyhKgU” />
	<meta name=“p:domain_verify” content=“681d807f64994ba6beb81890b7a5c865"/>
	<meta charset="UTF-8">
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
	<meta name="author" content="Kyrylo" />
	<meta name="copyright" content="Handcrafted by Kyrylo Kovalenko" />
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">
	<!-- /*===== custom Open Graph =====*/ -->
	@yield('open_graph')
	<link rel='stylesheet' type='text/css' href="{{ asset('css/styles.css') }}"/>
	<link rel='stylesheet' type='text/css' href="{{ asset('css/layouts.css') }}"/>
	<link rel='stylesheet' type='text/css' href="{{ asset('css/responsive-leyouts.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive-tabs.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/et-line-font.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ elixir('css/main.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/perspectiveRules.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('fancybox/jquery.fancybox.css') }}"/>
	<link rel='stylesheet' type='text/css' href="{{ asset('fonts/worksans-family.css') }}"/>
	<link rel='stylesheet' type='text/css' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css?ver=4.5.2"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
	<!-- /*===== custom css =====*/ -->
	@yield('style_css')

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KMX9BPP');</script>
	<!-- End Google Tag Manager -->

</head>

<!-- <body class="home page page-id-3617 page-template page-template-template-front-page page-template-template-front-page-php" oncontextmenu="return false" style="-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;"> -->
<body class="home page page-id-3617 page-template page-template-template-front-page page-template-template-front-page-php">

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMX9BPP"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="preloader">
	    <div class="sk-cube-grid" id="sk-cube-grid">
	        <div class="sk-cube sk-cube1"></div>
	        <div class="sk-cube sk-cube2"></div>
	        <div class="sk-cube sk-cube3"></div>
	        <div class="sk-cube sk-cube4"></div>
	        <div class="sk-cube sk-cube5"></div>
	        <div class="sk-cube sk-cube6"></div>
	        <div class="sk-cube sk-cube7"></div>
	        <div class="sk-cube sk-cube8"></div>
	        <div class="sk-cube sk-cube9"></div>
	    </div>
	</div>
	
	<!-- /*===== include header =====*/ -->
	@include('includes.header')
	<!-- /*===== include content =====*/ -->
	@yield('content')
	<!-- /*===== include footer =====*/ -->
	@include('includes.footer')

	<script type='text/javascript' src="{{ asset('js/jquery-1.11.3.js') }}"></script>
	<script type='text/javascript' src="{{ asset('js/jquery-migrate.min.js') }}"></script><!-- 
	<script type="text/javascript" src="/js/jquery.logosDistort.min.js"></script>
	<script type="text/javascript" src="/js/jquery.particleground.min.js"></script>
	<script type='text/javascript' src="/js/jquery.parallax.js"></script>
	<script type='text/javascript' src='/js/isotope.pkgd.min.js'></script>
	<script type='text/javascript' src='/js/scripts.js'></script>
	<script type="text/javascript" src="/js/responsive-tabs.min.js"></script> -->
	<script type="text/javascript" src="{{ elixir('js/main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/typed.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/customs.scripts.js') }}"></script>
	<script type="text/javascript" src="{{ asset('fancybox/jquery.fancybox.pack.js') }}"></script>
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('js/jquery.lazyload.js') }}"></script>
	<!-- /*===== custom javascript =====*/ -->
	@yield('style_javascript')
	<script type="text/javascript">
		$(document).ready(function(){$(".logocarusel").slick({infinite:!1,slidesToShow:2,slidesToScroll:1,autoplay:!0,autoplaySpeed:500})}),$(document).ready(function(){$(".swap-text").on({mouseenter:function(){$("span",this).html("@lang('messages.footer.button-not-origin')")},mouseleave:function(){$("span",this).html("@lang('messages.footer.button-origin')")}})}),$(document).ready(function(){$("#various").fancybox({maxWidth:700,minHeight:530,maxHeight:540,fitToView:!0,width:"90%",height:"90%",autoSize:!0,closeClick:!1,openEffect:"none",closeEffect:"none",padding:20})});
	</script>
</body>
</html>
