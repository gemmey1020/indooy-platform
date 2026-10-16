@include('Admin.review.review_header')
@yield('style')

<div class="container">

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
          <div class="col-md-12">
              @yield('content')
          </div>
        </div>
        <!-- END PAGE CONTENT-->

    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!--Cooming Soon...-->
    <!-- END QUICK SIDEBAR -->
  </div>
  <!-- END CONTAINER -->

       @include('Web-site-Creation.footer')
       @yield('footer')
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @include('sweetalert::alert')