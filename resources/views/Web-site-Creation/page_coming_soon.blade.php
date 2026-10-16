<!DOCTYPE html>

<!--[if !IE]><!-->
<html lang="en">

<head>
<meta charset="utf-8"/>
<title>{{ $item->company_name_en }} | Coming Soon</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/css/coming-soon.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/scripts/flipclock/flipclock.css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{ url('/') }}/public/img/logo3.png"/>
<style>
        /* default styles here for older browsers.
       I tend to go for a 600px - 960px width max but using percentages
    */
    @media only screen and (min-width:960px){
        /* styles for browsers larger than 960px; */
/*       .clock.flip-clock-wrapper {*/
/*    zoom: .5;*/
/*}*/
    }
    }
    @media only screen and (min-width:1440px){
        /* styles for browsers larger than 1440px; */
/*      .clock.flip-clock-wrapper {*/
/*    zoom: .5;*/
/*}*/
    }
    }
    @media only screen and (min-width:2000px){
      .clock.flip-clock-wrapper {
    zoom: .5;
}
    }
    @media only screen and (max-device-width:480px){
       /* styles for mobile browsers smaller than 480px; (iPhone) */
       .clock.flip-clock-wrapper {
        zoom: .45;

}
    }
    @media only screen and (device-width:768px){
       /* default iPad screens */
       .clock.flip-clock-wrapper {
    zoom: .5;
}
    }
    /* different techniques for iPad screening */
    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
      /* For portrait layouts only */
      .clock.flip-clock-wrapper {
       zoom: 0.9;

}
    }

    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
      /* For landscape layouts only */
/*      .clock.flip-clock-wrapper {*/
/*    zoom: .5;*/
/*}*/
    }
</style>
@if($timer==0 || $item->statue !=0)
<script>

@if(Config::get('app.locale')=="ar")
var key="{{$item->company_name_en}}" ;
    setTimeout(function() { window.location.replace("/ar/search?q="+key)},5000);
@else
var key= "<?php echo$item->company_name_ar;?>" ;
  setTimeout(function() { window.location.replace("/ar/search?q="+key)},5000);
@endif
</script>
@endif
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 coming-soon-header">
			<a class="brand" href="{{url('/')}}">
			<img src="{{ url('/') }}/public/img/logo3.png" alt="logo"/>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 coming-soon-content">
			<h1>Coming Soon!</h1>
			<p>
				 you have to wait to approve your request .. thank you
			</p>
			<br>
			<form class="form-inline" action="{{url('/')}}/en/search" method="get">
				<div class="input-group input-large">
					<input type="text" class="form-control" name="q">
					<span class="input-group-btn">
					<button class="btn blue" type="submit">
					<span>
					search in indooy </span>
					<i class="m-icon-swapright m-icon-white"></i></button>
					</span>
				</div>
			</form>
<!--{{-- 			<ul class="social-icons margin-top-20">-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Feed" class="rss">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Facebook" class="facebook">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Twitter" class="twitter">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Goole Plus" class="googleplus">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Pinterest" class="pintrest">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Linkedin" class="linkedin">-->
<!--					</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="javascript:;" data-original-title="Vimeo" class="vimeo">-->
<!--					</a>-->
<!--				</li>-->
<!--			</ul> --}}-->
		</div>
		<div class="col-md-8 coming-soon-countdown">
			<div id="defaultCountdown">
				<div class="clock" style="margin:2em;"></div>
			</div>
		</div>
	</div>

</div>

<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/countdown/jquery.countdown.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>


<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/scripts/flipclock/flipclock.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121398762-1"></script><script>window.dataLayer=window.dataLayer || []; function gtag(){dataLayer.push(arguments);}gtag('js', new Date()); gtag('config', 'UA-121398762-1');</script>
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
Layout.init(); // init current layout

  //ComingSoon.init();
  // init background slide images
    $.backstretch([
            "{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/media/bg/1.jpg",
            "{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/media/bg/2.jpg",
            "{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/media/bg/3.jpg",

        ], {
        fade: 1000,
        duration: 10000
   });
});
</script>
<script type="text/javascript">
			var clock;

			$(document).ready(function() {
				// Set dates.
				var clock = $('.clock').FlipClock({{$timer}}, {
						clockFace: 'DailyCounter',
						countdown: true
					});
			});
		</script>
		<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
		@include('sweetalert::alert')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>