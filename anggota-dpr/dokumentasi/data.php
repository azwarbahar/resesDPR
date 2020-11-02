<?php
require '../template/header/header.php';

$id_jadwal = $_GET['id_jadwal'];
$id_lokasi = $_GET['id_lokasi'];
$lokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_lokasi='$id_lokasi'");
$dta_lokasi = mysqli_fetch_assoc($lokasi);
$dokumentasi = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE id_lokasi='$id_lokasi' AND id_anggota= '$get_id_akun_anggota'");
$cek_dokumentasi = mysqli_fetch_assoc($dokumentasi);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <a href="/reses-dprd/anggota-dpr/reses/data.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
              <h1 class="m-0 text-dark">Lokasi : <?= $dta_lokasi['nama_lokasi'] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item"><a href="../reses/data.php">Lokasi Reses</a></li>
              <li class="breadcrumb-item active">Dokumentasi</li>
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
                <a href="tambah.php?id_lokasi=<?= $id_lokasi.'&id_jadwal='.$id_jadwal ?>" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Dokumentasi</a>
              </div>
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
                <div class="row">
                  <?php
                  if($cek_dokumentasi==null){
                    echo '<div class="col-12"><h5 style="background-color: grey; text-align: center; color:white;">Kosong</h5></div>';
                  } else {
                    foreach($dokumentasi as $dta) {
                  ?>

                  <div class="col-sm-2">
                    <a href="gambar/<?= $dta['nama_dokumentasi'] ?>" data-toggle="lightbox" data-title="Ket : <?= $dta['keterangan_dokumentasi'] ?>" data-gallery="gallery">
                      <img src="gambar/<?= $dta['nama_dokumentasi'] ?>" style="min-height: 150px; min-width: 150px; max-width:150px; max-height:150px;" class="img-fluid mb-2"/>
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