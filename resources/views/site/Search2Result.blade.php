<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/searchStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/site/assets/css/indooyResponsive.css">

<TITLE>indooy search</TITLE>
<meta name="google-site-verification" content="q_cEFtvw1xY1WEPdkVxtXbqlQlZ33a6xOG4_xnBkimk" />
<META NAME="description" CONTENT="تسمح اندوى لأى مستخدم بالوصول الى بينات ومعلومات الشركات التجارية او اصحاب المهن والاعمال الحرة مجاناً بما يشمل ذلك من ارقام التليفونات والايميل والعناوين والفروع او حتى عروض ومنتجات وصور خاصة بالخدمات او المنتجات للشركات او اصحاب المهن والاعمال الحرة من خلال منصة الكترونية ( موقع الكترونى / ويب سايت ) على محرك البحث اندوى www.indooy.com">
<META NAME="keywords" CONTENT="اندوي,محرك بحث,دليل اندوي">
<META NAME="robot" CONTENT="index,follow">
<META NAME="copyright" CONTENT="Copyright © 2018 indooy.com. All Rights Reserved.">
<META NAME="revisit-after" CONTENT="1 days">
<style>#search-query {
    width:300px;
    padding:5px 10px;
    margin-left:10px;
}
/****** jQuery Autocomplete CSS *************/
 .ui-corner-all {


    border-radius: 0;
}
.ui-menu {

    font-family: Verdana, Arial, Helvetica, sans-serif;
    font-size: 15px;
}
.ui-menu .ui-menu-item a {
    color: #888;
}
.ui-menu .ui-menu-item:hover {

    cursor: pointer;

}
.ui-widget-content .ui-state-hover, .ui-widget-content .ui-state-focus {

    background-image: none;
    background-color: lightgray;

    color: #3D3D3D;
}
</style>
    <title>indooy</title>
</head>

<body>
    <section id="search_header">
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-2">
                    <div class="search_logo">
                        <a href="{{url('/')}}">
                        <img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-10 col-md-10">
                    <div class="search_box_tabs">
                         <label class="control-label" for="inputSuccess2"></label>
                         <form method="get" action="{{url('/')}}/search">
                        <input type="text" name="q" id="q" value="{{ $query_search }}">
                        			<div id="suggesstion-box"></div>
                          <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">الكل</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">صور</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">اخبار</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">فيديو</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">كتب</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">خرائط</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">المزيد</a>
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
                    <p>حوالي 19 من النتائج (عدد الثواني {{$executionTime}})</p>
            </div>

        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row full_description">

        <div class=" col-2 col-md-2">
            <div class="company_logo">
                <img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/cs.jpg" alt="">
            </div>
        </div>
<div class="col-10 col-md-10">
<div class="description">
<a href="#">شركة عقارات الخليج</a>
<a class="main_link" href="#">www.coming-soon.com/ar</a>
<p>أول شركة عقارية مساهمة مغلقة في المملكة العربية السعودية تم تأسيسها برأسمال سعودي ... عقارات الخلیج" تستعد لتنفيذ فنادق ومراكز تجارية ترفیھیة في الرياض والدمام ...</p>
<div class="social_links">
  <a href="#"><i class="fas fa-phone"></i></a>
<a href="">
    <i class="far fa-envelope"></i>
</a>
  <a href=""><i class="fas fa-map-marker-alt"></i></a>
  <a href=""><i class="fas fa-globe-africa"></i></a>
</div>
</div>
</div>
    </div>

    </div>

    <div class="row full_description">

            <div class=" col-2 col-md-2">
                <div class="company_logo">
                        <img class="img-fluid"  src="{{ url('/') }}/resources/views/site/assets/img/cs.jpg" alt="">
                </div>
            </div>
    <div class="col-10 col-md-10">
    <div class="description">
    <a href="#">شركة عقارات الخليج</a>
    <a class="main_link" href="#">www.coming-soon.com/ar</a>
    <p>أول شركة عقارية مساهمة مغلقة في المملكة العربية السعودية تم تأسيسها برأسمال سعودي ... عقارات الخلیج" تستعد لتنفيذ فنادق ومراكز تجارية ترفیھیة في الرياض والدمام ...</p>
    <div class="social_links">
      <a href="#"><i class="fas fa-phone"></i></a>
<a href="">
    <i class="far fa-envelope"></i>
</a>
      <a href=""><i class="fas fa-map-marker-alt"></i></a>
      <a href=""><i class="fas fa-globe-africa"></i></a>
    </div>
    </div>
    </div>
        </div>

        <div class="row full_description">

                <div class="col-2 col-md-2">
                    <div class="company_logo">
                        <img class="img-fluid"  src="{{ url('/') }}/resources/views/site/assets/img/cs.jpg" alt="">
                    </div>
                </div>
        <div class="col-10 col-md-10">
        <div class="description">
        <a href="#">شركة عقارات الخليج</a>
        <a  class="main_link" href="#">www.coming-soon.com/ar</a>
        <p>أول شركة عقارية مساهمة مغلقة في المملكة العربية السعودية تم تأسيسها برأسمال سعودي ... عقارات الخلیج" تستعد لتنفيذ فنادق ومراكز تجارية ترفیھیة في الرياض والدمام ...</p>
        <div class="social_links">
          <a href="#"><i class="fas fa-phone"></i></a>
