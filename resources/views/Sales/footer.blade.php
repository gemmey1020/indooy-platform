<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © indooy.com 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">watch out !!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below to exit Admin Panel</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger"
            href="{{ url('/Sales_logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          Logout
        </a>
         <form
               id="logout-form"
               action="{{ url('/Sales_logout') }}"
               method="POST"
               style="display: none;">
            {{ csrf_field() }}
          </form>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ url('/') }}/resources/views/Admin/style/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/resources/views/Admin/style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ url('/') }}/resources/views/Admin/style/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ url('/') }}/resources/views/Admin/style/js/sb-admin.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('/') }}/resources/views/Admin/style/vendor/datatables/dataTables.bootstrap4.js"></script>

   <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function() {
$('#dataTable').DataTable( {
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
} );
} );
</script>
  </div>
</body>

</html>