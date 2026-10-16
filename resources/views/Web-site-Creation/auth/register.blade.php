@extends('Web-site-Creation.auth.master')


@section('form')


	<form class="register-form" method="POST" action="{{ url('/WebSite_Creation/register') }}">
                        {{ csrf_field() }}
		<h3>Join Us</h3>
		<p class="hint">
			 Enter your personal details below:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Full Name</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname" value="{{ old('fullname') }}" />
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Moile number</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="your number"  name="mobile" value="{{ old('mobile') }}"  maxlength="15" pattern="\d*"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Address</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="write your full address" name="address" value="{{ old('address') }}" />
		</div>

		<div class="form-group">
			<div class="col-md-12">

			{{Form::select('country',$country_list,null,array(
                                                'class'        => 'form-control col-md-5',
                                                 'id'           =>"country",
                                                 'aria-describedby'   =>"nameHelp" ,
                                                 'required' =>'required'
                                          ))}}
		</div>
			<div class="col-md-6">

			<select name="city" class="form-control" id="city">
				<option value=""></option>

			</select>
		</div>
			<div class="col-md-6">

			<select name="district" class="form-control" id="district">
				<option value=""></option>

			</select>
		</div>
		</div>
<center>
		<p class="hint">
			 Enter your account details below:
		</p>
</center>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" value="{{ old('email') }}" />
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="tnc"/> I agree to the <a href="javascript:;">
			Terms of Service </a>
			& <a href="javascript:;">
			Privacy Policy </a>
			</label>
			<div id="register_tnc_error">
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
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
	</form>



@endsection
@section('footer')

@endsection