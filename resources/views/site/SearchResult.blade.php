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
indooy | for {{ $query_search }} result
@else
اندووي لنتائج بحث  {{ $query_search }}
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
<input class="search_input" type="text" name="q" id="q" dir="auto" value="{{ $query_search }}">
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

<section id="search_content">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="result_number">
    @if(Config::get('app.locale')=='en')

<p>about {{$total}} results {{$executionTime}} seconds</p>            </div>
    @else
<p>حوالي {{$total}} من النائج عدد الثواني {{$executionTime}}</p>            </div>
    @endif
</div>
</div>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


</div>


@foreach($results as $item)
@if(!empty($item->statue))


<div class="row full_description">

<div class="col-2 col-md-2">
<div class="company_logo">
@if(empty($item->vision_en))
<img class="img-fluid"  src="{{ url('/') }}/public/photos/LandingPages/companies/{{ $item->company_logo }}" alt="{{ $item->company_name_en }}">
@else
<img class="img-fluid"  src="{{ url('/') }}/public/photos/FullWebSite/companies/{{ $item->company_logo }}" alt="{{ $item->company_name_en }}">
@endif

</div>
</div>
<div class="col-10 col-md-10">
<div class="description">


@if($item->branch_phone !='x')
@if(!empty($item->vision_en))
<a href="{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}/contact-us">
@else
<a href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}">
  @endif
{{ $item->company_name_ar }}&nbsp{{ $item->branch_title_ar }}
</a>
@if(!empty($item->vision_en))
<a  class="main_link"href="{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}/contact-us">{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}/contact-us"</a>
@else
<a  class="main_link"href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar)  }}">{{ url('/') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ $item->company_name_ar }}</a>
@endif
@else
@if(!empty($item->vision_en))
<a href="{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}">
{{ $item->company_name_ar }}
</a>
@else
<a href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar)  }}">
{{ $item->company_name_ar }}
</a>
@endif
@if(!empty($item->vision_en))
<a  class="main_link"href="{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}">{{ url('/') }}/{{ Config::get('app.locale') }}/website/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar) }}</a>
@else
<a  class="main_link"href="{{ url('/') }}/{{ Config::get('app.locale') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ str_replace(' ', '_',  $item->company_name_ar)  }}">{{ url('/') }}/profile/{{ $item->name_ar}}/{{ $item->code }}/{{ $item->company_name_ar }}</a>
@endif
@endif
</a>

<p>
{{ str_limit($item->desc_ar,250) }}
</p>
<div class="social_links">
@if($item->branch_phone =='x' && $item->branch_address_en =='x')
<a href="tel:{{ $item->business_phone }}">
  <img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/icons/Untitled-1.png" alt="indooy call" title="{{ $item->business_phone }}" data-toggle="popover" data-placement="left" data-trigger="hover">

@else
<a href="tel:{{ $item->branch_phone }}">
  <img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/icons/Untitled-1.png" alt="indooy call" title="{{ $item->branch_phone }}" data-toggle="popover" data-placement="left" data-trigger="hover">
@endif


</a>
<a href="mailto:{{ $item->business_email }}?subject=contact%20is%20a%20us">
<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/icons/Untitled-2.png" alt="{{ $item->company_name_ar }} name" title="{{ $item->business_email }}" data-toggle="popover" data-placement="left" data-trigger="hover">
</a>
<a href="https://www.google.com/maps/dir/?api=1&destination={{$item->map_lat}},{{$item->map_lng}}" target="_blank">
<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/icons/Untitled-3.png" alt="">
</a>
@if($item->website_extra)
<a href="{{$item->website_extra}}" target="_blank">
<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/icons/Untitled-4.png" alt="">
</a>
@endif
</div>
</div>
</div>
</div>
@endif
@endforeach
</div>

</div>





</section>

<section id="another_results">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="another_results_header">
<p>عمليات بحث متعقلة ب شركة عقارات</p>
</div>
</div>
</div>

<div class="row">
<div class="col-6 col-md-3">
<div class="list">
<ul>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>

</ul>
</div>
</div>

<div class="col-6 col-md-3">
<div class="list">
<ul>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>
<li><a href="">شركة التطوير العقاري في مصر</a></li>

</ul>
</div>
</div>

</div>

</div>

</section>

<section id="search_footer">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="footer_logo">
<img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="indooy-logo">
</div>


<nav aria-label="Page navigation example">
{{ $results->appends([
'q' => $query_search,
'type'=>$query_type
])->setpath(url()->current())->links() }}
</nav>

</div>
</div>
</div>
</section>







<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"-->
<!--crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--(function(){-->
<!--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--s1.async=true;-->
<!--s1.src='https://embed.tawk.to/5b9a6211c9abba579677801b/default';-->
<!--s1.charset='UTF-8';-->
<!--s1.setAttribute('crossorigin','*');-->
<!--s0.parentNode.insertBefore(s1,s0);-->
<!--})();-->
<!--</script>-->
<!--End of Tawk.to Script-->
<!-- Start of LiveChat (www.livechatinc.com) code -->
<!--<script type="text/javascript">-->
<!--window.__lc = window.__lc || {};-->
<!--window.__lc.license = 10123257;-->
<!--(function() {-->
<!--  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;-->
<!--  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';-->
<!--  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);-->
<!--})();-->
<!--</script>-->
<!--<noscript>-->
<!--<a href="https://www.livechatinc.com/chat-with/10123257/">Chat with us</a>,-->
<!--powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener" target="_blank">LiveChat</a>-->
<!--</noscript>-->
<!-- End of LiveChat code -->
<script src="{{ url('/') }}/resources/views/site/assets/js/custom2.js"></script>
<script type="application/ld+json">{"@context": "http://schema.org", "@type": "Organization", "url": "http://indooy.com/{{ Config::get('app.locale') }}", "email" : "contact@example.invalid", "logo":"http://www.indooy.com/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png", "name": "indooy.", "sameAs":"https://www.facebook.com/indoooy", "potentialAction":{"@type": "SearchAction", "target": "http://www.indooy.com/{{ Config::get('app.locale') }}/search?q={search_term_string}", "query-input": "required name=search_term_string"}, "address" :{"@type" : "PostalAddress", "addressLocality" : "cairo", "addressCountry" : "egypt", "postalCode" : "11513"}}</script>
</body>