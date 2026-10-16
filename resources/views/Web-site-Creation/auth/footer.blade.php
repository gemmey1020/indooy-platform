<div class="copyright">
	 2018 © Indooy. customer Dashboard
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/respond.min.js"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ url('/') }}/resources/views/Web-site-Creation/assets/global/plugins/select2/select2.min.js"></script>
<script src="{{url('/')}}/resources/views/Web-site-Creation/assets/admin/pages/scripts/loginx.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<script>
         function myFunction() {
             var real = document.getElementById("password").value;
             $('#real_password').val(real);

         }

</script>
<script>
         function send_password() {

             password=  $('password').val(real);
             $.ajax({

           type:'POST',

           url:'/en/ajaxAlterRequest',

           data:{password:password,},

           success:function(data){

              alert(data.success);

           }

        });

         }

</script>

@yield('extra-footer')
</body>
<!-- END BODY -->
</html>