<?php
/*
@if($item->id ==6)
 <script>window.location = "/";</script>
 {{exit()}}
@endif
*/
?>
    <style>.async-hide { opacity: 0 !important} </style>
<style>
  .popover-body {
    display: none !important;
}
</style>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{ $item->company_name_ar}}| indooy" />
<meta property="og:description"        content="{{ $item->company_name_ar}}" />
<meta property="og:image"              content="{{ url('/') }}/public/photos/FullWebSite/companies/{{ $item->company_logo }}" />

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b50749647973ad4"></script>

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
</head>

<body>
    <?php
     function cut_string_using_last($character, $string, $side, $keep_character=true) {
        $offset = ($keep_character ? 1 : 0);
        $whole_length = strlen($string);
        $right_length = (strlen(strrchr($string, $character)) - 1);
        $left_length = ($whole_length - $right_length - 1);
        switch($side) {
            case 'left':
                $piece = substr($string, 0, ($left_length + $offset));
                break;
            case 'right':
                $start = (0 - ($right_length + $offset));
                $piece = substr($string, $start);
                break;
            default:
                $piece = false;
                break;
        }
        return($piece);
    }
    function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}


     $active =request()->segment( count(request()->segments()));
           $counter=count(request()->segments());
           $perma_link =url()->current();
           $perma_code=Request::segment(4);
           if($counter==5)
           {
           $perma_link =url()->current();
           }else
           {
              $perma_link=cut_string_using_last('/', $perma_link, 'left', true);
              $perma_link=str_lreplace('/', '', $perma_link);

           }
           //dd($perma_link);

    ?>
<section id="topbar" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }}">

    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="{{url('/')}}/{{Config::get('app.locale')}}"><img src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/img/logo3.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
@if(config::get('app.locale')=="en")
<?php
$current_url=strtolower(url()->full());
$link=str_replace(Request::segment(1),'ar',$current_url);
?>
<li class="nav-item">
        <a class="nav-link" href="{{ $link }}" style="color:  black;"><b><u> عربي </u></b></a>
      </li>
@endif
<div class="center">


            <li class="nav-item  {{ $counter==5 ? "active" : "" }}">
              <a class="nav-link" href="{{ $perma_link }}">{{ trans('website/index.home') }}<span class="sr-only"></span></a>
            </li>
            <li class="nav-item {{ $active=='products'? "active" : "" }}">
              <a class="nav-link" href="{{ $perma_link }}/products">{{ trans('website/index.products') }}</a>
            </li>

            <!--<li class="nav-item {{ $active=='offers'? "active" : "" }}">-->
            <!--    <a class="nav-link" href="{{ $perma_link }}/offers">{{ trans('website/index.offers') }}</a>-->
            <!--  </li>-->

              <li class="nav-item {{ $active=='contact-us'? "active" : "" }}">
                <a class="nav-link" href="{{ $perma_link }}/contact-us">{{ trans('website/index.contactUS') }} </a>
              </li>
          </div>
@if(config::get('app.locale')=="ar")
<?php
$current_url=strtolower(url()->full());
$link=str_replace(Request::segment(1),'en',$current_url);
?>
<li class="nav-item">
        <a class="nav-link" href="{{ $link }}" style="color:  black;"><b><u> English </u></b></a>
      </li>
@endif
          </ul>

            {{ Form::open(array(
        'url'    => $perma_link . '/search',
        'method' =>'get',
        'role'   => 'form',
        'id'     => 'submit_form',
        'class'  => 'form-inline my-2 my-lg-0',
        'files'  => true
        )) }}
            <input class="form-control mr-sm-2" class="search_input" name="q" type="text" id="q" dir="auto">

            <button class="btn  my-2 my-sm-0" type="submit" style="font-size:  small;">
            {{ trans('website/index.search') }}
            </button>
          {{Form::close()}}

          <div class="social_linkss">
            <ul>
 @if($item->googleAcc)
<li class="social_linkss_style">
                    <a href="{{$item->googleAcc}}" class="googleplus" target="_blank">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </li>
@endif
 @if($item->youtubeAcc)
<li class="social_linkss_style">
                    <a href="{{$item->youtubeAcc}}" class="youtube" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
@endif
 @if($item->facebookAcc)
<li class="social_linkss_style">
                    <a href="{{ $item->facebookAcc }}" class="facebook" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
@endif

<li>
                <a href="http://www.addthis.com/bookmark.php"
 class="addthis_button"
 addthis:url="{{ url()->current() }}"
 addthis:title="Indooy |"
 addthis:description=""
 addthis:media="{{ url('/') }}/public/photos/LandingPages/companies/"
  ><i class="fas fa-share-alt"></i>
  <span style="text-decoration:none; color: black;">{{ trans('website/index.share') }}</span></a>


</li>
            </ul>

        </div>


        </div>
      </nav>
</section>