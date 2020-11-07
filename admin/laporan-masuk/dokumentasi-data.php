<?php
require '../template/header/header.php';
$get_id_anggota = $_GET['id_anggota'];
$aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_anggota='$get_id_anggota' AND status_aspirasi='Kirim'");

$result_anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota = '$get_id_anggota'");
$dta_anggota = mysqli_fetch_assoc($result_anggota);

$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal= 'Berjalam'");
$dta_jadwal = mysqli_fetch_assoc($jadwal);

$dokumentasi = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE id_anggota= '$get_id_anggota'");
$cek_dokumentasi = mysqli_fetch_assoc($dokumentasi);
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
              <li class="breadcrumb-item">Dokumentasi</li>
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
              <!-- /.card-header -->
              <div class="card-body">


              <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Foto
                </div>
              </div>
              <div class="card-body">
                  <!-- <div>
                  <div class="btn-group w-100 mb-2">

                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All Item </a>
                      <?php
                        // $lokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_anggota= '$get_id_anggota' ");
                        // $dta_lokasi = mysqli_fetch_assoc($lokasi);
                        // echo "<a class='btn btn-info' href='javascript:void(0)' data-filter='$dta_lokasi[id_lokasi]'> $dta_lokasi[nama_lokasi] </a>";
                      ?>
                  </div>
                  </div> -->
                <div class="row">
                  <?php
                  if($cek_dokumentasi==null){
                    echo '<div class="col-12"><h5 style="background-color: grey; text-align: center; color:white;">Kosong</h5></div>';
                  } else {
                    foreach($dokumentasi as $dta) {
                  ?>

                  <div class="col-sm-2">
                    <a href="/reses-dprd/anggota-dpr/dokumentasi/gambar/<?= $dta['nama_dokumentasi'] ?>" data-toggle="lightbox" data-title="Ket : <?= $dta['keterangan_dokumentasi'] ?>" data-gallery="gallery">
                      <img src="/reses-dprd/anggota-dpr/dokumentasi/gambar/<?= $dta['nama_dokumentasi'] ?>" style="min-height: 150px; min-width: 150px; max-width:150px; max-height:150px;" class="img-fluid mb-2"/>
                    </a>
                  </div>

                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>


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