<?php
require '../template/header/header.php';


$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
$dta = mysqli_fetch_assoc($jadwal);

$anggotanya = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota='$get_id_akun_anggota'");
$dta_anggota = mysqli_fetch_assoc($anggotanya);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/reses/data.php">Reses</a></li>
              <li class="breadcrumb-item active">Tambah Lokasi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Lokasi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Jadwal</label>
                <input type="text" id="bidang_komisi" disabled value="<?= $dta['nama_jadwal'] ?>" name="bidang_komisi"class="form-control">
                <input type="text" hidden id="id_jadwal" value="<?= $dta['id_jadwal'] ?>" name="id_jadwal"class="form-control">
                <input type="text" hidden id="id_anggota" value="<?= $get_id_akun_anggota ?>" name="id_anggota"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Lokasi</label>
                <select class="form-control select2" style="width: 100%;" name="nama_lokasi" id="nama_lokasi">
                    <option selected="selected">---- Pilih ----</option>
                    <?php
                      $result=mysqli_query($conn,"SELECT * FROM tb_dapil_wilayah WHERE id_dapil = '$dta_anggota[id_dapil]'" );
                      while($row=mysqli_fetch_assoc($result)) {
                        echo "<option value='$row[nama_wilayah]'>$row[nama_wilayah]</option>";
                      }
                    ?>
                  </select>
              </div>

              <!-- Tanggal -->
              <div class="form-group">
                <label for="inputName"> tanggal </label>
                <div class="row">
                  <div class="col-6">
                    <input type="date" class="form-control" name="tanggal_lokasi">
                  </div>
                </div>
              </div>
              <!-- End Tanggal -->

              <div class="col-12">
              <button type="submit" name="submit_lokasi_reses" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/anggota-dpr/reses/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
            </div>
            </form>
            </div>
            <!-- /.card-body -->

            <br>
          </div>
          <!-- /.card -->


        </div>
      </div>
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>