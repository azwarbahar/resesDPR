<?php
require '../template/header/header.php';
$get_id_anggota = $_GET['id_anggota'];
$aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_anggota='$get_id_anggota' AND status_aspirasi='Kirim'");

$result_anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota = '$get_id_anggota'");
$dta_anggota = mysqli_fetch_assoc($result_anggota);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <a href="/reses-dprd/admin/laporan-masuk/data.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            <h1 class="m-0 text-dark">Laporan <?= $dta_anggota['nama_anggota'] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active"><a href="/reses-dprd/admin/laporan-masuk/data.php">Laporan Masuk</a></li>
              <li class="breadcrumb-item">Laporan</li>
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
                    <th class="text-right">Aksi</th>
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
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a data-toggle="tooltip" title="Approve" href="controller.php?approve_aspirasi=true&id_aspirasi=<?= $dta['id_aspirasi'].'&id_anggota='.$dta['id_anggota'] ?>" class="btn btn-info"><i class="fas fa fa-check"></i></a>
                        <button type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg<?= $dta['id_aspirasi'] ?>" ><i class="fas fa fa-times"></i></button>
                      </div>
                    </td>
                  </tr>

        <!-- Modal Keterangan Tolak -->
      <div class="modal fade" id="modal-lg<?= $dta['id_aspirasi'] ?>">
        <div class="modal-dialog modal-lg">
        <form method="POST" action="controller.php" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tolak Laporan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control"  name="keterangan" id="keterangan" rows="3" placeholder="Keterangan ..."></textarea>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="text" name="id_anggota" id="id_anggota" hidden value="<?= $dta['id_anggota'] ?>">
              <input type="text" name="id_aspirasi" id="id_aspirasi" hidden value="<?= $dta['id_aspirasi'] ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" name="tolak_aspirasi" class="btn btn-primary">Kirim Penolakan</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
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