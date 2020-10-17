<?php
require '../template/header/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Anggota DPR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/profile-dpr/data.php">Anggota DPR</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <form method="POST" action="controller.php" enctype="multipart/form-data">
      <div class="row">

        <div class="col-md-6">
          <!-- CARD BIODATA -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Biodata</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <!-- Nama Lengkap -->
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control">
              </div>

              <!-- Alamat -->
              <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <input id="alamat" name="alamat" class="form-control" >
              </div>

              <!-- Tempat Lahir -->
              <div class="form-group">
                <label for="inputDescription">Tempat Lahir</label>
                <input id="tempat_lahir" name="tempat_lahir" class="form-control" >
              </div>

              <!-- TTL -->
              <div class="form-group">
                <label for="inputName">Tanggal Lahir</label>
                <div class="row">

                  <!-- Tanggal -->
                  <div class="col-3">
                    <select class="form-control select2" style="width: 100%;" name="tanggal" id="tanggal">
                      <option selected="selected" value="-">- Tgl -</option>
                      <?php
                        for ($tgl = 1; $tgl <= 31; $tgl++) {
                          echo "<option value='$tgl'>$tgl</option>";
                        }
                      ?>
                    </select>
                  </div>

                  <!-- Bulan -->
                  <div class="col-5">
                  <select class="form-control select2" style="width: 100%;" name="bulan" id="bulan">
                      <option selected="selected" value="-">- Bulan -</option>
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>

                  <!-- Tahun -->
                  <div class="col-4">
                  <select class="form-control select2" style="width: 100%;" name="tahun" id="tahun">
                      <option selected="selected" value="-">- Tahun -</option>
                      <?php
                        for ($thn = 2021; $thn >= 1910; $thn--) {
                          echo "<option value='$thn'>$thn</option>";
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Agama -->
              <div class="form-group">
                <label for="inputName">Agama</label>
                <select class="form-control select2" style="width: 100%;" name="agama" id="agama">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <option value="Islam">Islam</option>
                    <option value="Keristen">Keristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
              </div>

              <!-- Status Kawin -->
              <div class="form-group">
                <label for="inputName">Status Perkawinan</label>
                <select class="form-control select2" style="width: 100%;" name="status_kawin" id="status_kawin">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                  </select>
              </div>

              <!-- Usernam dan Password -->
              <div class="form-group">
                <label for="inputDescription">Username dan Password</label>
                <input id="username" name="username" class="form-control" required>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- CARD PROFIL ANGOTA DEWAN -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Profil Anggota Dewan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">

              <!-- Jabatan -->
              <div class="form-group">
                <label for="inputName">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-control">
              </div>

               <!-- Nama Partai -->
              <div class="form-group">
              <label for="inputName">Nama Partai</label>
                <select class="form-control select2" style="width: 100%;" name="id_partai" id="id_partai">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <?php
                      $partai=mysqli_query($conn,'SELECT * FROM tb_partai');
                      while($row_partai=mysqli_fetch_assoc($partai)) {
                        echo "<option value='$row_partai[id_partai]'>$row_partai[nama_partai]</option>";
                      }
                    ?>
                  </select>
              </div>

               <!-- Nama Dapil -->
              <div class="form-group">
              <label for="inputName">Nama Dapil</label>
                <select class="form-control select2" style="width: 100%;" name="id_dapil" id="id_dapil">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <?php
                      $dapil=mysqli_query($conn,'SELECT * FROM tb_dapil');
                      while($row_dapil=mysqli_fetch_assoc($dapil)) {
                        echo "<option value='$row_dapil[id_dapil]'>$row_dapil[nama_dapil]</option>";
                      }
                    ?>
                  </select>
              </div>

               <!-- Nama Komisi -->
              <div class="form-group">
              <label for="inputName">Komisi</label>
                <select class="form-control select2" style="width: 100%;" name="id_komisi" id="id_komisi">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <?php
                      $komisi=mysqli_query($conn,'SELECT * FROM tb_komisi');
                      while($row_komisi=mysqli_fetch_assoc($komisi)) {
                        echo "<option value='$row_komisi[id_komisi]'>$row_komisi[nama_komisi] ($row_komisi[bidang_komisi])</option>";
                      }
                    ?>
                  </select>
              </div>

               <!-- Nama Fraksi -->
              <div class="form-group">
                <label for="inputName">Nama Fraksi</label>
                <select class="form-control select2" style="width: 100%;" name="id_fraksi" id="id_fraksi">
                    <option selected="selected" value="-">---- Pilih ----</option>
                    <?php
                      $fraksi=mysqli_query($conn,'SELECT * FROM tb_fraksi');
                      while($row_fraksi=mysqli_fetch_assoc($fraksi)) {
                        $aa = $row_fraksi['id_partai'];
                        $namapartai = mysqli_query($conn,"SELECT * FROM tb_partai WHERE id_partai= $row_fraksi[id_partai] ");
                        $row_partai=mysqli_fetch_assoc($namapartai);
                        echo "<option value='$row_fraksi[id_fraksi]'>$row_partai[nama_partai]</option>";
                      }
                    ?>
                </select>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- CARD FOTO PROFILE -->
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Foto Profil</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <!-- Foto -->
            <div class="card-body">
              <div class="form-group" style="text-align: center;">
                <img src="/reses-dprd/assets/dist/img/boxed-bg.jpg" id="blah" alt="" class="img img-fluid" style="max-height: 300px; max-width: 300px;">
              </div>
              <!-- Button Unggah -->
              <div class="form-group" style="text-align: center;">
                <input type="file" class="btn btn-success" id="foto_anggota" name="foto_anggota" onchange="readURL(this);" >
                <label hidden class="custom-file-label" for="foto_anggota">Cari file</label>
              </div>
            </div>


            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-12">
          <button type="submit" name="submit_anggota" class="btn btn-success float-right"  style=" margin-left: 2%">Simpan</button>
          <a href="#" class="btn btn-secondary float-right">Batal</a>
        </div>
      </div>
      <br><br>
      </form>
    </section>
    <!-- /.content -->




    </div>
  <!-- /.content-wrapper -->


<?php
require_once '../template/footer/footer.php';
?>