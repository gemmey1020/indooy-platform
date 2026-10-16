@include('Web-site-Creation.auth.header')


<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="{{ url('/') }}">
<img src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="indooy-logo"style="
    margin-bottom: -436px;
    margin-top:  -400px;
    width:  300px;
    height: 300px;
">

	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN FORM -->
	@yield('form')
	<!-- END FORM -->
</div>




@include('Web-site-Creation.auth.footer')
@yield('footer')
