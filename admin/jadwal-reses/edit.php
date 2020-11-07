<?php
require '../template/header/header.php';

$id_jadwal = $_GET['id_jadwal'];
$result1 = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE id_jadwal = '$id_jadwal'");
$dta = mysqli_fetch_assoc($result1);

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
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/jadwal-reses/data.php">Jadwal Reses</a></li>
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
              <h3 class="card-title">Edit Jadwal</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <!-- Nama Jadwal -->
              <div class="form-group">
                <label for="inputName">Nama Jadwal</label>
                <input type="text" id="nama_jadwal" value="<?= $dta['nama_jadwal'] ?>" name="nama_jadwal"class="form-control">
              </div>

              <!-- Jadwal Mulai -->
              <div class="form-group">
                <label for="inputName" class="bg-primary"> Jadwal Mulai </label>
                <div class="row">
                  <div class="col-6">
                    <input type="date" value="<?= $dta['mulai_jadwal'] ?>" class="form-control" name="tanggal_mulai">
                  </div>
                </div>
              </div>
              <!-- End Jadwal Mulai -->

              <!-- Jadwal Akhir -->
              <div class="form-group">
                <label for="inputName" class="bg-warning"> Jadwal Akhir </label>
                <div class="row">
                  <div class="col-6">
                    <input type="date" value="<?= $dta['akhir_jadwal'] ?>" class="form-control" name="tanggal_akhir">
                  </div>
                </div>
              </div>
              <!-- End Jadwal Akhir -->

              <div class="col-12">
              <input type="hidden" name="id_jadwal" value="<?= $dta['id_jadwal'] ?>">
              <button type="submit" name="update_jadwal" id="update_jadwal" disabled="" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/admin/jadwal-reses/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
	$('form')
		.each(function(){
			$(this).data('serialized', $(this).serialize())
		})
        .on('change input', function(){
            $(this)
                .find('input:submit, button:submit')
                    .attr('disabled', $(this).serialize() == $(this).data('serialized'))
            ;
         })
		.find('input:submit, button:submit')
			.attr('disabled', true)
	;
</script>


<?php
require '../template/footer/footer.php';
?>