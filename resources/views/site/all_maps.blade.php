<?php
$current_url=strtolower(url()->full());

?>
<!doctype html>
<html lang="ar">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="{{ url('/') }}/resources/views/site/assets/img/logo2.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/searchStyle.css">
<link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/indooyResponsive.css">

<meta name="description" content="تسمح اندوى لأى مستخدم بالوصول الى بينات ومعلومات الشركات التجارية او اصحاب المهن والاعمال الحرة مجاناً بما يشمل ذلك من ارقام التليفونات والايميل والعناوين والفروع" />
<meta name="keywords" content="بحث اندووي ,اندووي,محرك بحث,دليل الشركات,دليلك,المهن الحرة,المواضيع الهامة " />
<meta name="author" content="indooy.com">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="email" content="contact@example.invalid">
<meta name="Charset" content="UTF-8">
<META NAME="copyright" CONTENT="Copyright © 2018 indooy.com. All Rights Reserved.">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>
@if(Config::get('app.locale')=='en')
indooy | maps
@else
خرائط اندووي
@endif
</title>


<style>.async-hide { opacity: 0 !important} </style>
<style>
  .popover-body {
    display: none !important;
}
</style>
<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-NPCPTF5':true});</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121398762-1"></script><script>
window.dataLayer = window.dataLayer || [];

function gtag() {
dataLayer.push(arguments);
}
gtag('js', new Date());
// gtag('config', 'UA-121398762-1');
gtag('config', 'UA-121398762-1', { 'optimize_id': 'GTM-NPCPTF5'});
</script>

</head>
<body>
<section id="search_header">
<div class="container">
<div class="row">
<div class="col-2 col-md-2">
<div class="search_logo">
<a href="{{ url('/') }}/{{ Config::get('app.locale') }}">
<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="indooy-logo">
</a>
</div>
</div>
<div class="col-10 col-md-10">
<div class="search_box_tabs">
<form method="get" action="{{url('/')}}/{{ Config::get('app.locale') }}/search" id="yourSearchWay">
<input class="search_input" type="text" name="q" id="q" dir="auto" value="">
<a class="search_icon" href="javascript:document.getElementById('yourSearchWay').submit()">
<i class="fas fa-search"></i>
</a>
</form>
<div id="suggesstion-box"></div>
<span class="glyphicon glyphicon-search form-control-feedback"></span>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
aria-selected="true">{{ trans('search.search_all') }}</a>
</li>
<li class="nav-item" style="
    margin-left:  20px;
">
<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
aria-selected="false">{{ trans('search.search_photo') }}</a>
</li>
<li class="nav-item" style="
    margin-left:  20px;
">
<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
aria-selected="false">{{ trans('search.search_news') }}</a>
</li>


<li class="nav-item" style="
    margin-left:  20px;
">
<a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">{{ trans('search.search_videos') }}</a>
</li>


<li class="nav-item" style="
    margin-left:  20px;
">
<a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">{{ trans('search.search_books') }}</a>
</li>


<li class="nav-item" style="
    margin-left:  20px;
">
<a class="nav-link" href="{{ url('/') }}/{{ Config::get('app.locale') }}/maps" role="tab" aria-controls="pills-contact" aria-selected="false">{{ trans('search.search_maps') }}</a>
</li>


<li class="nav-item" style="
    margin-left:  20px;
">

<a class=""
style="display: block;
       padding: .5rem 1rem;"
 role="tab"
 aria-controls="pills-contact"
 aria-selected="false"
  @if(Config::get('app.locale')=='en')
  <?php
  $link=str_replace('/en/','/ar/',$current_url);
  ?>
href="{{ $link }}">عربي
  @else
  <?php
  $link=str_replace('/ar/','/en/',$current_url);
  ?>
href="{{ $link }}">English
@endif
</a>
</li>
</ul>
</div>
</div>
</div>
</div>

</section>

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





<!--<section id="search_footer">-->
<!--<div class="container">-->
<!--<div class="row">-->
<!--<div class="col-md-12">-->
<!--<div class="footer_logo">-->
<!--<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="indooy-logo">-->
<!--</div>-->



<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</section>-->







<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


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
  @if($location->map_lat != '' && $location->map_lng != '')
  var pos = new google.maps.LatLng("{{$location->map_lat}}", "{{$location->map_lng}}");
  var marker{{$location->LocationID}} = new google.maps.Marker({
    position:pos,
    draggable:false,
    map: map,
    url: '//www.google.com/maps/dir/'+lat+','+lon+'/{{$location->map_lat}}, {{$location->map_lng}}',

        animation: google.maps.Animation.DROP,

    @if(Config::get('app.locale')=='en')
       title:"welcome to {{$location->company_name_en}}",
    @else
        title:"مرحبا في {{$location->company_name_ar}}",
    @endif
        icon: "{{url('/')}}/public/img/marker.png"
  });
 @if(Config::get('app.locale')=='en')
    var contentString{{$location->LocationID}} =  '<center>double click on  <b>Marker</b> to  go to the location you want </center>';
    @else
     var contentString{{$location->LocationID}} =  '<center>اضغط هنا مرتين لكي  تذهب الي هذا المكان  ';
    @endif
  var infowindow{{$location->LocationID}} = new google.maps.InfoWindow({
    content: contentString{{$location->LocationID}}
  });
  google.maps.event.addListener(marker{{$location->LocationID}}, 'click', function () {
    infowindow{{$location->LocationID}}.open(map,marker{{$location->LocationID}});
     if (marker{{$location->LocationID}}.getAnimation() !== null) {
          marker{{$location->LocationID}}.setAnimation(null);
        } else {
          marker{{$location->LocationID}}.setAnimation(google.maps.Animation.BOUNCE);
        }

   });
     google.maps.event.addListener(marker{{$location->LocationID}}, 'dblclick', function () {
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA14iF26oT-CWkCEb8QGHj1uQ3NUqBUoWI&callback=initMap"
        async defer></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->


<script src="{{ url('/') }}/resources/views/site/assets/js/custom2.js"></script>
<script type="application/ld+json">{"@context": "http://schema.org", "@type": "Organization", "url": "http://indooy.com/{{ Config::get('app.locale') }}", "email" : "contact@example.invalid", "logo":"http://www.indooy.com/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png", "name": "indooy.", "sameAs":"https://www.facebook.com/indoooy", "potentialAction":{"@type": "SearchAction", "target": "http://www.indooy.com/{{ Config::get('app.locale') }}/search?q={search_term_string}", "query-input": "required name=search_term_string"}, "address" :{"@type" : "PostalAddress", "addressLocality" : "cairo", "addressCountry" : "egypt", "postalCode" : "11513"}}</script>
</body>