@extends('Web-site-Creation.master')
<style>

.myLabel {
    position: relative;
}
.myLabel input {
    position: absolute;
    z-index: 2;
    opacity: 0;
    width:100%;
    height:100%;
}


/* Example custom styling */
.myLabel {
    border: 2px solid #AAA;
    border-radius: 4px;
    padding: 2px 5px;
    margin: 2px;
    background: #ddddcc82;

}
.myLabel:hover {
    background: #CCC;
}
.myLabel:active {
    background: #CCF;
}
.navbar-brand img {
    margin-top: -5px;
    margin-right: auto;
    margin-left: auto;
}
.branch_clone{
    margin-bottom: 20px;
}

</style>

@section('content')
{{ Form::open(array(
                'url'    => '/en/full_WebSite_Creation/edit_website_products',
                'method' =>'POST',
                'role'   => 'form',
                'id'     => 'submit_form',
                'class'  =>'wizard-card form',
                'files'  => true
                )) }}
<div class="containerx">
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

                                         <div class="containerx">


    <div class="well clearfix">

        <div id="czContainer">
            <div id="first">
                <div class="recordset">
                    <div class="fieldRow clearfix">
                        <div class="col-md-5">

                            <div id="div_id_stock_1_service" class="form-group">

                                <label for="id_stock_1_product" class="control-label  requiredField">

                                    Product name <small> * in English *</small>
                                </label><div class="controls ">
                                            <input type="text" name="product_name_en" id="id_stock_1_product" value="{{$item->product_name_en}}" class="textinput cloneCount form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div id="div_id_stock_1_service" class="form-group">
                                <label for="id_stock_1_product" class="control-label  requiredField">
                                    Product name <small> * in Arabic *</small>
                                </label><div class="controls ">
                                            <input type="text" name="product_name_ar" id="id_stock_1_product" value="{{$item->product_name_ar}}" class="textinput cloneCount form-control" required/>
                                </div>
                            </div>
                        </div><div class="col-md-6">
                            <div id="div_id_stock_1_quantity" class="form-group">
                                <label for="id_stock_1_quantity" class="control-label  requiredField">
                                    product description<small> * in English *</small>
                                </label><div class="controls ">{{ Form::textarea('product_desc_en', $item->product_desc_en, [
                                  'ID'=>'words_en',
                                   'size' => '15x5',
                                   'class'=>'form-control',
                                   'aria-describedby'=>"Deschelp" ,
                                   'placeholder'=>"in english ..",
                                   'required'=>"requiredField   "
                            ]) }} </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="div_id_stock_1_quantity" class="form-group">
                                <label for="id_stock_1_quantity" class="control-label  requiredField">
                                    product description<small> * in Arabic *</small>
                                </label><div class="controls ">{{ Form::textarea('product_desc_ar', $item->product_desc_ar, [
                                  'ID'=>'words_en',
                                   'size' => '15x5',
                                   'class'=>'form-control',
                                   'aria-describedby'=>"Deschelp" ,
                                   'placeholder'=>"in arabic ..",
                                   'required'=>"required"
                            ]) }} </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div id="div_id_stock_1_quantity" class="form-group" style="text-align: center;">

                                <label for="id_stock_1_quantity" class="control-label  requiredField">

                                    product photo<small>*</small>
                                    <em>
                                    Select a photo only if you want to change the previous photo
                                </em>
                                </label>
                                    <div class="myLabel">

                                    <input type="file"
                                        name="product_photo"
                                        aria-describedby="fileHelp"
                                        accept="image/*"
                                        id="realupload"
                                        class="realupload form-group"
                                        required
                                    />

                                <span>  click to upload </span>



                             </div>
                            </div>
                        </div>
<input type="hidden" name="productID" value="{{$productID}}">
<button type="submit" style="float: right;" class="btn blue button-next"
onclick="document.getElementById('submit_form').submit();">
    save
 <i class="m-icon-swapright m-icon-white"></i>
</button>

<a href="{{ url('/en/full_WebSite_Creation') }}/all_websites" style="float: left;" class="btn default button-previous">
     <i class="m-icon-swapleft"></i>
    back

 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



{{Form::close()}}
@endsection
