@extends('Admin.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="container-fluid">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add acttivty</div>
      <div class="card-body">
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
        {{ Form::open(array('url' => 'Admin_Dashboard/all_in_one','files' => true)) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="Name">الاسم</label>
                {{ Form::textarea(
                  'name_ar',Null,array(
                    'class'             =>"form-control",
                     'id'               =>"Name",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>""
                  )
                  ) }}
              </div>
              <div class="col-md-4">
                <label for="Name"> name</label>
                {{ Form::textarea(
                  'name_en',Null,array(
                    'class'             =>"form-control",
                     'id'               =>"Name",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>""
                  )
                  ) }}
              </div>

            </div>
          </div>


          {{ Form::button('add', [
             'type'  => 'submit',
             'class' => 'btn btn-primary btn-block',
             'name'  =>'Add_activity'
             ] )  }}

      {{ Form::close() }}


      </div>
    </div>
</div>
</div>

@endsection