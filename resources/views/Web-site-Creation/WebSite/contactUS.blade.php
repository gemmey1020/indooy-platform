<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/img/indooy.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainStyle.css">

    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/ContactStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/ContactResponsive.css">
        <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainResponsive.css">
        <link rel="icon" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/img/logo3.png">

    @if(Config::get('app.locale')=='en')
        @if($item->branch_address_ar =='x')
            <title>
                {{ $item->company_name_ar}}
            Contact page
            </title>
        @else
            <title> {{ $item->company_name_ar}} | {{$item->branch_title_ar}}
             Contact page
         </title>
         @endif
    @else
        @if($item->branch_address_ar =='x')
            <title>
                {{ $item->company_name_ar}}
            اتصل بنا
            </title>
        @else
            <title> {{ $item->company_name_ar}} | {{$item->branch_title_ar}}
             اتصل بنا
         </title>
         @endif
    @endif

    @include('Web-site-Creation.WebSite.navbar')
  <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header_content">

                        <div class="company_descrip" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                            @if($item->branch_address_ar =='x')
                            <h1>{{ $item->company_name_ar}}</h1>
                            <p>{{ $item->company_full_address_ar}}</p>
                            @else

                            <h1>{{ $item->company_name_ar}}  {{$item->branch_title_ar}}</h1>
                            <p>{{ $item->branch_address_ar}}.</p>
                            @endif
                            <p>
                                {{ $item->desc_ar}}
                            </p>
                        </div>
                        <div class="company_info">
                            <ul>
                                <li style="direction: {{ Config::get('app.locale')=='en' ? "rtl" : "ltr" }} ;">
                                    <a href="mailto:{{ $item->business_email }}?subject=contact%20is%20a%20us" title="{{ $item->business_email }}" data-toggle="popover" data-placement="bottom" data-trigger="hover">  {{ trans('landing.mail_us') }}
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </li>
                                @if($item->website_extra)

                                <li style="direction: {{ Config::get('app.locale')=='en' ? "rtl" : "ltr" }} ;">
                                    <a href="{{$item->website_extra}}" target="_blank">
                                        {{ trans('landing.extra_website') }}
                                        <i class="fas fa-globe-africa"></i>
                                    </a>
                                </li>
                                @endif

                                <li style="direction: {{ Config::get('app.locale')=='en' ? "rtl" : "ltr" }} ;">
                                    <a href="https://www.google.com/maps/dir/?api=1&destination={{$item->map_lat}},{{$item->map_lng}}" target="_blank">
                                        {{ trans('landing.road_to') }}
                                        <i class="fas fa-map-marker-alt"></i>
                                    </a>
                                </li>

                                <li style="direction: {{ Config::get('app.locale')=='en' ? "rtl" : "ltr" }} ;">
                                    @if($item->branch_address_ar =='x')
                                      <a href="tel:{{ $item->business_phone }}"title="{{ $item->business_phone }}" data-toggle="popover" data-placement="bottom" data-trigger="hover">
                                          @else
                                      <a href="tel:{{ $item->branch_phone }}"title="{{ $item->branch_phone }}" data-toggle="popover" data-placement="bottom" data-trigger="hover">
                                          @endif
                                        {{ trans('landing.call') }}
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="branches">
        <div class="container">
             <div class="row">
 @if(count($branches_items)>1)




                <div class="col-md-6">

                    <div class="branches_descrip" style="text-align: {{ Config::get('app.locale')=='en' ? "left" : "right" }} ;">
                        <h3>{{ trans('landing.branches') }}</h3>
{{--                         <select name="" id="">
                            <option value="">الكل</option>
                            <option value="">البعض</option>
                            <option value="">الكل</option>
                        </select>
                        <select name="" id="">
                            <option value="">الكل</option>
                            <option value="">البعض</option>
                            <option value="">الكل</option>
                        </select>
                        --}}

                        <div class="branches_descrip_text" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                            @if($item->code !=$MainCode)
<?php
$perma_link=url()->current();
$perma_link=strtolower($perma_link);
$item->code=strtolower($item->code);
$MainCode=strtolower($MainCode);
$new_perma_link=str_replace($item->code,  $MainCode,  $perma_link);
?>
                            <p>
                                 <a href="{{$new_perma_link}}"style="color: black;">
                                  {!! $item->company_full_address_ar !!}

                                </a>
                             </p>
                            @endif
                           <?php $limit=0;?>
                    @for($limit=1;$limit<5;$limit++)
                         @if( $limit>=count($branches_items) )
                            @break
                            @endif

                            @if(
                                $branches_items[$limit]->branch_address_ar!='x' &&
                                $branches_items[$limit]->code !=$item->code &&
                                strtolower($branches_items[$limit]->code) !=strtolower(Request::segment(4))
                                )

                             <p>
