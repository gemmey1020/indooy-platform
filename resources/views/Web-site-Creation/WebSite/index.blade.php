<!doctype html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/img/logo3.png">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/owl.theme.default.css">
<link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainResponsive.css">


<!-- start topbar -->
@include('Web-site-Creation.WebSite.navbar')

   <!-- start header -->
    <section id="header">

            <div class="row">
                <div class="col-2">
                    <div class="card-container">
                        <div class="card">
                            <div class="side">
<img src="{{ url('/') }}/public/photos/FullWebSite/companies/{{ $item->company_logo }}" style="margin-top:0px;height: inherit;" alt="{{ $item->company_name_ar }} logo3.png">
                            </div>
                            <div class="side back">

<img src="{{ url('/') }}/public/img/logo3.png" alt="indooy logo" style="margin-top: 30px;
">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="company_info wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1s" style="direction: {{ Config::get('app.locale')=='en' ? "rtl" : "ltr" }};width: 62%;" >
                        <h3>{{ $item->company_name_ar }}</h3>
                        <h4>{{ $item->company_full_address_ar }}</h4>
                        <p>{{ $item->desc_ar}} </p>

                    </div>

                    <div class="company_contact">
                        <ul>
                            <li class="wow fadeIn" data-wow-delay="1s" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                               <a href="tel:{{ $item->business_phone}}"title="{{ $item->business_phone}}" data-toggle="popover" data-placement="bottom" data-trigger="hover">
                                    <i class="fas fa-phone"></i>
                                    {{ trans('landing.call') }}
                                </a>
                            </li>
                            <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="1.5s" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                                <a href="https://www.google.com/maps/dir/?api=1&destination={{$item->map_lat}},{{$item->map_lng}}" target="_blank">
                                    <i class="fas fa-map-marker-alt"></i>
                                   {{ trans('landing.road_to') }}
                                </a>
                            </li>
                            <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="2s" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                                <a href="{{ $item->website_extra }}" target="_blank">
                                    <i class="fas fa-globe-africa"></i>
                                    {{ trans('landing.extra_website') }}
                                </a>
                            </li>
                            <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="2.5s" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                                <a href="mailto:{{ $item->business_email }}?subject=contact%20is%20a%20us" title="{{ $item->business_email }}" data-toggle="popover" data-placement="bottom" data-trigger="hover">
                                    <i class="fas fa-envelope"></i>
                                    {{ trans('landing.mail_us') }}
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

    </section>


    <!-- start slider -->
    <section id="slider">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel ">
            <div class="carousel-inner">
<?php
$counter=0;
?>
                @foreach($sliders as $slider)

                <div class="carousel-item {{ $counter==0 ? "active" : "" }}">
                    <img class="d-block w-100" src="{{ url('/') }}/public/photos/FullWebSite/companies/sliders/{{ $slider->slider_photo }}" alt="First slide" height="400px">
                </div>
<?php
$counter+=1;
?>
                @endforeach
            </div>
            @if(count($sliders)>1)
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">

<i class="fas fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
<i class="fas fa-angle-right"></i>
            </a>
            @endif
        </div>
    </section>

    <!-- start content -->

    <section id="content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <div class="right_content">
                            <img class="img-fluid" src="" alt="">
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="row content_descrip">
                            <div class="col-12">

                                <div class="content_info  " data-wow-delay="1s">
                                    <h2>{{ trans('website/index.who_are_we') }} </h2>
                                    <p style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;"> {{ $item->desc_ar }}
                                    </p>
                                </div>
                                <hr>
                            </div>


                            <div class="col-12">

                                <div class="content_info " data-wow-duration="1s" data-wow-delay="1.5s">
                                    <h2>{{ trans('website/index.our_vision') }}</h2>
                                    <p style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">{{ $item->vision_ar }}
                                    </p>
                                </div>
                                <hr>
                            </div>


                            <div class="col-12">

                                <div class="content_info "  data-wow-duration="1s" data-wow-delay="2s">
                                    <h2> {{ trans('website/index.our_mission') }}</h2>
                                    <p style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">{{ $item->mission_ar }}
                                    </p>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="left_content">
                            <img class="img-fluid" src="" alt="">
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>




    <!-- start brands -->

    <section id="brands" style="direction:ltr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brands_header">
                        <?php
                        $client_type ="website/index.client_type_". $item->client_type ;
                        ?>
                        <h2>{{ trans($client_type) }}</h2>
                    </div>
                </div>
            </div>
            <div class=" owl-carousel owl-theme">

                @foreach($clients as $client)
                <div class="item">
                    <a href="">
<img class="img-fluid" src="{{ url('/') }}/public/photos/FullWebSite/companies/clients/{{ $client->client_photo }}" alt="" height="150px"
style="
width: 150px;
height: 150px;
border-radius: 42px;"
>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- start bottom adv -->
    <section id="bottom_adv">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bottom_adv_content">
                        مساحة اعلانية
                        <img class="img-fluid" src="" alt="">
                    </div>
                </div>
            </div>
        </div>


    </section>
@include('Web-site-Creation.WebSite.footer')

<!-- start loading screen -->
<div class="loading">
<div class="spinner">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>


</div>







<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/owl.carousel.js"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/wow.min.js"></script>
    <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/Main.js"></script>

    <script>
        new WOW().init();
        </script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
</body>

</html>