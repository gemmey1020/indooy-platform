<?php
/*
@if($item->id ==26)
 <script>window.location = "/";</script>
 {{exit()}}
@endif
*/
?>
<!doctype html>
<html lang="ar">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/img/indooy.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/css/mainStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/css/mainResponsive.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>

<meta name="description" content="{{ $item->company_name_ar}}" />
<meta name="keywords" content="{{ $item->keyword_list}}" />
<meta name="author" content="indooy.com">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="email" content="{{ $item->business_email}}">
<meta name="Charset" content="UTF-8">
<META NAME="copyright" CONTENT="Copyright © 2018 indooy.com. All Rights Reserved.">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="1 days">
<title>{{ $item->company_name_ar}}| indooy </title>
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
<script type="application/ld+json"> {
    "@context": "http://schema.org",
    "@type": "Organization",
    "url": "{{ url('/')}}/{{Config::get('app.locale') }}",
    "email": "contact@example.invalid",
    "logo":"{{ url('/public/photos/LandingPages/companies') }}/{{ $item->company_logo }}",
    "name": "{{ $item->company_name_ar }}.",
    "sameAs":"https://www.facebook.com/indoooy",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "http://www.indooy.com/{{ Config::get('app.locale') }}/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }

}
</script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121398762-1"></script><script>
     window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
// gtag('config', 'UA-121398762-1');
gtag('config', 'UA-121398762-1', { 'optimize_id': 'GTM-NPCPTF5'});
        </script>
        <meta property="og:title" content="{{ $item->company_name_ar}}| indooy " />
<meta property="og:description" content="{{ $item->desc_ar}}" />
<meta property="og:image" content="{{ url('/public/photos/LandingPages/companies') }}/{{ $item->company_logo }}" />

<meta property="og:video:width" content="560" />
<meta property="og:video:height" content="340" />
<meta property="og:video:type" content="application/x-shockwave-flash" />
         <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b50749647973ad4"></script>
<script type="text/javascript">
// var addthis_share = {
// url: "{{ url()->current() }}",
// title: " Indooy |{{ $item->company_name_ar }}",
// description: "{{ $item->desc_ar }}",
// media: "{{ url('/') }}/public/photos/LandingPages/companies/{{ $item->company_logo}}"
// }
// </script>
</head>
<body class="body">
    <div class="fadeMe"></div>
    <section id="topbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="social_links" style="float: {{ Config::get('app.locale')=='en' ? "left" : "right" }}">

<a href="http://www.addthis.com/bookmark.php"
 class="addthis_button"
 addthis:url="{{ url()->current() }}"
 addthis:title="Indooy |{{ $item->company_name_ar }}"
 addthis:description="{{ $item->desc_ar }}"
 addthis:media="{{ url('/') }}/public/photos/LandingPages/companies/{{ $item->company_logo}}"
  >
<span style="text-decoration:none; color: black;">{{ trans('landing.share') }}</span></a>

                                <i class="fas fa-share-alt"></i>

                            </button>



                        <ul>
                            @if($item->facebookAcc)
                            <li>
                                <a class="facebook " href="{{ $item->facebookAcc }}"target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            @endif
                            @if($item->twitterAcc)
                            <li>
                                <a class="googleplus" href="{{ $item->twitterAcc }}"target="_blank">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            @endif
                             @if($item->googleAcc)
                            <li>
                                <a class="youtube" href="{{ $item->googleAcc }}">
                                    <i class="fab fa-youtube"target="_blank"></i>
                                </a>
                            </li>
                            @endif
                        </ul>

                </div>
                <div class="translation" style="float: {{ Config::get('app.locale')=='en' ? "right" : "left" }}">

                                @if(Config::get('app.locale')=='en')
                                <?php
                            $current_url=strtolower(url()->full());
                            $link=str_replace('/en/','/ar/',$current_url);
                              ?>
                                <a href="{{ $link }}" class="" style="text-decoration:none; color: black;">
                                عربي
                                @else
                                <?php
                            $current_url=strtolower(url()->full());
                            $link=str_replace('/ar/','/en/',$current_url);
                              ?>
                                <a href="{{ $link }}" class="" style="text-decoration:none; color: black;">
                                english
                                @endif
                                </a>

                </div>
            </div>
        </div>
    </section>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header_content">
                        <div class="card-container">
                            <div class="card">
                                <div class="side">
<img src="{{ url('/') }}/public/photos/LandingPages/companies/{{ $item->company_logo}}" alt="{{ $item->company_name_ar}}" style="height: inherit;">
                                </div>