<?php
$perma_link=url()->current();
$perma_link=strtolower($perma_link);
$branches_items[$limit]->code=strtolower($branches_items[$limit]->code);
$item->code=strtolower($item->code);
$new_perma_link=str_replace($item->code,  $branches_items[$limit]->code,  $perma_link);
?>

<a href="
{{$new_perma_link}}"
style="color: black;">
                     {!! $branches_items[$limit]->branch_address_ar !!}

</a>
                             </p>
                            @endif



                @endfor
                        </div>

                        <div class="branches_descrip_text_more" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                          @for($limit;$limit<count($branches_items);$limit++)
<?php
$perma_link=url()->current();
$branches_items[$limit]->code=strtolower($branches_items[$limit]->code);
$item->code=strtolower($item->code);
$new_perma_link=str_replace($item->code,  $branches_items[$limit]->code,  $perma_link);
?>
                          @if($branches_items[$limit]->branch_address_ar!='x' && $branches_items[$limit]->code !=$item->code )
                             <p>
                              <a href="{{ $new_perma_link }}"style="color: black;">
                                  {!! $branches_items[$limit]->branch_address_ar !!}
                                  </a>
                             </p>
                              @endif

                @endfor
                        </div>
                        @if(count($branches_items)>5)
                        <button class="more">{{trans('landing.more_txt')}} </button>
                        @endif
                    </div>

                </div>


      @endif
<div id="map_canvas" class="
@if(count($branches_items)>1)
col-md-6
@else
col-md-12
@endif
" style="width:100%; min-height:400px;"></div>
                  </div>

        </div>
    </section>
    <hr class="second_border">

    <section id="videos_embded">
        <div class="container">

            <div class="row">

             <iframe width="560" height="315" src="{{$item->iframe_videos}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin: auto;margin-top: 20px;">
             </iframe>
            </div>
        </div>
    </section>

     <hr class="second_border">
    <section id="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact_image">
                        <img class="img-fluid" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact_us_form" style="text-align: {{ Config::get('app.locale')=='en' ? "left" : "" }} ;">
                        <h3> {{ trans('landing.send_messege_to') }}  {{ $item->company_name_ar}}</h3>
                        <form action="{{ url('/') }}/landing_page/company/inquiry" method="get">
                            <div class="row">
                                <div class="col-4">
                                    <div class="name_form">
                                        <label for="mobile"> {{ trans('landing.mobile') }}</label>
                                        <input id="mobile" name="mobile" type="text" dir="auto" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="email_form">
                                        <label for="email">{{ trans('landing.mail') }}</label>
                                        <input id="email" name="email" type="email" dir="auto" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="Tel_form">
                                        <label for="fullname">{{ trans('landing.name') }} </label>
                                        <input id="fullname" name="fullname" type="text" dir="auto" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <div class="message_form">
                                        <label for="message"> {{ trans('landing.messege') }}</label>
                                        <textarea name="msg" id="" cols="30" rows="5" dir="auto" required> .. </textarea>

                                        <input type="hidden" name="codePage" value="{{ $item->code }}" >

                                    </div>
                                </div>
                            </div>
                            <button type="submit">{{ trans('landing.send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Web-site-Creation.WebSite.footer')
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/Custom.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
    <script>
function initMap() {

var latlng = new google.maps.LatLng("{{$item->map_lat}}", "{{$item->map_lng}}");
  // Set map options
  var myOptions = {
    zoom: 12,
    center: latlng,
    panControl: true,
    zoomControl: true,
    scaleControl: true,
    mapTypeId: google.maps.MapTypeId.HYBRID
  }
  // Create map object with options
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  // Create and set the marker

  var marker = new google.maps.Marker({
    position:latlng,
    map: map,
    url: '//www.google.com/maps/dir/?api=1&destination={{$item->map_lat}}, {{$item->map_lng}}',
    draggable:false,
        animation: google.maps.Animation.DROP,
        title:"مكان المحل",
        icon: "{{url('/')}}/public/img/marker.png"
  });
    google.maps.event.addListener(marker, 'click', function () {
      if (this.url) {
           window.open(this.url, '_blank')
          // Or like this if you want a new tab : window.open(this.url, '_blank');
                   } else {
                                infowindow.open(map, this);
                            }
                        });
var contentString =  '<center><b>{{$item->company_name_ar}}</b></center>';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
infowindow.open(map,marker);

}

</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA14iF26oT-CWkCEb8QGHj1uQ3NUqBUoWI&callback=initMap"
        async defer></script>
</body>
</html>