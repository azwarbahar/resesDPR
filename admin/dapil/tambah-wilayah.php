<?php
require '../template/header/header.php';

$id_dapil = $_GET['id_dapil'];
$dapil = mysqli_query($conn, "SELECT * FROM tb_dapil WHERE id_dapil = '$id_dapil'");
$dta_dapil = mysqli_fetch_assoc($dapil);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dapil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/dapil/data.php">Dapil</a></li>
              <li class="breadcrumb-item active">Tambah Wilayah Dapil</li>
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
              <h3 class="card-title">Tambah Wilayah Dapil</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Dapil</label>
                <input type="text" value="<?= $dta_dapil['nama_dapil']?>" id="nama_dapil" name="nama_dapil"class="form-control" disabled>
              </div>

              <div class="form-group">
                <label for="inputName">Nama Wilayah (Kecamatan)</label>
                <input type="text" id="nama_kecamatan" name="nama_kecamatan"class="form-control">
              </div>

              <div class="col-12">
              <input type="text" hidden id="id_dapil" value="<?= $dta_dapil['id_dapil']?>" name="id_dapil"class="form-control">
              <button type="submit" name="submit_dapil_wilayah" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/admin/dapil/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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