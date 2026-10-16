<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="alternate" href="{{url('/')}}" hreflang="x-default" />
<link rel="icon" href="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/mainStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/indooyResponsive.css">
    <meta name="google-site-verification" content="q_cEFtvw1xY1WEPdkVxtXbqlQlZ33a6xOG4_xnBkimk" />

<meta name="description" content="تسمح اندوى لاى شركة او صاحب مهنة او عمل حر بالوللوج الى محرك البحث اندوى  لانشاء منصة الكترونية ( موقع الكترونى / ويب سايت ) على محرك البحث اندوى  مجانا من خلال اضافة البينات الاساسية مثل عنوان المقر الرئيسى وعناوين الفروع وارقام التليفون الارضى والموبايل وايميل للتواصل ولينكات السوشيال ميديا والموقع الالكترونى الخارجى كما تسمح ايضا باضافة المعلومات التجارية مثل وصف للشركة وانشطتها واعمالها والماركات التى تعمل بها وعملائها المميزين وصور معبرة عن المنتجات او الخدمات واضافة الاسعار والعروض .العناوين والفروع" />
<meta name="keywords" content="بحث اندوي ,اندوي,محرك بحث,دليل الشركات,دليلك,المهن الحرة,المواضيع الهامة " />
<meta name="author" content="indooy.com">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="email" content="contact@example.invalid">
<meta name="Charset" content="UTF-8">
<META NAME="copyright" CONTENT="Copyright © 2018 indooy.com. All Rights Reserved.">
<meta name="robots" content="index, follow">

<meta name="revisit-after" content="1 days">
<title>indooy | for your needed search</title>
<style>.async-hide { opacity: 0 !important} </style>
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
        <!--google-site-verification=-->
        <meta name="google-site-verification" content="q_cEFtvw1xY1WEPdkVxtXbqlQlZ33a6xOG4_xnBkimk">
  </head>
  <body>
      <section id="search">
<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="search_logo">
    <h1>
            <img class="img-fluid"  src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="logo_indooy">
</h1>

</div>
        </div>

<div class="col-md-12 search_box_content ">
    <div class="search_box">
     <form method="get" id="yourSearchWay"action="{{url('/')}}/{{ Config::get('app.locale') }}/search">
            <input class="search_input" name="q" type="text" id="q" dir="auto">
            <input class="" name="type" type="hidden" id="type" dir="auto" value="">
    <a class="search_icon" href="javascript:document.getElementById('yourSearchWay').submit()">
        <i class="fas fa-search"></i>
    </a>
    </div>
     <div id="suggesstion-box" class="col-10 col-md-10"></div>
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>

</div>

<div class="col-md-12 search_button_content ">
<div class="search_button">

        <button id="submit_a" type="submit" disabled>{{ trans('main.company_search') }}  </button>
         <button id="submit_b" type="submit" disabled> {{ trans('main.freelancer_search') }} </button>
          <button id="submit_c" type="submit" disabled style="
    display:  none;">{{ trans('main.blogs_search') }} </button>
         </form>
      <h1><p>{{ trans('main.most_common_search') }}</p></h1>
</div>

</div>

<div class="col-md-12">
    <div class="most_searches">
        <ul>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_Lawyers') }}">{{ trans('main.home_Lawyers') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_construction') }}">
              {{ trans('main.home_construction') }}
            </a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_real_estates') }}">
              {{ trans('main.home_real_estates') }}
            </a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_Recruit') }}">
              {{ trans('main.home_Recruit') }}
            </a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_hotels') }}">
              {{ trans('main.home_hotels') }}
            </a></li>
             <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_bank') }}">{{ trans('main.home_bank') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_haulage') }}">{{ trans('main.home_haulage') }}</a></li>


        </ul>

        <ul>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_doctors') }}">{{ trans('main.home_doctors') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_restaurants') }}">{{ trans('main.home_restaurants') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_tourism') }}">{{ trans('main.home_tourism') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_cafe') }}">{{ trans('main.home_cafe') }}</a></li>
            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}/search?q={{ trans('main.home_translation') }}">{{ trans('main.home_translation') }}</a></li>

            <li><a href="{{url('/')}}/{{ Config::get('app.locale') }}">{{ trans('main.home_more') }}</a></li>


        </ul>
    </div>
</div>

    </div>
</div>

      </section>

      <section id="footer">
     <div class="container-fluid">
<div class="row">
<div class="col-md-12 first_footer">
   @if(Config::get('app.locale')=='en')
        <a href="{{ url('/ar') }}" style="float: right;direction:ltr;color: #666;">عربي</a>
        @else
        <a href="{{ url('/en') }}" style="float: left;direction:ltr;color: #666;">English</a>
   @endif
</div>
<div class="col-md-12 second_footer">
    <ul class="first_list"
    @if(Config::get('app.locale')=='en')
    style="float: left;direction:  ltr;">
    @endif
        <li><a href="">{{ trans('main.home_ads') }}</a></li>
        <li><a href="">{{ trans('main.home_business') }}</a></li>
        <li> <a href="">{{ trans('main.home_about') }}</a></li>
    </ul>

    <ul class="second_list"
    @if(Config::get('app.locale')=='en')
    style="float: right;direction:  ltr;">
    @endif
        <li><a href="">{{ trans('main.home_privacy') }}</a></li>
        <li><a href="">{{ trans('main.home_item') }}</a></li>
        <li>    <a href="{{url('/')}}/en/WebSite_Creation">{{ trans('main.home_register') }}</a></li>
    </ul>
</div>
</div>
</div>
      </section>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script src="{{url('/')}}/resources/views/site/assets/js/custom2.js"></script><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css"> <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script><script type="application/ld+json">{"@context": "http://schema.org", "@type": "Organization", "url": "http://indooy.com/{{ Config::get('app.locale') }}", "email" : "contact@example.invalid", "logo":"http://www.indooy.com/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png", "name": "indooy.", "sameAs":"https://www.facebook.com/indoooy", "potentialAction":{"@type": "SearchAction", "target": "http://www.indooy.com/{{ Config::get('app.locale') }}/search?q={search_term_string}", "query-input": "required name=search_term_string"}, "address" :{"@type" : "PostalAddress", "addressLocality" : "cairo", "addressCountry" : "egypt", "postalCode" : "11513"}}</script>
   <script>
$( ".search_icon" ).click(function() {
     if ($('#q').val()==''){
  $("#yourSearchWay").attr("action", "");
     }
});

   </script>

  </body>
</html>