    <section id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form_contact">
<?php if(config::get('app.locale')=='en')
$form_style='text-align: left;';
else
$form_style='text-align: right;';
?>


                           {{ Form::open(array(
                                'url'    => '/landing_page/company/inquiry',
                                'method' =>'get',
                                'role'   => 'form',
                                'id'     => 'submit_form',

                                'style'  =>$form_style,
                            )) }}
                                <!-- name -->
                                <div class="contact_info">
                                    <label for="name">{{ trans('landing.name') }}</label>
                                   <input id="fullname" name="fullname" type="text" dir="auto" required>
                                </div>

                                <!-- phone -->
                                <div class="contact_info">
                                    <label for="phone"> {{ trans('landing.mobile') }}</label>
                                   <input id="mobile" name="mobile" type="text" dir="auto" required>
                                </div>

                                <!-- email -->
                                <div class="contact_info">
                                    <label for="mail">{{ trans('landing.mail') }} </label>
                                    <input id="email" name="email" type="email" dir="auto" required>
                                </div>

                                <!-- message -->
                                <div class="contact_info">
                                    <label for="message">{{ trans('landing.messege') }}</label>
                                    <textarea name="msg" id="" dir="auto" required>
                                    </textarea>

                                        <input type="hidden" name="codePage" value="{{ $item->code }}" >
                                        <input type="hidden" name="type" value="1" >
                                </div>
                                {{-- <input type="hidden" name="codePage" value="{{ $item->code }}" > --}}
                                <button type="submit">{{ trans('landing.send') }}</button>

                            </form>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="indooy_footer">
                            <div class="row first_row">
                                <div class="col-12">
                                    <div class="indooy_search">
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
                                        <div class="indooy_search_logo">
                                            <img src="{{ url('/') }}/resources/views/Web-site-Creation/WebSite/assets/img/logo3.png" alt="">
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <!-- email -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="Email">
                                        <p>E-mail:contact@example.invalid</p>
                                    </div>
                                </div>
                            </div>


                            <div class="row second_row" style="direction: {{ Config::get('app.locale')=='en' ? "ltr" : "rtl" }} ;">
                                <div class="col-12 col-sm-6">
                                    <ul class="first_list" style="float: {{ Config::get('app.locale')=='en' ? "left" : "" }};">
       <li><a href="">{{ trans('main.home_ads') }}</a></li>
        <li><a href="">{{ trans('main.home_business') }}</a></li>
        <li> <a href="">{{ trans('main.home_about') }}</a></li>
                                    </ul>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <ul class="second_list" style="float: {{ Config::get('app.locale')=='en' ? "right" : "" }};">
         <li><a href="">{{ trans('main.home_privacy') }}</a></li>
        <li><a href="">{{ trans('main.home_item') }}</a></li>
        <li><a href="{{url('/')}}/en/WebSite_Creation">{{ trans('main.home_register') }}</a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </section>