<?php
require '../template/header/header.php';

$id_komisi = $_GET['id_komisi'];
$result1 = mysqli_query($conn, "SELECT * FROM tb_komisi WHERE id_komisi = '$id_komisi'");
$dta = mysqli_fetch_assoc($result1);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Komisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/komisi/data.php">Komisi</a></li>
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
              <h3 class="card-title">Edit Komisi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Nama Komisi</label>
                <input type="text" id="nama_komisi" value="<?= $dta['nama_komisi'] ?>" placeholder="Komisi I" name="nama_komisi"class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Bidang</label>
                <input type="text" id="bidang_komisi" value="<?= $dta['bidang_komisi'] ?>" placeholder="Bidang Pemerintahan" name="bidang_komisi"class="form-control">
              </div>

              <div class="col-12">
              <input type="hidden" name="id_komisi" value="<?= $dta['id_komisi'] ?>">
              <button type="submit" name="update_komisi" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/admin/komisi/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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