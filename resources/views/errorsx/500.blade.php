@extends('site.master')
  <link rel="stylesheet" href="{{ url('/') }}/resources/views/site/style/css/style_details.css">
  <title>wrong way</title>
@section('content')

   <!--start error  -->
  <div class="text-wrapper">
    <div class="title" data-content="404">
      404
    </div>

    <div class="subtitle">
      Oops, the page you're looking for doesn't exist.
    </div>

    <div class="buttons">
      <a class="button" href="{{ url('/') }}">Go to homepage</a>
    </div>
  </div>


@endsection



