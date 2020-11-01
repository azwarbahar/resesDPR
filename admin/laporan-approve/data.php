<?php
require '../template/header/header.php';
$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
$dta_jadwal = mysqli_fetch_assoc($jadwal);
$aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE status_aspirasi='Approve' AND id_jadwal='$dta_jadwal[id_jadwal]'");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Approve</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item active">Laporan Approve</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>