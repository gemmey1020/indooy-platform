<!DOCTYPE html>

<html lang="ar-en">

<meta charset="utf-8"/>
<title>Indooy | Recover Data </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Cre /global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
<link rel="shortcut icon" href="{{ url('/') }}/public/img/logo3.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
    <div class="page-logo">
        <a class="brand" href="index.html">
        <!--<img src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/img/logo-big.png" alt="logo"/>-->
        </a>
    </div>
    <div class="page-body">
        <div class="lock-head">
             Locked
        </div>
        <div class="lock-body">
            <div class="pull-left lock-avatar-block">
                <img src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" class="lock-avatar">
            </div>
            <form class="lock-form pull-left" action="{{ url('/') }}/WebSite_Creation/recover/reset" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <h4></h4>
                <div class="form-group">


                    <input type="text" class="form-control placeholder-no-fix {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="email" name="email" value="{{ $email or old('email') }}">
                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif



                    <input class="form-control placeholder-no-fix {{ $errors->has('password') ? ' has-error' : '' }}" type="password" autocomplete="off" placeholder=" new Password" name="password"/>

                        @if ($errors->has('password'))
                        <div class="form-control">
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>

                    </div>
                        @endif
                    <input class="form-control placeholder-no-fix " type="password" autocomplete="off" placeholder="Password again" name="password_confirmation"/>
                       @if ($errors->has('password_confirmation'))
                        <div class="form-control">
<strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>

                    </div>
                        @endif


                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success uppercase">reset</button>
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
