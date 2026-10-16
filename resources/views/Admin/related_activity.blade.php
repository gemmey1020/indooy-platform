@extends('Admin.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
   <link href="{{url('/resources/views/Admin')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@section('content')
<div class="container">
    <div class="container-fluid">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"> Related Category</div>
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
        {{ Form::open(array('url' => 'Admin_Dashboard/RelatedActivity','files' => true)) }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="Name">الاسم</label>
                {{ Form::select('name_ar',$Name_Ar,0,array(
                    'class'             =>"form-control",
                     'id'               =>"Name_ar",
                     'aria-describedby' =>"nameHelp" ,
                     'placeholder'      =>"اختر النشاط" ,

                  )
                  ) }}
              </div>
              <div class="col-md-6">
                <label for="Name"> name</label>
             <select name="name_en" id="Name_en" class="form-control">
               <option value="">choose a category</option>

              </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            <label for="Desc">كلمات البحث ذات صلة</label>
                {{ Form::textarea('Relatedkeywords_ar', null, [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
                 </div>
                 <div class="col-md-6">
             <label for="Desc">Related keywords</label>
                {{ Form::textarea('Relatedkeywords_en', null, [
                  'ID'=>'Desc',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"some words is enough",

                   ]) }}
                   </div>
                 </div>
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
@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="name_ar"]').on('change', function() {
            var ID = $(this).val();
            if(ID) {
                $.ajax({
                   url: 'RelatedNameEn/'+ID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                         $('select[name="name_en"]').empty();
                         $('textarea[name="Relatedkeywords_en"]').val('');
                         $('textarea[name="Relatedkeywords_ar"]').val('');
                        $.each(data['name_en'], function(key, value) {
                            $('select[name="name_en"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                         $('textarea[name="Relatedkeywords_ar"]').val(data['Relatedkeywords_ar']);
                         $('textarea[name="Relatedkeywords_en"]').val(data['Relatedkeywords_en']);

                    }
                });
            }else{
                   $('select[name="name_en"]').empty();
                   $('textarea[name="Relatedkeywords_en"]').val('');
                   $('textarea[name="Relatedkeywords_ar"]').val('');


            }
        });
    });
</script>
@endsection