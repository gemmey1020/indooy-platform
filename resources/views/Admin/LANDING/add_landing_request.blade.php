@extends('Admin.review.review_master')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/select2/select2.css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
@endsection
@section('content')


<div class="row">
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

	<div class="col-md-12">
		<div class="portlet box blue" id="form_wizard_1">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-code"></i> WebSite review process - <span class="step-title">
					Step 1 of 4 </span>
				</div>
				<div class="tools hidden-xs">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">

				{{ Form::open(array(
				'url'    => '/Admin_Dashboard/Request/'. $type .'/'.$LandingID,
				'method' =>'POST',
				'role'   => 'form',
				'id'     => 'submit_form',
				'class'  => 'form-horizontal',
				'files'  => true
				)) }}
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
									<span class="number">
									1 </span>
									<span class="desc">
									<i class="fa fa-check"></i> basic business data </span>
									</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
									<span class="number">
									2 </span>
									<span class="desc">
									<i class="fa fa-check"></i> more data </span>
									</a>
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
									<span class="number">
									3 </span>
									<span class="desc">
									<i class="fa fa-check"></i> about you </span>
									</a>
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">
									<span class="number">
									4 </span>
									<span class="desc">
									<i class="fa fa-check"></i> Confirm </span>
									</a>
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success">
								</div>
							</div>
							<div class="tab-content">
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>
								<div class="tab-pane active" id="tab1">
									<h3 class="block">Provide your company details</h3>
									<div class="form-group">
										<label class="control-label col-md-3">comapny logo <span class="required">
										* </span>
										</label>


			<div class="form-group" style="margin-left: 77px;">
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
						<img src="{{ url('/') }}/public/photos/LandingPages/companies/{{ $Main_Item->company_logo }}" alt=""/>
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
					</div>
					<div>
						<span class="btn default btn-file">
						<span class="fileinput-new">
						Select image </span>
						<span class="fileinput-exists">
						Change </span>
						<input type="file" id="company_logo" name="company_logo">
						</span>
						<span class="help-block">
											must be from 150x150 to 250x250. </span>
						<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
						Remove </a>


					</div>

				</div>


