@extends('Admin.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-tablex">websites </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

              <thead>
                <tr>
                  <th style="width: 190px;text-align: -webkit-center;">
                      ID</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      photo</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      Name</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      الاسم</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      business_email</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      business_phone </th>
                  <th style="width: 190px;text-align: -webkit-center;">
                      Created At</th>
                  <th style="width: 190px;text-align: -webkit-center;">
                       Tools</th>

                </tr>
              </thead>

              <tbody>
                @if(!empty($items))
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                  <td>
                    @if($item->company_logo!=null)
                    <img src="{{url('/')}}/public/photos/FullWebSite/companies/{{$item->company_logo}}" style=" max-height:70px;" />
                    @else
                    <img src="{{url('/')}}/public/photos/activity/no-image.png" style=" max-height:70px;" />
                    @endif
                  </td>
                   <td style="width: 190px;text-align: -webkit-center;">
                       {{ $item->company_name_en }}</td>
                   <td style="width: 190px;text-align: -webkit-center;">
                       {{ $item->company_name_ar }}</td>
                   <td style="width: 190px;text-align: -webkit-center;">
                       {{ $item->business_email }}</td>
                  <td style="width: 190px;text-align: -webkit-center;">
                      {{ $item->business_phone }}</td>
                    <td style="width: 190px;text-align: -webkit-center;">
                        {{ date('Y-m-d ',strtotime($item->created_at ))}}</td>
 <td style="width: 190px;text-align: -webkit-center;">
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/edit_website/{{ $item->id }}">
                       full edit
                    </a>
                    <br> <br>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/all_website_branches/{{ $item->id }}">
                       edit branches only
                    </a>
                    <br> <br>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/all_website_products/{{ $item->id }}">
                       edit products only
                    </a>
                    <br> <br>
<a class="btn btn-danger"
href="{{ url('/') }}/en/full_WebSite_Creation/delete_website/{{ $item->id }}">
                        delete
                    </a>
               </td>
                </tr>
                @endforeach
                @endif

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">the result above is updated </div>
      </div>
    </div>
</div>

@endsection

@include('sweetalert::alert')



