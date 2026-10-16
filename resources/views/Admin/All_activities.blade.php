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
        });
    </script>
@endif
              <thead>
                <tr>
                  <th>ID</th>
                  <th>photo</th>
                  <th>Name</th>
                  <th>الاسم</th>
                  <th>keywords</th>
                  <th>كلمات البحث</th>
                  <th>Description</th>
                  <th>الوصف</th>

                  <th>Created At</th>
                  <th>Updated At</th>
                  <th> Tools</th>

                </tr>
              </thead>

              <tbody>
                @if(!empty($activity))
                @foreach($activity as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                  <td>
                    @if($item->pic_exct!=null)
                    <img src="{{url('/')}}/public/photos/activity/{{$item->pic_exct}}" style=" max-height:70px;" />
                    @else
                    <img src="{{url('/')}}/public/photos/activity/no-image.png" style=" max-height:70px;" />
                    @endif
                  </td>
                  <td>{{ $item->name_en }}</td>
                  <td>{{ $item->name_ar }}</td>
                  <td>{!!(str_replace("_","</p>",$item->keywords_en)) !!}</td>
                  <td>{!!(str_replace("_","</p>",$item->keywords_ar)) !!}</td>
                  <td>{!!html_entity_decode($item->Desc_en) !!}</td>
                  <td>{!!html_entity_decode($item->Desc_ar) !!}</td>
                   <td>{{ date('Y-m-d ',strtotime($item->created_at ))}}</td>
                  <td>{{ date('Y-m-d ',strtotime($item->updated_at ))}}</td>
                  <td>
                      <a
                      class="btn btn-secondary"
                      href="{{ url('/') }}/Admin_Dashboard/edit_activity/{{ $item->id }}">
                        edit
                      </a>
                      <!--<a -->
                      <!--class="btn btn-danger" -->
                      <!--href="{{ url('/') }}/Admin_Dashboard/delete_activity/{{ $item->id }}">-->
                      <!--  delete-->
                      <!--</a>-->
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




