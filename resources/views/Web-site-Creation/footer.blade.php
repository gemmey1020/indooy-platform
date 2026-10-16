<!-- BEGIN FOOTER -->
  <div class="page-footer">
    <div class="page-footer-inner">
       2018 &copy; Indooy|Website creation.
    </div>
    <div class="scroll-to-top">
      <i class="icon-arrow-up"></i>
    </div>
  </div>
  <!-- END FOOTER -->
</div>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>

<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="{{ url('/') }}/resources/views/Web-site-Creation/assets/admin/pages/scripts/form-wizard.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   //QuickSidebar.init() // init quick sidebar
   Index.init();
 FormWizard.init();
  $(document).ready(function() {
    $('#websiteBranches').DataTable();
} );
   // Index.initIntro();
   // Tasks.initDashboardWidget();
});
</script>
@yield('extra-footer')

    </body>

</html>