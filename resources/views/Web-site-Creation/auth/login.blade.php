@extends('Web-site-Creation.auth.master')


@section('form')


<form class="login-form" method="POST" action="{{ url('/WebSite_Creation/login') }}">
                        {{ csrf_field() }}

		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
			  @if(Session::get('success') != '')
<div class="success callout" data-closable style="color: green;">
  {{Session::get('success')}}
  {{Session::forget('success')}}
  <br>
</div>
@endif

@if (isset($errors) && count($errors) > 0)
<div class="alert callout" data-closable>
  <h5 style="color: red;">some errors </h5>
  @foreach ($errors->all() as $error)
    - {{ $error }} <br />
  @endforeach

</div>
@endif
		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="write your email" name="email" {{ old('email') }}/>
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password" onkeyup="myFunction()"/>
			<input type="hidden" name="real_password" id="real_password">
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercas">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Remember </label>
			<a href="{{ url('/') }}/WebSite_Creation/recover/reset" id="forget-password" class="forget-password">Forgot Password?</a>

		</div>
		<div class="login-options"
		style="display:  none;">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div>
		<br>
		<div class="create-account">
			<p>
				<a href="{{ url('/') }}/WebSite_Creation/register" id="register-btn" class="uppercase">Create an account</a>
			</p>
		</div>

	</form>




@endsection