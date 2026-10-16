@include('Sales.header')



<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}/Sales_Dashboard">Dashboard</a>
        </li>

      </ol>
      <div class="row">
        <div class="col-12">

@yield('content')
        </div>
      </div>
    </div>

       @include('Sales.footer')
       @yield('footer')