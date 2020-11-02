<?php
require '../template/header/header.php';

$id_fraksi = $_GET['id_fraksi'];
$result1 = mysqli_query($conn, "SELECT * FROM tb_fraksi WHERE id_fraksi = '$id_fraksi'");
$dta = mysqli_fetch_assoc($result1);

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
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/fraksi/data.php">Fraksi</a></li>
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
              <h3 class="card-title">Edit Fraksi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Nama Fraksi</label>
                  <select class="form-control select2" style="width: 100%;" name="id_partai" id="id_partai">
                    <!-- <option selected="selected">---- Pilih ----</option> -->
                    <?php
                      $result=mysqli_query($conn,'SELECT * FROM tb_partai');
                      while($row=mysqli_fetch_assoc($result)) {
                        if ($dta['id_partai'] == $row['id_partai']) {
                          $selected = 'selected="selected"';
                        } else {
                          $selected = '';
                        }
                        echo "<option value='$row[id_partai]' $selected >$row[nama_partai]</option> ";
                      }
                    ?>
                  </select>
                </div>
                <div class="col-12">
                  <input type="hidden" name="id_fraksi" value="<?= $dta['id_fraksi'] ?>">
                  <button type="submit" name="update_fraksi" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
                  <a href="/reses-dprd/admin/fraksi/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
                </div>
              </div>
            </form>
          </div>
            <!-- /.card-body -->
        </div>
          <!-- /.card -->
        </div>

        <!-- Anggota Fraksi -->
        <div class="col-md-10">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Anggota Fraksi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th style="width: 120px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $i = 1;
                    $anggota_fraksi = mysqli_query($conn, "SELECT * FROM tb_anggota_fraksi WHERE id_fraksi='$dta[id_fraksi]'");
                    foreach($anggota_fraksi as $dta_fraksi) {
                  ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dta_fraksi['nama_anggota'] ?></td>
                      <td><b><?= $dta_fraksi['jabatan_fraksi'] ?></b></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" data-toggle="modal" data-target="#modal-lg<?= $dta_fraksi['id_anggota_fraksi'] ?>" data-toggle="tooltip" title="Edit" class="btn btn-info"><i class="fas fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger<?= $dta_fraksi['id_anggota_fraksi'] ?>" ><i class="fas fa fa-times"></i></button>
                      </div>
                    </td>
                    </tr>


                    
      <div class="modal fade" id="modal-lg<?= $dta_fraksi['id_anggota_fraksi'] ?>">
        <div class="modal-dialog modal-lg">
          <form method="POST" action="controller.php" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Anggota</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              <?php
                  $result_anggota=mysqli_query($conn,"SELECT * FROM tb_anggota_fraksi WHERE id_anggota_fraksi='$dta_fraksi[id_anggota_fraksi]'");
                ?>
                <label for="inputName">Jabatan</label>
                <select class="form-control select2" style="width: 100%;" name="jabatan_fraksi" id="jabatan_fraksi">
                <?php
                while($row_anggota=mysqli_fetch_assoc($result_anggota)) {
                    echo "<option selected='selected' value='$row_anggota[jabatan_fraksi]'>$row_anggota[jabatan_fraksi]</option>";
                }
                ?>
                    <option value="Pembina">Pembina</option>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Anggota">Anggota</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="inputName">Anggota</label>
                <select class="form-control select2" style="width: 100%;" name="nama_anggota" id="nama_anggota">
                <?php
                  $result_anggota2=mysqli_query($conn,"SELECT * FROM tb_anggota_fraksi WHERE id_anggota_fraksi='$dta_fraksi[id_anggota_fraksi]'");
                  while($row_anggota2=mysqli_fetch_assoc($result_anggota2)) {
                    echo "<option selected='selected' value='$row_anggota2[nama_anggota]'>$row_anggota2[nama_anggota]</option>";
                  }

                  $anggotafraksi=mysqli_query($conn,"SELECT * FROM tb_anggota WHERE id_fraksi='$dta[id_fraksi]'");
                    while($row_fraksi=mysqli_fetch_assoc($anggotafraksi)) {
                      echo "<option value='$row_fraksi[nama_anggota]'>$row_fraksi[nama_anggota]</option>";
                    }
                ?>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="hidden" name="id_fraksi" id="id_fraksi" value="<?= $dta['id_fraksi'] ?>">
              <input type="hidden" name="id_anggota_fraksi" id="id_anggota_fraksi" value="<?= $dta_fraksi['id_anggota_fraksi'] ?>">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" name="update_anggota_fraksi" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      
      <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta_fraksi['id_anggota_fraksi'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Anggota Fraksi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Anggota Fraksi</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_anggota_fraksi=true&id_anggota_fraksi=<?= $dta_fraksi['id_anggota_fraksi'].'&id_fraksi='.$dta['id_fraksi'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
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