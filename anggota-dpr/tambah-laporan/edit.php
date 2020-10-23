<?php
require '../template/header/header.php';

$id_laporan = $_GET['id_laporan'];
$laporan = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE id_laporan = '$id_laporan'");
$dta = mysqli_fetch_assoc($laporan);
$jadwal_laporan = $dta['id_jadwal'] ;
$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE id_jadwal='$jadwal_laporan'");
$dta1 = mysqli_fetch_assoc($jadwal);


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/tambah-laporan/data.php">Laporan</a></li>
              <li class="breadcrumb-item active">Edit</li>
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
              <h3 class="card-title">Edit Laporan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Jadwal</label>
                <input type="text" id="bidang_komisi" disabled value="<?= $dta1['nama_jadwal'] ?>" name="bidang_komisi"class="form-control">
                <input type="text" hidden id="id_jadwal" value="<?= $dta['id_jadwal'] ?>" name="id_jadwal"class="form-control">
                <input type="text" hidden id="id_laporan" value="<?= $dta['id_laporan'] ?>" name="id_laporan"class="form-control">
                <input type="text" hidden id="id_anggota" value="<?= $get_id_akun_anggota ?>" name="id_anggota"class="form-control">
                <input type="text" hidden id="nama_anggota" value="<?= $nama ?>" name="nama_anggota"class="form-control">
              </div>

              <div class="form-group">
                <label>Kegiatan</label>
                <textarea class="form-control"  name="kegiatan" id="kegiatan" rows="3" placeholder=""><?= $dta['kegiatan'] ?></textarea>
              </div>

              <div class="form-group">
                <label>SKPD</label>
                <textarea class="form-control" name="skpd" id="skpd" rows="3" placeholder=""><?= $dta['skpd'] ?></textarea>
              </div>

              <div class="form-group">
                <label>Lokasi</label>
                <textarea class="form-control" name="lokasi" id="lokasi" rows="3" placeholder=""><?= $dta['lokasi'] ?></textarea>
              </div>

              <div class="col-12">
              <button type="submit" name="update_laporan" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/anggota-dpr/tambah-laporan/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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