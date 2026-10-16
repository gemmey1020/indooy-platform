@extends('Admin.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-tablex">Activities</div>
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
            footer: '<a href="{{ url('/') }}/WebSite_Creation/tasks">check your tasks now ?</a>'
        });
    </script>
@endif
              <thead>
                <tr>
                  <th>photo</th>
                  <th>Name</th>
                  <th>الاسم</th>
                  <th>Related_Names</th>
                  <th>اسماء ذات صلة</th>
                  <th>Created At</th>
                  <th>Updated At</th>


                </tr>
              </thead>

              <tbody>
                @if(!empty($result))
                @foreach($result as $item)
                <tr>
                  <td>
                    <img src="{{url('/')}}/public/photos/activity/{{$item->pic_exct}}" style=" max-height:70px;" />
                  </td>
                  <td>{{ $item->name_en }}</td>
                  <td>{{ $item->name_ar }}</td>
                  <td>{!!(str_replace("-","</p>",$item->Relatedkeywords_en)) !!}</td>
                  <td>{!!(str_replace("-","</p>",$item->Relatedkeywords_ar)) !!}</td>
                   <td>{{ date('Y-m-d ',strtotime($item->created_at ))}}</td>
                  <td>{{ date('Y-m-d ',strtotime($item->updated_at ))}}</td>

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




