<?php
require '../template/header/header.php';

$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jadwal Reses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Reses</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Jadwal</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mulai</th>
                    <th>Akhir</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($jadwal as $dta) { ?>
                  <tr>
                    <td style="text-align:center"><?= $i ?></td>
                    <td><?= $dta['nama_jadwal']?></td>
                    <td><?= $dta['mulai_jadwal']?></td>
                    <td><?= $dta['akhir_jadwal']?></td>
                    <?php
                      $laporan = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE id_jadwal='$dta[id_jadwal]'");
                      $row = mysqli_num_rows($laporan);
                      $rowfinal = $row;
                      echo "<td style='text-align:center'>$rowfinal Laporan</td>";

                    ?>
                    <?php
                      if ($dta['status_jadwal'] == "Menunggu"){
                        echo "<td style='text-align:center'><span class='badge bg-secondary'>Menunggu</span></td>";
                      } else if ($dta['status_jadwal'] == "Berjalan"){
                        echo "<td style='text-align:center'><span class='badge bg-primary'>Berjalan</span></td>";
                      } else if ($dta['status_jadwal'] == "Selesai"){
                        echo "<td style='text-align:center'><span class='badge bg-success'>Selesai</span></td>";
                      }
                    ?>
                    <td style="text-align:center">
                        <a href="edit.php?id_jadwal=<?= $dta['id_jadwal'] ?>" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta['id_jadwal'] ?>" ><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta['id_jadwal'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Jadwal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Jadwal</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_jadwal=true&id_jadwal=<?= $dta['id_jadwal'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                  <?php $i = $i + 1; } ?>
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