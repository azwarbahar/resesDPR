
<?php

require '../template/header/header.php';

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

                <div class="alert alert-info alert-dismissible">
                  <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                  <h5><i class="icon fas fa-info"></i> Welcome Back!</h5>
                  Selamat Datang <b><?= $nama ?></b>
                  <br> <br>
                </div>

        <!-- Small boxes (Stat box) -->
        <br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                  $anggota = mysqli_query($conn, "SELECT * FROM tb_anggota");
                  $row_anggota = mysqli_num_rows($anggota);
                  $row_anggota_final = $row_anggota;
                  echo "<h3>$row_anggota_final</h3>";
                ?>

                <p>Anggota DPR</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="../profile-dpr/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                  $jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
                  $dta = mysqli_fetch_assoc($jadwal);
                  $aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE  id_jadwal = '$dta[id_jadwal]' AND status_aspirasi='Kirim' ");
                  $row_aspirasi = mysqli_num_rows($aspirasi);
                  $row_aspirasi_final = $row_aspirasi;
                  echo "<h3>$row_aspirasi_final</h3>";
                ?>

                <p>Laporan Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="../laporan-masuk/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $admin = mysqli_query($conn, "SELECT * FROM tb_admin");
                  $row_admin = mysqli_num_rows($admin);
                  $row_admin_final = $row_admin;
                  echo "<h3>$row_admin_final</h3>";
                ?>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="../user/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $partai = mysqli_query($conn, "SELECT * FROM tb_partai");
                  $row_partai = mysqli_num_rows($partai);
                  $row_partai_final = $row_partai;
                  echo "<h3>$row_partai_final</h3>";
                ?>

                <p>Partai</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="../partai/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php

require '../template/footer/footer.php';

?>