<!--                                <div class="side back">-->
<!--<img src="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/img/indooy.png" alt="indooy-logo">-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="company_descrip" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                            @if($item->branch_address_ar =='x')
                            <h1>{{ $item->company_name_ar}}</h1>
                            <p>{{ $item->Main_address_ar}}.</p>
                            @else

                            <h1>{{ $item->company_name_ar}} &nbsp {{$item->branch_title_ar}}</h1>
                            <p>{{ $item->branch_address_ar}}.</p>                  @endif
                            <p>
                                {{ $item->desc_ar}}
                            </p>
                        </div>
                        <div class="company_info">
                            <ul>
                                <li>
                                    <a href="mailto:{{ $item->business_email }}?subject=contact%20is%20a%20us" title="{{ $item->business_email }}" data-toggle="popover" data-placement="bottom" data-trigger="hover"> {{ trans('landing.mail_us') }}
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </li>
                                @if($item->website_extra)

                                <li>
                                    <a href="{{$item->website_extra}}" target="_blank">
                                        {{ trans('landing.extra_website') }}
                                        <i class="fas fa-globe-africa"></i>
                                    </a>
                                </li>
                                @endif

                                <li>
                                    <a href="">
                                        {{ trans('landing.road_to') }}
                                        <i class="fas fa-map-marker-alt"></i>
                                    </a>
                                </li>

                                <li>
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
                <div id="map_canvas" class="
@if(count($branches_items)>1)
col-md-6
@else
col-md-12
@endif
" style="width:100%; min-height:400px;"></div>
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
                        </select> --}}

                        <div class="branches_descrip_text" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                            @if($item->code !=$MainCode)
                            <p>
                                 <a href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{$categoryname}}/{{ $MainCode }}/{{str_replace(' ', '_',  $item->company_name_ar)  }}"style="color: black;">
                                  {!! $item->Main_address_ar !!}

                                </a>
                             </p>
                            @endif
                           <?php $limit=0;?>
                    @for($limit=1;$limit<5;$limit++)
                         @if($limit>=count($branches_items))
                            @break
                            @endif

                            @if($branches_items[$limit]->branch_address_ar!='x' && $branches_items[$limit]->code !=$item->code )

                             <p>
                                 <a href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{$categoryname}}/{{ $branches_items[$limit]->code }}/{{str_replace(' ', '_',  $item->company_name_ar)  }}"style="color: black;">
                                  {!! $branches_items[$limit]->branch_address_ar !!}

                                </a>
                             </p>
                            @endif



                @endfor
                        </div>

                        <div class="branches_descrip_text_more" style="direction:{{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                          @for($limit;$limit<count($branches_items);$limit++)
                          @if($branches_items[$limit]->branch_address_ar!='x' && $branches_items[$limit]->code !=$item->code )
                             <p>
                              <a href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{$categoryname}}/{{ $branches_items[$limit]->code }}/{{str_replace(' ', '_',  $item->company_name_ar)  }}"style="color: black;">
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
                    <div class="contact_us_form" style="text-align: {{ Config::get('app.locale')=='en' ? "left" : "right" }} ;">
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
                                <div class="col-4">
                    <!--                <div class="capacha">-->
                    <!--<div class="g-recaptcha" data-sitekey="6Lf1fGMUAAAAAOSdacGaT57Qbpb1GEVFpXqFCO6F"></div>-->

                    <!--                </div>-->
                                </div>
                                <div class="col-8">
                                    <div class="message_form">
                                        <label for="message"> {{ trans('landing.messege') }}</label>
                                        <textarea name="msg" id="" cols="30" rows="5" dir="auto" required> &nbsp </textarea>

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
    <hr>
    <section id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="indooy_search">
                        <div class="indooy_search_logo">
                            <a href="{{url('/')}}/{{ Config::get('app.locale') }}">
                            <img src="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/img/indooy.png" alt="" width="160px">
                                </a>
                        </div>
                        <div class="box">
                            <div class="container-2">
                                <a class="icon search_icon" href="javascript:document.getElementById('yourSearchWay').submit();">
                                    <i class="fa fa-search"></i>
                                </a>
                                <form method="get" id="yourSearchWay" action="{{url('/')}}/{{ Config::get('app.locale') }}/search">
            <input class="search_input search_input ui-autocomplete-input" type="search" id="search" name="q" type="text" id="q" dir="auto" autocomplete="off">
    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-4">
<ul class="first_list"
    @if(Config::get('app.locale')=='en')
    style="float: left;direction:  ltr;"
    @endif
    >
        <li><a href="">{{ trans('main.home_ads') }}</a></li>
        <li><a href="">{{ trans('main.home_business') }}</a></li>
        <li><a href="">{{ trans('main.home_about') }}</a></li>
</ul>
                </div>
                <div class="col-4">
                    <div class="Email">
                        <p>E-mail:contact@example.invalid</p>
                    </div>
                </div>
                <div class="col-4">
<ul class="second_list"
    @if(Config::get('app.locale')=='en')
    style="float: right;direction:  ltr;"
    @endif
    >
               <li><a href="">{{ trans('main.home_privacy') }}</a></li>
                <li><a href="">{{ trans('main.home_item') }}</a></li>
                <li>
    <a href="{{url('/')}}/en/WebSite_Creation">{{ trans('main.home_register') }}</a>
                </li>
                    </ul>
                </div>
            </div>
    </section>
    </div>
    <!--<div id="disqus_thread"></div>-->
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
// (function() { // DON'T EDIT BELOW THIS LINE
// var d = document, s = d.createElement('script');
// s.src = 'https://indooy-1.disqus.com/embed.js';
// s.setAttribute('data-timestamp', +new Date());
// (d.head || d.body).appendChild(s);
// })();
// </script>
 <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/LandingPage/company/assets/js/main.js">
    var more = "{{ trans('landing.more_txt') }}";
    var less="{{ trans('landing.less_txt') }}";
</script>
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