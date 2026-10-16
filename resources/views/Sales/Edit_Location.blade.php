@extends('Sales.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>


@section('content')
<script>
  $(document).ready(function(){
    alert('wait untill map apears and drag the marker to add the location');
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
var pos = new google.maps.LatLng("{{$current->lat}}", "{{$current->lng}}");

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
    draggable:false,
        animation: google.maps.Animation.DROP,
        title:"This a new marker!",
        @if($current->statue==0)
        icon: "//maps.google.com/mapfiles/ms/micons/red.png"
        @elseif($current->statue==1)
        icon: "//maps.google.com/mapfiles/ms/micons/yellow.png"
        @else
        icon: "//maps.google.com/mapfiles/ms/micons/green.png"
        @endif
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
  var contentString =  '<center>Drag the <b>Marker</b> to the location you want</center>';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  infowindow.open(map,marker);


  },
// if there was an error
function(error){
    alert('please try again later');
});
}

      }

</script>

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
{{ Form::open(array('url' => 'Sales_Dashboard/edit_location/'.$current->id.'/','role' => 'form','id' => 'sendform','class' => 'form-horizontal form-groups-bordered','files'=> true)) }}
<div class="row">
              {{ Form::hidden('map_lat','',array('id'=>'txt_lat'))}}
              {{ Form::hidden('map_lng','',array('id'=>'txt_lng'))}}
                <div class="col-md-offset-3 col-md-9">
                  <fieldset>
                  <div class="col-md-6 col-lg-6">
                <label for="Main Program">location statue </label>
                    {{Form::select('location_staue',[0=>'Follow up',1=>'Inquery',2=>'Offer'],$current->statue,array(
                     'class'        => 'form-control',
                     'id'         =>"Main Program",
                     'aria-describedby'   =>"nameHelp" ,

                    ))}}

                <label for="company_name">company name </label>
                    {{Form::text('company_name',$current->company_name,array(
                     'class'        => 'form-control',
                     'id'           =>"company_name",
                     'aria-describedby'   =>"nameHelp" ,

                    ))}}
                    <label for="company_email">company email </label>
                    {{Form::email('company_email',$current->company_email,array(
                     'class'        => 'form-control',
                     'id'           =>"company_email",
                     'aria-describedby'   =>"nameHelp" ,
                     'required'           =>true

                    ))}}
                <label for="company_num">contact number </label>
                    {{Form::text('company_num',$current->company_num,array(
                     'class'        => 'form-control',
                     'id'           =>"company_num",
                     'aria-describedby'   =>"nameHelp" ,
                     'required'           =>true

                    ))}}

                <label for="note">note ? </label>
                    {{Form::textarea('note', $current->note ,array(
                     'class'        => 'form-control',
                     'id'           =>"note",
                     'aria-describedby'   =>"nameHelp" ,

                    ))}}
      <button type="submit" class="btn btn-success">save a location</button>
           </fieldset>

                 </div>

                </div>
</div>
{{ Form::close() }}






















    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGC6jEXbjoOYa_8Z-n3hc5LU26K0IeM&callback=initMap"
        async defer></script>

@endsection




