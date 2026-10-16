<div class="clearfix">
</div>
<div class="container">
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">

            <div class="page-sidebar navbar-collapse collapse">

                <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="start ">
                        <a href="{{ url('/') }}/WebSite_Creation">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-basket"></i>
                        <span class="title">landing page</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/en/WebSite_Creation') }}/create_landing">
                                <i class="icon-home"></i>
                                new landing page</a>
                            </li>
                            <li>
                                <a href="{{ url('/en/WebSite_Creation') }}/all_landing">
                                <i class="fa fa-edit"></i>
                                edit your landing page</a>
                            </li>

                        </ul>
                    </li>

                        <li>
                        <a href="javascript:;">
                        <i class="icon-basket"></i>
                        <span class="title"> full website creation</span>
                        <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ url('/en/full_WebSite_Creation') }}/create_website">
                                <i class="icon-home"></i>
                                new website</a>
                            </li>
                            <li>
                                <a href="{{ url('/en/full_WebSite_Creation') }}/all_websites">
                                <i class="fa fa-edit"></i>
                                edit your websites</a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                 Widget settings form goes here
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn blue">Save changes</button>
                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

                <!-- BEGIN PAGE HEADER-->
                <h3 class="page-title">
                Dashboard <small style="color: red">beta virsion</small>
                </h3>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            last date to update  your website is
                    <span style="color: green">
                            <b>
                            not applied yet
                        </b>
                    </span>
                        </li>
                    </ul>

                </div>
                <!-- END PAGE HEADER-->