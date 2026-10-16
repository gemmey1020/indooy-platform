@extends('Web-site-Creation.master')
<!-- BEGIN THEME STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
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
					<i class="fa fa-code"></i> WebSite Creation process - <span class="step-title">
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
				'url'    => '/en/WebSite_Creation/create_landing',
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
						<img src="https://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
					</div>
					<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
					</div>
					<div>
						<span class="btn default btn-file">
						<span class="fileinput-new">
						Select image </span>
						<span class="fileinput-exists">
						Change </span>
						<input type="file" id="company_logo" name="company_logo" required>
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
											<input type="text" class="form-control" name="company_name_en" required/>
											<span class="help-block">
											english name </span>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" name="company_name_ar" required/>
											<span class="help-block">
											arabic name </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">business e-mail <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="email" class="form-control" name="business_email" required />
											<span class="help-block">
											the main one. </span>
											<input type="hidden" class="form-control" name="customer_name" value="{{ Auth::guard('web_WebSite_Creation')->user()->name }}" />
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">classify your company<span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<select name="category_list" id="category_list" class="form-control"required>
													<option value=""></option>
											@foreach($categories as $item)
										<option value="{{$item->id}}">{{$item->name_en}}</option>
										@endforeach

											</select>
										</div>
									</div>
										<div class="form-group">
										<label class="control-label col-md-3">write 5 keywords for your company in english<span class="required">
										* </span>
										</label>

										<div class="col-md-2">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control"required>

							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_en[]" id="keyword_list" class="form-control"required>
							</div>
											<span class="required">
										 		</span>


									</div>

										<div class="form-group">
										<label class="control-label col-md-3">write 5 keywords for your company in arabic<span class="required">
										* </span>
										</label>

										<div class="col-md-2">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control"required>

							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control"required>
							</div>
							<div class="col-md-1">
								<input type="text" name="keyword_list_ar[]" id="keyword_list" class="form-control"required>
							</div>
											<span class="required">
										 		</span>


									</div>

									<div class="form-group">
										<label class="control-label col-md-3">comapny head office <span class="required">
										* </span>
										</label>

										<div class="col-md-2">

{{Form::select('country_list',$country_list,null,array(
'class'        => 'form-control col-md-5',
'id'           =>"country_list",
'aria-describedby'   =>"nameHelp" ,
'required' =>'required'
))}}


										</div>
										<div class="col-md-2">
											<select name="cities_list" id="cities_list" class="form-control"required>
                                                    <option value=""></option>

                                            </select>
											<span class="required">
										 		</span>

										</div>
										<div class="col-md-2">
										<select name="district_list" id="district_list" class="form-control"required>
                                                    <option value=""></option>
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
											<input type="text" name="Main_address_en" id="address" class="form-control" placeholder=" fill it in english" required>

											<input type="text" name="Main_address_ar" id="address" class="form-control" placeholder=" fill it in arabic" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">business phone <span class="required">
										* </span>
										</label>
										<div class="col-md-6">
											<input type="text" name="business_phone" id="business_phone" class="form-control" required>


										</div>
									</div>


								</div>
								<div class="tab-pane" id="tab2">
									<div class="form-group">
										<label class="control-label col-md-3">you have branches ? <span class="required">
										* </span>
										</label>
										<div class="col-md-6">

										    <input type="text" name="cloneaddresstitle_en[]" id="addressclone_en" class="form-control cloneaddresstitle_en"placeholder="write the brach name in english">
										    <input type="text" name="cloneaddresstitle_ar[]" id="addressclone_en" class="form-control cloneaddresstitle_ar"placeholder="write the brach name in arabic">


		<input type="text" name="address_en[]" id="addressclone_en" class="form-control addressclone_en"placeholder="write the full address in english">
		<input type="text" name="address_ar[]" id="addressclone_ar" class="form-control addressclone_ar"placeholder="write the full address in arabic">

											<input type="text" name="address_telephone[]" id="addressclone_enx" class="form-control clonephone" placeholder="branch's phone">
												<br>
										<button type="button" class="btn blue btnClone">add more</button>

										</div>

									</div>
									<div class="form-group">
										<label class="control-label col-md-3">you have a website ?
										</label>
										<div class="col-md-6">
										    <input type="text" name="website_extra" id="website_extra" class="form-control"placeholder="write your website link">

												<br>


										</div>

									</div>
										<div class="form-group">
										<label class="control-label col-md-3">your social media contacts <span class="required">
										* </span>
										</label>
										<div class="col-md-6">

									<div class="input-group">
										<input type="url" class="form-control input-circle-left" placeholder="facebook page" name="SocFacebook">
										<span class="input-group-addon input-circle-right">
										<i class="fa fa-facebook-square"></i>
										</span>

								</div>
								<hr>
									<div class="input-group">
										<input type="url" class="form-control input-circle-left" placeholder="google+ page" name="SocGoogle" >
										<span class="input-group-addon input-circle-right">
										<i class="fa fa-twitter-square"></i>
										</span>

								</div>
								<hr>
									<div class="input-group">

										<input type="url" class="form-control input-circle-left" placeholder="youtube page" name="SocYoutube">
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
				 {{ Form::textarea('desc_en', null, [
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
				 {{ Form::textarea('desc_ar', null, [
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
									<h3 class="block">Confirm your account</h3>
									<h4 class="form-section"> congratulations you are in the last step press confirm to start your way with us  </h4>



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
<label class="control-label col-md-12" style="text-align: left;margin-bottom: 20px;">or just fill this fields  <span class="required">
                                    * </span>
                                    </label>

<div class="row">
                        <div class="col-md-6">

<input type="hidden" name="map_latx" id="txt_latx" value="" class="form-control" pattern= "[0-9]+"  title= "number only" placeholder="lat in decimal format" required>
                        </div>

                        <div class="col-md-6">

<input type="hidden" name="map_lngx" id="txt_lngx" value="" class="form-control" pattern= "/^-?\d*[.,]?\d*$"  title= "number only" placeholder="lng in decimal format" required>

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
<script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/FULL_WEBSITE/assets/js/custom3.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
</script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
Profile.init(); // init page demo
var i = 1;
var j=0;

var y=0;
$('.btnClone').click(function(){

$('.cloneaddresstitle_en:first').clone().attr('name',function(b,c){

    return c.replace("[]","["+i+"]");

}).removeAttr('value').insertAfter($('.clonephone:last'));

$('.cloneaddresstitle_ar:first').clone().attr('name',function(b,c){

    return c.replace("[]","["+i+"]");

}).removeAttr('value').insertAfter($('.cloneaddresstitle_en:last'));

$('.addressclone_en:first').clone().attr('name',function(a,e){

    return e.replace("[]","["+i+"]");

}).removeAttr('value').insertAfter($('.cloneaddresstitle_ar:last'));

$('.addressclone_ar:first').clone().attr('name',function(b,c){

    return c.replace("[]","["+i+"]");

}).removeAttr('value').insertAfter($('.addressclone_en:last'));

$('.clonephone:first').clone().attr('name',function(b,c){

    return c.replace("[]","["+i+"]");

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


  // Set map options
  var myOptions = {
    zoom: 10,
    center: latlng,
    panControl: true,
    zoomControl: true,
    scaleControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  // Create map object with options
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  // Create and set the marker


  var marker = new google.maps.Marker({
    position:latlng,
    map: map,
    draggable:true,
        animation: google.maps.Animation.DROP,
         title:"just drag the marker!",
         icon: "{{url('/')}}/public/img/marker.png"
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

