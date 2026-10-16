@include('Admin.header')


@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",

            icon: "{{ notify()->type() }}",
            @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
            @endif
        });
    </script>
@endif

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}/Admin_Dashboard">Dashboard</a>
        </li>

      </ol>
      <div class="row">
        <div class="col-12">

@yield('content')
        </div>
      </div>
    </div>

       @include('Admin.footer')
       @yield('footer')