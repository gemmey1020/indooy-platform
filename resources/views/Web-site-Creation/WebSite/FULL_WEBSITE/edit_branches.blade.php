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
                'url'    => '/en/full_WebSite_Creation/edit_website_branches',
                'method' =>'POST',
                'role'   => 'form',
                'id'     => 'submit_formx',

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
    <div class="well clearfix">
        <div id="czContainer2">
            <div id="first">
                <div class="recordset">
                    <div class="form-group">
                        <label class="control-label col-md-12">

                            <center style="margin-bottom: 20px;"> fill up below fields please
                            <span class="required">*</span>
                            <br>
                            </center>
                                        </label>
                                        <div class="col-md-12">
<div class="col-md-6">
    <label class="control-label  requiredField">
                                   branch name <small> * in English *</small>
                                </label>
        <input type="text" name="clone_branch_title_en" value="{{$item->branch_title_en}}" id="addressclone_en" class="form-control branch_clone"placeholder="write the branch name in english" required>
    </div>
<div class="col-md-6">
<label class="control-label  requiredField">
                                   branch name <small> * in Arabic *</small>
                                </label>
        <input type="text" name="clone_branch_title_ar" value="{{$item->branch_title_ar}}" id="addressclone_en" class="form-control branch_clone"placeholder="write the branch name in arabic" required>
    </div>

<div class="col-md-6">
    <label class="control-label  requiredField">
                                    branch address <small> * in English *</small>
                                </label>
        <input type="text" name="clone_branch_address_en" id="addressclone_en" value="{{$item->branch_address_en}}"  class="form-control branch_clone"placeholder="write the full address in english" required>
</div>
<div class="col-md-6">
<label class="control-label  requiredField">
                                    branch address <small> * in Arabic *</small>
                                </label>
        <input type="text" name="clone_branch_address_ar" id="addressclone_ar" value="{{$item->branch_address_ar}}" class="form-control branch_clone"placeholder="write the full address in arabic" required>
</div>
<label class="control-label  requiredField">
                                    branch telephone <small> * in English *</small>
                                </label>
        <input type="text" name="clone_branch_telephone" id="addressclone_en" value="{{$item->branch_phone}}" class="form-control branch_clone" placeholder="branch's phone" pattern= "[0-9]+" title="number only" required>
        <input type="hidden" name="BranchID" value="{{$BranchID}}">
                                                <br>


                                        </div>
<button type="submit" style="float: right;" class="btn blue button"
onclick="document.getElementById('submit_formx').submit();">
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
{{Form::close()}}
@endsection
