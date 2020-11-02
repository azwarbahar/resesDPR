<?php
require '../template/header/header.php';

$fraksi = mysqli_query($conn, "SELECT * FROM tb_fraksi");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fraksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Fraksi</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Fraksi</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($fraksi as $dta) { ?>
                  <tr>
                  <td style="text-align:center"><?= $i ?></td>
                  <?php
                    $partai = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = $dta[id_partai]");
                    while($row=mysqli_fetch_assoc($partai)) {
                      echo "<td style='text-align:center'><img src='../partai/gambar/$row[gambar_partai]' alt='' border=3 height=60 width=60></img></td>";
                      echo " <td>Fraksi $row[nama_partai]</td>";
                    }
                  ?>
                    <td><a href="#">9 anggota</a></td>
                    <td style="text-align:center">
                        <a href="tambah-anggota-fraksi.php?id_fraksi=<?= $dta['id_fraksi'] ?>" class="btn btn-primary"><i class="fa fa-plus-square"></i></a>
                        <a href="edit.php?id_fraksi=<?= $dta['id_fraksi'] ?>" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta['id_fraksi'] ?>" ><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta['id_fraksi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Partai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Fraksi</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_fraksi=true&id_fraksi=<?= $dta['id_fraksi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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