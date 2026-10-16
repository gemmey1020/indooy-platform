@extends('SalesManagers.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

@section('content')
<div id="map_canvas" style="width:100%; min-height:400px;"></div>
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
        title:"This a new marker!",
        icon: "http://maps.google.com/mapfiles/ms/micons/blue.png"
  });

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


  google.maps.event.addListener(map, 'click', function(event) {
     placeMarker(event.latLng);
  });
  function placeMarker(location) {
      marker.setPosition(location);
      document.getElementById('txt_lat').value=location.lat();
      document.getElementById('txt_lng').value=location.lng();
  }




  // Adding a click event to the marker
  var contentString =  '<center>اسحب وافلت فى موقعك على الخريطة</center>';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  infowindow.open(map,marker);


  },
// if there was an error
function(error){
    alert('لن تتمكن من تحديد موقعك');
});
}

      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGC6jEXbjoOYa_8Z-n3hc5LU26K0IeM&callback=initMap"
        async defer></script>
@endsection




