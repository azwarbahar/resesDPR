<?php
require_once '../template/header/header.php';

$id_partai = $_GET['id_partai'];
$result = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = '$id_partai'");
$dta = mysqli_fetch_assoc($result);


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Partai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/partai/data.php">Partai</a></li>
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
              <h3 class="card-title">Edit Partai</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Partai</label>
                <input type="text" id="nama_partai" name="nama_partai"class="form-control" value="<?= $dta['nama_partai'] ?>">
              </div>

              <div class="form-group">
                    <label for="customFile">Logo Partai</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar_partai" name="gambar_partai" onchange="readURL(this);" >
                      <label class="custom-file-label" for="gambar_partai">Choose file</label>
                    </div>
                  </div>
                  <br>
                  <img style="max-width:180px; max-height:180px;" id="blah" src="gambar/<?php echo $dta['gambar_partai'] ?>" alt="your image" />

              <div class="col-12">
              <input type="hidden" name="id_partai" value="<?= $dta['id_partai'] ?>">
              <input type="hidden" name="foto_now" value="<?= $dta['gambar_partai'] ?>">
              <button type="submit" name="edit_partai" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/admin/partai/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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