<a href="">
    <i class="far fa-envelope"></i>
</a>
          <a href=""><i class="fas fa-map-marker-alt"></i></a>
          <a href=""><i class="fas fa-globe-africa"></i></a>
        </div>
        </div>
        </div>
            </div>


            <div class="row full_description">

                    <div class="col-2 col-md-2">
                        <div class="company_logo">
                            <img class="img-fluid"  src="{{ url('/') }}/resources/views/site/assets/img/cs.jpg" alt="">
                        </div>
                    </div>
            <div class="col-10 col-md-10">
            <div class="description">
            <a href="#">شركة عقارات الخليج</a>
            <a  class="main_link" href="#">www.coming-soon.com/ar</a>
            <p>أول شركة عقارية مساهمة مغلقة في المملكة العربية السعودية تم تأسيسها برأسمال سعودي ... عقارات الخلیج" تستعد لتنفيذ فنادق ومراكز تجارية ترفیھیة في الرياض والدمام ...</p>
            <div class="social_links">
              <a href="#"><i class="fas fa-phone"></i></a>
<a href="">
    <i class="far fa-envelope"></i>
</a>
              <a href=""><i class="fas fa-map-marker-alt"></i></a>
              <a href=""><i class="fas fa-globe-africa"></i></a>
            </div>
            </div>
            </div>
                </div>


                <div class="row full_description">

                        <div class="col-2 col-md-2">
                            <div class="company_logo">
                                <img class="img-fluid"  src="{{ url('/') }}/resources/views/site/assets/img/cs.jpg" alt="">
                            </div>
                        </div>
                <div class="col-10 col-md-10">
                <div class="description">
                <a href="#">شركة عقارات الخليج</a>
                <a  class="main_link" href="#">www.coming-soon.com/ar</a>
                <p>أول شركة عقارية مساهمة مغلقة في المملكة العربية السعودية تم تأسيسها برأسمال سعودي ... عقارات الخلیج" تستعد لتنفيذ فنادق ومراكز تجارية ترفیھیة في الرياض والدمام ...</p>
                <div class="social_links">
                  <a href="#"><i class="fas fa-phone"></i></a>
<a href="">
    <i class="far fa-envelope"></i>
</a>
                  <a href=""><i class="fas fa-map-marker-alt"></i></a>
                  <a href=""><i class="fas fa-globe-africa"></i></a>
                </div>
                </div>
                </div>
                    </div>


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
    <div class=" col-md-3">
        <div class="list">
            <ul>
                <li><a href="">شركة التطوير العقاري في مصر</a></li>
                <li><a href="">شركة التطوير العقاري في مصر</a></li>
                <li><a href="">شركة التطوير العقاري في مصر</a></li>
                <li><a href="">شركة التطوير العقاري في مصر</a></li>

            </ul>
        </div>
    </div>

    <div class="col-md-3">
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
    <img class="img-fluid" src="{{ url('/') }}/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png" alt="">
</div>


<nav aria-label="Page navigation example">
        <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>

        </ul>
      </nav>

        </div>
    </div>
</div>
    </section>








    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/resources/views/site/assets/js/custom.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121398762-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121398762-1');
</script>


    <script type="text/javascript">
    $('#q').autocomplete({
      source : '{!!URL('search/autocomplete')!!}',
      minlenght:2,
      autoFocus:true,

      select:function(e,ui){

      }
    }).keypress(function(e) {
    if (e.keyCode === 13) {
        $(this).closest('form').trigger('submit');
    }
});
    var $_searchQuery = $('#q');
    $.ui.autocomplete.prototype._renderItem = function (ul, item) {
    var re = new RegExp($.trim(this.term.toLowerCase()));
    var t = item.label.replace(re, "<span style='font-weight:600;color:#5C5C5C;'>" + $.trim(this.term.toLowerCase()) +
        "</span>");
    return $("<li></li>")
        .data("item.autocomplete", item)
        .append("<a>" + t + "</a>")
        .appendTo(ul);
};

// $_searchQuery.autocomplete({
//     source: data
// });

</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.indooy.com",
  "logo":"http://www.indooy.com/resources/views/site/assets/img/35744081_1962559820472678_6671173014962307072_n.png",
  "name": "indooy.",
  "sameAs":"https://www.facebook.com/indoooy",

    "potentialAction": {
    "@type": "SearchAction",
  "target": "http://www.indooy.com/search?q={search_term_string}",
  "query-input": "required name=search_term_string"
}
  }
</script>
</body>