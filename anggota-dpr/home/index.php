
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
        
      <div class="callout callout-danger">
          <h5><i class="fas fa-info"></i> Welcome:</h5>
          Selamat Datang <b>  <?= $get_data_anggota['nama_anggota'] ?> </b>
        </div>

        <?php
        $ada_jadwal = '';
        $jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
        $dta_jadwal = mysqli_fetch_assoc($jadwal);
        if($dta_jadwal==''){
          $ada_jadwal = 'Kosong';
        } else {
          echo "<div class='callout callout-success'>
                  <h5><i class='fas fa-info'></i> Info:</h5>
                    Jadwal Inputan Laporan Reses Yang Sedang Berlangsung <a href=''> <b> $dta_jadwal[nama_jadwal] </b></a>
                </div>";
        }
        ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_anggota='$get_id_session' AND status_aspirasi='Simpan'");
                  $row_aspirasi = mysqli_num_rows($aspirasi);
                  $row_apirasi_final = $row_aspirasi;
                  echo "<h3>$row_apirasi_final</h3>";
                ?>
                <p>Laporan Simpan</p>
              </div>
              <div class="icon">
                <i class="fas fa-file"></i>
              </div>
              <a href="../reses/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                  $aspirasi2 = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_anggota='$get_id_session' AND status_aspirasi='Approve'");
                  $row_aspirasi2 = mysqli_num_rows($aspirasi2);
                  $row_apirasi_final2 = $row_aspirasi2;
                  echo "<h3>$row_apirasi_final2</h3>";
                ?>
                <p>Laporan Approve</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-square"></i>
              </div>
              <a href="../reses/data.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                  $dokumentasi = mysqli_query($conn, "SELECT * FROM tb_dokumentasi WHERE id_anggota='$get_id_session'");
                  $row_dokumentasi = mysqli_num_rows($dokumentasi);
                  $row_dokumentasi_final = $row_dokumentasi;
                  echo "<h3>$row_dokumentasi_final</h3>";
                ?>
                <p>Dokumentasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-image"></i>
              </div>
              <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                  $aspirasi3 = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_anggota='$get_id_session' AND status_aspirasi='Tolak'");
                  $row_aspirasi3 = mysqli_num_rows($aspirasi3);
                  $row_apirasi_final3 = $row_aspirasi3;
                  echo "<h3>$row_apirasi_final3</h3>";
                ?>
                <p>Laporan Tolak</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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