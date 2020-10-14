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
                        // echo "<option value='$row[id_partai]'>$row[nama_partai]</option>";
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
            </form>
            </div>
            <!-- /.card-body -->

            <br>
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