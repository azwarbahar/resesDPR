<?php
require '../template/header/header.php';

$laporan = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE (id_anggota=$get_id_akun_anggota AND status_laporan='Pending') OR
                                                                status_laporan='Masuk'");

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
              <li class="breadcrumb-item active">Laporan</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Laporan</a>
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
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $i = 1; foreach($laporan as $dta) {
                    ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta['kegiatan'] ?></td>
                    <td><?= $dta['skpd'] ?></td>
                    <td><?= $dta['lokasi'] ?></td>
                    <?php
                      if ($dta['status_laporan'] == "Pending"){
                        echo "<td style='text-align:center'><span class='badge bg-secondary'>Pending</span></td>";
                      } else if ($dta['status_laporan'] == "Masuk"){
                        echo "<td style='text-align:center'><span class='badge bg-success'>Masuk</span></td>";
                      }
                    ?>
                      <td style="text-align:center">
                      <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <input type="text" hidden name="status_laporan" id="status_laporan" value="<?= $dta['status_laporan'] ?>">
                      <input type="text" hidden name="id_laporan" id="id_laporan" value="<?= $dta['id_laporan'] ?>">
                    <?php
                      if ($dta['status_laporan'] == "Pending"){
                        echo "<button type='submit' name='update_status_laporan' class='btn btn-primary'><i class='fa fa-check'></i></button>";
                      } else if ($dta['status_laporan'] == "Masuk"){
                        echo "<button type='submit' name='update_status_laporan' class='btn btn-info'><i class='fa fa-times'></i></button>";
                      }
                    ?>
                        <!-- <button type="submit" name="update_status_laporan" class="btn btn-primary"><i class="fa fa-check"></i></button> -->
                        <a href="edit.php?id_laporan=<?= $dta['id_laporan'] ?>" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta['id_laporan'] ?>" ><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
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