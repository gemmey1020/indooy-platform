   @extends('Web-site-Creation.auth.master')

 @section('form')

    <form class="forget-form" method="post" action="{{ url('/WebSite_Creation/recover/email') }}">
                        {{ csrf_field() }}
        <h3>Forget Password ?</h3>
        <p>
             Enter your e-mail address below to reset your password.
        </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>

@endsection
@section('footer')

@endsection
@section('extra-footer')
<script>
jQuery('.forget-form').show();
</script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')

@endsection