</div>

									</div>
									<div class="form-group">
										<label class="control-label col-md-3">comapny name <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="company_name_en" value="{{ $Main_Item->company_name_en }}" required/>
											<span class="help-block">
											english name </span>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="company_name_ar" value="{{ $Main_Item->company_name_ar }}" required/>
											<span class="help-block">
											arabic name </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">business e-mail <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="email" class="form-control" name="business_email" value="{{ $Main_Item->business_email }}"required />
											<span class="help-block">
											the main one. </span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">classify your company<span class="required">
										* </span>
										</label>
											<div class="col-md-6">
						{{Form::select('category_list',$category_list,$Main_Item->category_list,array(
	                     		'class'        => 'form-control',
	                    		 'id'           =>"category_list",
	                    		 'aria-describedby'   =>"nameHelp" ,
	                    		 'required' =>'required'
	                    ))}}
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-md-3">write 5 keywords for your company in english<span class="required">
										* </span>
										</label>
									<?php
									$keyword_list_en=explode(',', $Main_Item->keyword_list_en)
									?>
									<input type="hidden" name="ID" value="{{ $Main_Item->LandingID }}">
										<div class="col-md-2">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control" value="{{ $keyword_list_en[0] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control" value="{{ $keyword_list_en[1] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control" value="{{ $keyword_list_en[2] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control" value="{{ $keyword_list_en[3] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control" value="{{ $keyword_list_en[4] }}" required>
							</div>
											<span class="required">
										 		</span>


									</div>
									<div class="form-group">
										<label class="control-label col-md-3">write 5 keywords for your company in english<span class="required">
										* </span>
										</label>
									<?php
									$keyword_list_ar=explode(',', $Main_Item->keyword_list_ar)
									?>
									<input type="hidden" name="ID" value="{{ $Main_Item->LandingID }}">
										<div class="col-md-2">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control" value="{{ $keyword_list_ar[0] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control" value="{{ $keyword_list_ar[1] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control" value="{{ $keyword_list_ar[2] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control" value="{{ $keyword_list_ar[3] }}" required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control" value="{{ $keyword_list_ar[4] }}" required>
							</div>
											<span class="required">
										 		</span>


									</div>
									<div class="form-group">
										<label class="control-label col-md-3">comapny head office <span class="required">
										* </span>
										</label>

										<div class="col-md-2">
{{Form::select('country_list',$country_list,$Main_Item->country_list,array(
'class'        => 'form-control col-md-5',
'id'           =>"country_list",
'aria-describedby'   =>"nameHelp" ,
'required' =>'required'
))}}


										</div>
										<div class="col-md-2">
{{Form::select('cities_list',$city_list,$Main_Item->cities_list,array(
'class'        => 'form-control col-md-5',
'id'           =>"cities_list",
'aria-describedby'   =>"nameHelp" ,
'required' =>'required'
))}}
											<span class="required">
										 		</span>

										</div>
										<div class="col-md-2">
{{Form::select('district_list',$district_list,$Main_Item->district_list,array(
'class'        => 'form-control col-md-5',
'id'           =>"district_list",
'aria-describedby'   =>"nameHelp" ,
'required' =>'required'
))}}
											</select>
											<span class="required">
										 		</span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">full head office address <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<input type="text" name="Main_address_en" id="address" class="form-control" value="{{ $Main_Item->Main_address_en }}" required>
                                            <input type="text" name="Main_address_ar" id="address" class="form-control" value="{{ $Main_Item->Main_address_ar }}" required>

										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">business phone <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<input type="text" name="business_phone" id="business_phone" class="form-control" value="{{ $Main_Item->business_phone }}" required>


										</div>
									</div>


								</div>
								<div class="tab-pane" id="tab2">
									<div class="form-group">
										<label class="control-label col-md-3">your branches <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
					@for($i=1;$i<count($Sub_Item);$i++)
						<input type="text" name="cloneaddresstitle_en[{{ $i }}]" id="addressClone" class="form-control cloneaddresstitle_en"placeholder="write the brach name in english" value="{{ $Sub_Item[$i]->branch_title_en }}">
						<input type="text" name="cloneaddresstitle_ar[{{ $i }}]" id="addressClone" class="form-control cloneaddresstitle_ar"placeholder="write the brach name in arabic" value="{{ $Sub_Item[$i]->branch_title_ar }}">

<input type="text" name="address_en[{{ $i }}]" id="addressClone" class="form-control addressclone_en"placeholder="write the full address in english" value="{{ $Sub_Item[$i]->branch_address_en }}">
<input type="text" name="address_ar[{{ $i }}]" id="addressClone" class="form-control addressclone_ar"placeholder="write the full address in arabic" value="{{ $Sub_Item[$i]->branch_address_ar }}">

						<input type="text" name="address_telephone[{{ $i }}]" id="addressClonex" class="form-control clonephone" placeholder="branch's phone" value="{{ $Sub_Item[$i]->branch_phone }}">
					@endfor

												<br>
										<button type="button" class="btn blue btnClone">add more</button>

										</div>

									</div>
									<div class="form-group">
										<label class="control-label col-md-3">you have a website ?
										</label>
										<div class="col-md-6">
										    <input type="text" name="website_extra" id="website_extra" class="form-control"placeholder="write your website link" value="{{ $Main_Item->website_extra }}">

												<br>


										</div>

									</div>
										<div class="form-group">
										<label class="control-label col-md-3">your social media contacts <span class="required">
										* </span>
										</label>
										<div class="col-md-6">

									<div class="input-group">
										<input type="url" class="form-control input-circle-left" placeholder="facebook page" name="SocFacebook" value="{{ $Main_Item->facebookAcc }}">
										<span class="input-group-addon input-circle-right">
										<i class="fa fa-facebook-square"></i>
										</span>

								</div>
								<hr>
									<div class="input-group">
										<input type="url" class="form-control input-circle-left" placeholder="google+ page" name="SocGoogle" value="{{ $Main_Item->googleAcc }}">
										<span class="input-group-addon input-circle-right">
										<i class="fa fa-google-plus-square"></i>
										</span>

								</div>
								<hr>
									<div class="input-group">

										<input type="url" class="form-control input-circle-left" placeholder="youtube page" name="SocYoutube" value="{{ $Main_Item->youtubeAcc }}">
										<span class="input-group-addon input-circle-right">
										<i class="fa fa-youtube-square"></i>
										</span>

								</div>
										</div>

									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<h3 class="block">now you are so close to make your landing page ....  </h3>
									<div class="form-group">
										<label class="control-label col-md-3">Description in english <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
				 {{ Form::textarea('desc_en', $Main_Item->desc_en, [
                  'ID'=>'desc_en',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"in english arabic ..",
                   'required'=>"required"
                   ]) }}
											<span class="help-block">
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Description in arabic <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
				 {{ Form::textarea('desc_ar', $Main_Item->desc_ar, [
                  'ID'=>'desc_ar',
                   'size' => '15x5',
                   'class'=>'form-control',
                   'aria-describedby'=>"Deschelp" ,
                   'placeholder'=>"in english arabic ..",
                   'required'=>"required"
                   ]) }}
											<span class="help-block">
											</span>
										</div>
									</div>


								</div>
								<div class="tab-pane" id="tab4">
									<h3 class="block">Confirm your account with your company location</h3>
									<h4 class="form-section"> congratulations you are in the last step press confirm to start your way with us  </h4>

							<div class="form-group">
                                    <label class="control-label col-md-12" style="text-align: center;margin-bottom: 40px;">your company location <span class="required">
                                    * </span>
                                    </label>

<div id="map_canvas" style="width:100%; min-height:400px;"></div>
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

  {{ Form::hidden('map_lat','',array('id'=>'txt_lat','required'=>true))}}
  {{ Form::hidden('map_lng','',array('id'=>'txt_lng','required'=>true))}}

                                            <br>


<div class="row">
                        <div class="col-md-6">

<input type="hidden" name="map_latx" id="txt_latx" value="{{$current_location->map_lat}}" class="form-control" pattern= "[0-9]+"  title= "number only" placeholder="lat in decimal format" required>
                        </div>

                        <div class="col-md-6">

<input type="hidden" name="map_lngx" id="txt_lngx" value="{{$current_location->map_lng}}" class="form-control" pattern= "/^-?\d*[.,]?\d*$"  title= "number only" placeholder="lng in decimal format" required>

                    </div>
                </div>


                            </div>






								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<a href="javascript:;" class="btn default button-previous">
									<i class="m-icon-swapleft"></i> Back </a>
									<a href="javascript:;" class="btn blue button-next">
									Continue <i class="m-icon-swapright m-icon-white"></i>
									</a>
									<a href="javascript:document.getElementById('submit_form').submit();" class="btn green button-submit">
									confirm <i class="m-icon-swapright m-icon-white"></i>
									</a>

								</div>
							</div>
						</div>
					</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')

@endsection
@section('extra-footer')
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
</script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/FULL_WEBSITE/assets/js/custom3.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
Profile.init(); // init page demo
var i ={{ count($Sub_Item) }};
var j={{ count($Sub_Item)-1 }};

var y=0;
$('.btnClone').click(function(){

$('.cloneaddresstitle_en:last').clone().attr('name',function(b,c){

    return c.replace("["+j+"]","["+i+"]");

}).removeAttr('value').insertAfter($('.clonephone:last'));

$('.cloneaddresstitle_ar:last').clone().attr('name',function(b,c){

    return c.replace("["+j+"]","["+i+"]");

}).removeAttr('value').insertAfter($('.cloneaddresstitle_en:last'));

$('.addressclone_en:last').clone().attr('name',function(a,e){

    return e.replace("["+j+"]","["+i+"]");

}).removeAttr('value').insertAfter($('.cloneaddresstitle_ar:last'));

$('.addressclone_ar:last').clone().attr('name',function(b,c){

    return c.replace("["+j+"]","["+i+"]");

}).removeAttr('value').insertAfter($('.addressclone_en:last'));

$('.clonephone:last').clone().attr('name',function(b,c){

    return c.replace("["+j+"]","["+i+"]");

}).removeAttr('value').insertAfter($('.addressclone_ar:last'));

 i++;
 j++;
});

});
</script>
<script>
function initMap() {
if(navigator.geolocation){

navigator.geolocation.getCurrentPosition(
//get position
function(position){
    lat = position.coords.latitude.toFixed(5);
    lon = position.coords.longitude.toFixed(5);


var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
var pos = new google.maps.LatLng("{{$current_location->map_lat}}", "{{$current_location->map_lng}}");

  // Set map options
  var myOptions = {
    zoom: 10,
    center: pos,
    panControl: true,
    zoomControl: true,
    scaleControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  // Create map object with options
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  // Create and set the marker


  var marker = new google.maps.Marker({
    position:pos,
    map: map,
    draggable:true,
        animation: google.maps.Animation.DROP,
        title:"just drag the marker!",
        icon: "{{url('/')}}/public/img/marker.png"
        // http://maps.google.com/mapfiles/ms/micons/blue.png
  });

      document.getElementById('txt_lat').value=marker.position.lat();
      document.getElementById('txt_lng').value=marker.position.lng();
  // Register Custom "dragend" Event
  google.maps.event.addListener(marker, 'dragend', function() {
    // Get the Current position, where the pointer was dropped


    var point = marker.getPosition();
    // Center the map at given point
    map.panTo(point);
    // Update the textbox
    document.getElementById('txt_lat').value=point.lat();
    document.getElementById('txt_lng').value=point.lng();
    document.getElementById('txt_latx').value=point.lat();
    document.getElementById('txt_lngx').value=point.lng();
  });


  google.maps.event.addListener(marker, 'click', function(event) {
     placeMarker(event.latLng);
      if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
  });
  function placeMarker(location) {
      marker.setPosition(location);
      document.getElementById('txt_lat').value=location.lat();
      document.getElementById('txt_lng').value=location.lng();
  }




  // Adding a click event to the marker
 // var contentString =  '<center>Drag the <b>Marker</b> to the location you want</center>';
  //var infowindow = new google.maps.InfoWindow({
   // content: contentString
 // });
 // infowindow.open(map,marker);


  },
// if there was an error
function(error){
    alert('please try again later with <b>https</b>');
});
}

      }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGC6jEXbjoOYa_8Z-n3hc5LU26K0IeM&callback=initMap"
        async defer></script>
@include('sweetalert::alert')
@endsection

