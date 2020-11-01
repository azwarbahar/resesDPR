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
                      <select class="form-control select2" style="width: 100%;" name="jadwal_laporan" id="jadwal_laporan">
                      <option selected="selected" value="-">- Jadwal -</option>
                      <?php
                        $jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal");
                        // $dta_jadwal = mysqli_fetch_assoc($jadwal);
                        foreach($jadwal as $dta){
                          echo "<option  value='$dta[id_jadwal]'>$dta[nama_jadwal]</option>";
                        }
                      ?>
                      </select>

                      <input type="hidden" id="idanggota" value="<?= $get_id_akun_anggota ?>">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="inputName">Lokasi</label>
                      <select class="form-control select2" style="width: 100%;" name="lokasi_laporan" id="lokasi_laporan">
                        <option selected="selected" value="-">- Lokasi -</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
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
                  <tbody id="tabeldata">
                  </tbody>

                </table>

              </div>
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