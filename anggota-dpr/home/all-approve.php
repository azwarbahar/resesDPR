
<?php

require('../../koneksi.php');

if (!isset($_SESSION['login_dpr'])) {
  header("location: ../login.php");
}
$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
$dta_jadwal = mysqli_fetch_assoc($jadwal);
$aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE status_aspirasi='Approve' AND id_jadwal='$dta_jadwal[id_jadwal]'");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Reses DPRD</title>
  <link rel="icon" href="/reses-dprd/assets/dist/img/soppeng.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- bootstrap-switch-button -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="/reses-dprd/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
              <h4 style="text-align: center;"><b>POKOK-POKOK PIKIRAN DPRD</b></h4>
              <h4 style="text-align: center;"><b>SOPPENG TAHUN 2020 BERDASARKAN PRIORITAS</b></h4>
                <!-- <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Laporan</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>SKPD</th>
                    <th>Lokasi</th>
                    <th>Nama Dewan</th>
                    <th>Fraksi</th>
                    <th>Dapil</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $i = 1; foreach($aspirasi as $dta) {
                    ?>
                  <tr>
                  <td style="text-align: center;"><?= $i ?></td>
                    <td><?= $dta['kegiatan'] ?></td>
                    <td><?= $dta['skpd'] ?></td>
                    <td><?= $dta['lokasi'] ?></td>
                    <?php
                      $get_id_anggota1 = $dta['id_anggota'];
                      $anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota = $get_id_anggota1");
                      while($row_anggota=mysqli_fetch_assoc($anggota)) {
                        echo " <td>$row_anggota[nama_anggota]</td>";
                        $get_id_fraksi = $row_anggota['id_fraksi'];
                        $fraksi = mysqli_query($conn, "SELECT * FROM tb_fraksi WHERE id_fraksi = $get_id_fraksi");
                        while($row_fraksi=mysqli_fetch_assoc($fraksi)) {
                          $get_id_partai = $row_fraksi['id_partai'];
                          $partai = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = $get_id_partai");
                          while($row_partai=mysqli_fetch_assoc($partai)) {
                            echo " <td>$row_partai[nama_partai]</td>";
                          }
                        }
                        $get_id_dapil = $row_anggota['id_dapil'];
                        $dapil = mysqli_query($conn, "SELECT * FROM tb_dapil WHERE id_dapil = $get_id_dapil");
                        while($row_dapil=mysqli_fetch_assoc($dapil)) {
                          echo " <td style='text-align: center;'>$row_dapil[nama_dapil]</td>";
                        }
                      }
                    ?>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta['id_laporan'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Laporan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Laporan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_laporan=true&id_laporan=<?= $dta['id_laporan'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                  <?php 
                  $i = $i + 1; } 
                  ?>
                  </tbody>

                </table>

              </div>
              <!-- /.card-body -->
                <div class="col-12">
                  <a href="laporan-print.php" target="_blank" class="btn btn-primary" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Cetak Print/PDF
                  </a>
                </div>

              <br>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
<!-- ./wrapper -->
<!-- bs-custom-file-input -->
<script src="/reses-dprd/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
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

<!-- Ekko Lightbox -->
<script src="/reses-dprd/assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
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

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

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

<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });

  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

</body>
</html>
