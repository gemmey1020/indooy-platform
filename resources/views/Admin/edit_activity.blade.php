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
        {{ Form::open(array('url' => 'Admin_Dashboard/edit_activity/'.$item->id,'files' => true)) }}
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="Name">الاسم</label>
                {{ Form::text(
                  'name_ar',$item->name_ar,array(
                    'class'             =>"form-control",
                     'id'               =>"Name",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>""
                  )
                  ) }}
              </div>
              <div class="col-md-4">
                <label for="Name"> name</label>
                {{ Form::text(
                  'name_en',$item->name_en,array(
                    'class'             =>"form-control",
                     'id'               =>"Name",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>""
                  )
                  ) }}
              </div>
               <div class="col-md-4">
                <label for="Name"> format</label>
                {{ Form::text(
                  'link','ضع (-) بين كل كلمة بحث ',array(
                    'class'             =>"form-control",
                     'id'               =>"Name",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>"Enter the service name",
                     'disabled'          =>'true'
                  )
                  ) }}
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Desc">كلمات البحث</label>
                {{ Form::textarea('keywords_ar', $item->keywords_ar, [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
             <label for="Desc">keywords</label>
                {{ Form::textarea('keywords_en', $item->keywords_en, [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
                 </div>
         <div class="form-group">
            <label for="Desc">الوصف</label>
                {{ Form::textarea('Desc_ar', "waiting", [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
             <label for="Desc">Description</label>
                {{ Form::textarea('Desc_en', "waiting", [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
                 </div>
          <div class="form-group">
            <label class="custom-file" id="customFile1">
              Main photo
            </label>
        <input type="file"
         name="activity_pic"
         class="fill"
         aria-describedby="fileHelp"
         id="activity_pic"
         accept="image/*"
        />

          </div>
          {{ Form::button('update', [
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