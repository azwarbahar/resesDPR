<?php
require '../template/header/header.php';

$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
$dta_jadwal = mysqli_fetch_assoc($jadwal);
$group_anggota = mysqli_query($conn, "SELECT id_anggota FROM tb_aspirasi WHERE id_jadwal='$dta_jadwal[id_jadwal]' GROUP BY id_anggota");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Laporan Masuk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Laporan Masuk</li>
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

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jadwal</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $i = 1;
                    while($row_id_anggota=mysqli_fetch_assoc($group_anggota)) {
                      $get_id_anggota = $row_id_anggota['id_anggota'];
                      $get_anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota='$get_id_anggota'");
                      foreach( $get_anggota as $dta){
                    ?>
                  <tr>
                    <td style="text-align: center;"><?= $i ?></td>
                    <td style="text-align:center"><img src="/reses-dprd/admin/profile-dpr/foto/<?php echo $dta['foto_anggota'] ?>" alt="" border=3 height=60 width=60></img></td>
                    <td><?= $dta['nama_anggota'] ?></td>
                    <td><?= $dta_jadwal['nama_jadwal'] ?></td>
                    <td class="text-center py-0 align-middle">
                    <a href="../aspirasi-anggota/data.php?id_anggota=<?= $dta['id_anggota'] ?>" type="button" class="btn btn-success"><i class="fa fa-eye"></i>  Lihat Laporan</a>
                    <a href="dokumentasi-data.php?id_anggota=<?= $dta['id_anggota'] ?>" type="button" class="btn btn-info"><i class="fa fa-file-image"></i>  Dokumentasi</a>
                    </td>
                  </tr>

                      <?php  }
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