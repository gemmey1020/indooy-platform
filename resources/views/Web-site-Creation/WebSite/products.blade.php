
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
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/lightbox.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/ProductStyle.css">
    <link rel="stylesheet" href="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/css/MainResponsive.css">

    <title>{{ Config::get('app.locale')=='en' ? "product " : "منتجات " }}{{ $item->company_name_ar }}</title>

 <!-- start topbar -->
 @include('Web-site-Creation.WebSite.navbar')

 <!-- start products content -->

<section id="products">

<div class="row">
<div class="col-12">
<div class="row">
<div class="col-10">


@foreach($products as $product)
<div class="row">
    <div class="col-12 product_margin">
        <div class=" product_info">
            <div class="product_image ">
                <img class="img-fluid " src="{{ url('/') }}/public/photos/FullWebSite/companies/products/{{ $product->product_photo }}" alt="">

                <div class="product_image_overlay">
                    <button class="lightbox" data-img="{{ url('/') }}/public/photos/FullWebSite/companies/products/{{ $product->product_photo }}">
                        <i class="fas fa-search-plus"></i>
                    </button>
                </div>




            </div>
            <div class="product_content">
                <h2 style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                    @if(config::get('app.locale')=="en")
                    {{ $product->product_name_en }}
                    @else
                    {{ $product->product_name_ar }}
                    @endif
                </h2>
                <p style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">@if(config::get('app.locale')=="en")
                    {{ $product->product_desc_en }}
                    @else
                    {{ $product->product_desc_ar }}
                    @endif</p>

            </div>
        </div>


    </div>

</div>
@endforeach







</div>

<div class="col-2">
    @if($products->count() >4)
        <div class="left_content">
            <img class="img-fluid" src="" alt="">
        </div> <br> <br>
    @endif
     @if($products->count() >8)
        <div class="left_content">
            <img class="img-fluid" src="" alt="">
        </div>
        @endif


</div>
</div>
</div>
</div>


</section>

<!-- start bottom adver -->
<section id="bottomAdv_pagnition">

    <div class="row">
        <div class="col-12 col-sm-4 ">
<div class="bottomAdv_pagnition_adv">

    <img class="img-fluid" src="" alt="">
</div>

        </div>

<div class="col-12 col-sm-4">
<div class="pagination">
<nav aria-label="Page navigation example">
{{ $products->links() }}
</nav>

</div>

</div>

<div class="col-12 col-sm-4">
        <div class="bottomAdv_pagnition_adv"></div>

                </div>

    </div>

</section>
@include('Web-site-Creation.WebSite.footer')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/owl.carousel.js"></script>
  <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/lightbox.js"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/wow.min.js"></script>
    <script src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/js/Main.js"></script>
    <script>
        new WOW().init();
        </script>
</body>

</html>
