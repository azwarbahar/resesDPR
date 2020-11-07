<?php
require '../template/header/header.php';

$id_lokasi = $_GET['id_lokasi'];
$lokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_lokasi = '$id_lokasi'");
$dta_lokasi = mysqli_fetch_assoc($lokasi);
$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
$dta_jadwal = mysqli_fetch_assoc($jadwal);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/reses/data.php">Reses</a></li>
              <li class="breadcrumb-item active">Tambah Lokasi</li>
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
              <h3 class="card-title">Tambah Lokasi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Jadwal</label>
                <input type="text" id="bidang_komisi" disabled value="<?= $dta_jadwal['nama_jadwal'] ?>" name="bidang_komisi"class="form-control">
                <input type="text" hidden id="id_jadwal" value="<?= $dta_jadwal['id_jadwal'] ?>" name="id_jadwal"class="form-control">
                <input type="text" hidden id="id_anggota" value="<?= $get_id_akun_anggota ?>" name="id_anggota"class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Lokasi</label>
                <input type="text" value="<?= $dta_lokasi['nama_lokasi'] ?>" id="nama_lokasi" name="nama_lokasi"class="form-control">
              </div>

              <!-- Tanggal -->
              <div class="form-group">
                <label for="inputName"> tanggal </label>
                <div class="row">
                  <div class="col-6">
                    <input type="date" value="<?= $dta_lokasi['tanggal_lokasi'] ?>" class="form-control" name="tanggal_lokasi">
                  </div>
                </div>
              </div>
              <!-- End Tanggal -->

              <div class="col-12">
                <input type="text" hidden value="<?= $dta_lokasi['id_lokasi'] ?>" id="id_lokasi" name="id_lokasi"class="form-control">
              <button type="submit" name="update_lokasi_reses" id="update_lokasi_reses" disabled="" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/anggota-dpr/reses/data.php" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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