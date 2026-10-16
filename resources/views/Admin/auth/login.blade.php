<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Access</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ url('/') }}/resources/views/Admin/style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ url('/') }}/resources/views/Admin/style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ url('/') }}/resources/views/Admin/style/css/sb-admin.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="{{url('/')}}/public/img/favicon.ico"/>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/en/Admin_login') }}">
                        {{ csrf_field() }}

           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Email :</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Password : </label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                </label>
            </div>
          </div>
          <center>
           <button type="submit" class="btn btn-success" >
                                    Login
                                </button>
                                </center>
        </form>
        <div class="text-center">
          <?php /*
          <a class="btn btn-link" href="{{ url('/Admin_password/reset') }}">
                                    Forgot Your Password?
                                    */
                                    ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('/') }}/resources/views/Admin/style/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('/') }}/resources/views/Admin/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ url('/') }}/resources/views/Admin/style/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
