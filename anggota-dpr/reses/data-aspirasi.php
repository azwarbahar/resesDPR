<?php
require '../template/header/header.php';

$id_jadwal = $_GET['id_jadwal'];
$id_lokasi = $_GET['id_lokasi'];
$lokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_lokasi='$id_lokasi'");
$dta_lokasi = mysqli_fetch_assoc($lokasi);
$aspirasi = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_lokasi='$id_lokasi' AND id_anggota= '$get_id_akun_anggota'");

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
              <li class="breadcrumb-item"><a href="data.php">Lokasi Reses</a></li>
              <li class="breadcrumb-item active">Aspirasi</li>
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
                <a href="tambah-aspirasi.php?id_lokasi=<?= $id_lokasi.'&id_jadwal='.$id_jadwal ?>" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Aspirasi</a>
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
                   $i = 1; foreach($aspirasi as $dta) {
                    ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta['kegiatan'] ?></td>
                    <td><?= $dta['skpd'] ?></td>
                    <td><?= $dta['lokasi'] ?></td>
                    <?php
                      if ($dta['status_aspirasi'] == "Simpan"){
                        echo "<td style='text-align:center'><span class='badge bg-secondary'>Simpan</span></td>";
                      } else if ($dta['status_aspirasi'] == "Kirim"){
                        echo "<td style='text-align:center'><span class='badge bg-primary'>Kirim</span></td>";
                      } else if ($dta['status_aspirasi'] == "Approve"){
                        echo "<td style='text-align:center'><span class='badge bg-success'>Approve</span></td>";
                      } else if ($dta['status_aspirasi'] == "Tolak"){
                        echo "<td style='text-align:center'><span class='badge bg-danger'>Tolak</span></td>";
                      }
                    ?>
                      <td style="text-align:center">
                      <form method="POST" action="controller.php" enctype="multipart/form-data">
                      <input type="text" hidden name="id_jadwal" id="id_jadwal" value="<?= $id_jadwal ?>">
                      <input type="text" hidden name="id_aspirasi" id="id_aspirasi" value="<?= $dta['id_aspirasi'] ?>">
                        <!-- <button type="submit" name="update_status_laporan" class="btn btn-primary"><i class="fa fa-check"></i></button> -->
                        <a href="edit-aspirasi.php?id_aspirasi=<?= $dta['id_aspirasi'] ?>&id_lokasi=<?= $id_lokasi ?>&id_jadwal=<?= $id_jadwal ?>" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta['id_aspirasi'] ?>" ><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta['id_aspirasi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Aspirasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Aspirasi</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_aspirasi=true&id_aspirasi=<?= $dta['id_aspirasi'] ?>&id_lokasi=<?= $id_lokasi ?>&id_jadwal=<?= $id_jadwal ?>" type="button" class="btn btn-outline-light">Hapus</a>
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