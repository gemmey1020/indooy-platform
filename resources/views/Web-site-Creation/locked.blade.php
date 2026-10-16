<!DOCTYPE html>

<html lang="ar-en">

<meta charset="utf-8"/>
<title>Indooy | Lock Screen 1</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/css/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="http://localhost/indooy/public/img/logo3.png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img src="{{ url('/') }}/public/img/logo3.png" alt="logo"/>
		</a>
	</div>
	<div class="page-body">
		<div class="lock-head">
			 Locked
		</div>
		<div class="lock-body">
			<div class="pull-left lock-avatar-block">
				<!--<img src="{{ url('/') }}/public/img/logo_admin.png">-->
			</div>
			<form class="lock-form pull-left" action="{{ url('/') }}/en/WebSite_Creation" method="get">
				<h4>{{ Auth::guard('web_WebSite_Creation')->user()->name }}</h4>

				<div class="form-actions">
					<button type="submit" class="btn btn-success uppercase">Welcome Again</button>
				</div>
			</form>
		</div>
		<div class="lock-bottom">
		</div>
	</div>
	<div class="page-footer-custom">
		 2018 &copy; Indooy. Admin Dashboard.
	</div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/respond.min.js"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121398762-1"></script><script>window.dataLayer=window.dataLayer || []; function gtag(){dataLayer.push(arguments);}gtag('js', new Date()); gtag('config', 'UA-121398762-1');</script>
<script>
jQuery(document).ready(function() {
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>