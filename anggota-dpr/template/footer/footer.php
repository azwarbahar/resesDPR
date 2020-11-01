
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">RESES DPRD Kabupaten Soppeng</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.5 -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/reses-dprd/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/reses-dprd/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/reses-dprd/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assetsplugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="/reses-dprd/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/reses-dprd/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/reses-dprd/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/reses-dprd/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/reses-dprd/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/reses-dprd/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/reses-dprd/assets/dist/js/demo.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#jadwal_laporan').change(function(){
      var value = $(this).val();
      $.ajax({
        url     : 'cont.php',
        method  : "POST",
        data    : { req: 'getLokasi', id: value },
        success : function(data) {
          console.log(data)
          $('#lokasi_laporan').html(data)
        }
      });
    })

    // table laporan
    $('#lokasi_laporan').change(function(){
      var idjadwal = $('#jadwal_laporan').val();
      var idlokasi = $('#lokasi_laporan').val();
      var idanggota = $('#idanggota').val();
      $.ajax({
        url     : 'cont.php',
        method  : "POST",
        data    : { req: 'getdata', idjadwal: idjadwal, idlokasi: idlokasi, idanggota: idanggota },
        success : function(data) {
          console.log(data)
          $('#tabeldata').html(data)
        }
      });
    })

  });
</script>

</body>
</html>
