@extends('Sales.master')
 <link href="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>


@section('content')
<script>
  $(document).ready(function(){
    alert('wait untill map apears to see your distribution');
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

    @foreach($locations as $location)
  @if($location->lat != '' && $location->lng != '')
  var pos = new google.maps.LatLng("{{$location->lat}}", "{{$location->lng}}");
  var marker{{$location->id}} = new google.maps.Marker({
    position:pos,
    draggable:false,
    map: map,
    url: '//www.google.com/maps/dir/'+lat+','+lon+'/{{$location->lat}}, {{$location->lng}}',

        animation: google.maps.Animation.DROP,
        title:"This a new marker!",
        @if($location->statue==0)
        icon: "//maps.google.com/mapfiles/ms/micons/red.png"
        @elseif($location->statue==1)
        icon: "//maps.google.com/mapfiles/ms/micons/yellow.png"
        @else
        icon: "//maps.google.com/mapfiles/ms/micons/green.png"
        @endif
  });

    var contentString{{$location->id}} =  '<center>click on  <b>Marker</b> to  go to the location you want or <a href="{{ url('/Sales_Dashboard/edit_location') }}/{{ $location->id }}">click here</a> to edit  </center>';
  var infowindow{{$location->id}} = new google.maps.InfoWindow({
    content: contentString{{$location->id}}
  });
  google.maps.event.addListener(marker{{$location->id}}, 'click', function () {
    infowindow{{$location->id}}.open(map,marker{{$location->id}});
     if (marker{{$location->id}}.getAnimation() !== null) {
          marker{{$location->id}}.setAnimation(null);
        } else {
          marker{{$location->id}}.setAnimation(google.maps.Animation.BOUNCE);
        }

   });
     google.maps.event.addListener(marker{{$location->id}}, 'dblclick', function () {
      if (this.url) {
           window.open(this.url, '_blank')
         } else {
               infowindow.open(map, this);
          }
   });

  @endif
  @endforeach
  // Register Custom "dragend" Event







  // Adding a click event to the marker



  },
// if there was an error
function(error){
    alert('please try again later');
});
}

      }

</script>

    <div id="map_canvas" style="width:100%; min-height:800px;"></div>
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


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4rGC6jEXbjoOYa_8Z-n3hc5LU26K0IeM&callback=initMap"
        async defer></script>
<a href=""></a>
@endsection




