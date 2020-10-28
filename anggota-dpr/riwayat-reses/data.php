<?php
require '../template/header/header.php';

// $laporan = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE id_anggota=$get_id_akun_anggota AND status_laporan='Approve'");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Riwayat Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item active">Laporan Approve</li>
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
                <div class="row">

                  <div class="col-3">
                    <div class="form-group">
                      <label for="inputName">Jadwal</label>
                      <select class="form-control select2" style="width: 100%;" name="tanggal" id="tanggal">
                        <option selected="selected" value="-">- Jadwal -</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="inputName">Lokasi</label>
                      <select class="form-control select2" style="width: 100%;" name="tanggal" id="tanggal">
                        <option selected="selected" value="-">- Lokasi -</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-1">
                    <div class="form-group">
                      <label for="inputName"></label>
                      <button type="submit" name="submit_anggota" style="width: 100%;" class="btn btn-success" >Cari</button>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>SKPD</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody> -->
                  <?php
                  //  $i = 1; foreach($laporan as $dta) {
                    ?>
                  <!-- <tr>
                    <td style="text-align:center">1</td>
                    <td>.</td>
                    <td>.</td>
                    <td>.</td>
                    <td style='text-align:center'><span class='badge bg-primary'>.</span></td>

                  </tr>

      <!-- Modal Hapus -->
      <!-- <div class="modal fade" tabindex="-1" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Laporan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Laporan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_laporan=true&id_laporan=#" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div> -->
          <!-- /.modal-content -->
        <!-- </div> -->
        <!-- /.modal-dialog -->
      <!-- </div> -->
     

                  <?php
                  // $i = $i + 1; }
                  ?>
                  <!-- </tbody> -->

                <!-- </table> -->
              <!-- </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
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