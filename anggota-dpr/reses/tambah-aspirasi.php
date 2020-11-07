<?php
require '../template/header/header.php';

$id_jadwal = $_GET['id_jadwal'];
$id_lokasi = $_GET['id_lokasi'];
$lokasi = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_lokasi='$id_lokasi'");
$dta_lokasi = mysqli_fetch_assoc($lokasi);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lokasi : <?= $dta_lokasi['nama_lokasi'] ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/">Home</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/reses/data.php">Lokasi Reses</a></li>
              <li class="breadcrumb-item"><a href="/reses-dprd/anggota-dpr/reses/data-aspirasi.php?id_lokasi=<?= $id_lokasi ?>">Aspirasi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
              <h3 class="card-title">Tambah Aspirasi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form method="POST" action="controller.php" enctype="multipart/form-data">
            <div class="card-body">

              <div class="form-group">
                <label>Kegiatan</label>
                <textarea class="form-control"  name="kegiatan" id="kegiatan" rows="3" placeholder="Kegiatan ..."></textarea>
              </div>

              <!-- Status Kawin -->
              <div class="form-group">
                <label for="inputName">SKPD</label>
                <select class="form-control select2" style="width: 100%;" name="skpd" id="skpd">
                    <option selected="selected" value="-" > -- Pilih --</option>
                    <option value="Dinas Pendidikan dan Kebudayaan" >Dinas Pendidikan dan Kebudayaan</option>
                    <option value="Dinas Komunikasi dan Informatika"  >Dinas Komunikasi dan Informatika</option>
                    <option value="Dinas Kependudukan dan Pencatatan Sipil"  >Dinas Kependudukan dan Pencatatan Sipil</option>
                    <option value="Dinas Penanaman Modal, Pelayanan Terpadu Satu Pintu, Tenaga Kerja dan Transmigrasi"  >Dinas Penanaman Modal, Pelayanan Terpadu Satu Pintu, Tenaga Kerja dan Transmigrasi</option>
                    <option value="Dinas Pariwisata, Kepemudaan dan Olahraga"  >Dinas Pariwisata, Kepemudaan dan Olahraga</option>
                    <option value="Dinas Pekerjaan Umum dan Penataan Ruang"  >Dinas Pekerjaan Umum dan Penataan Ruang</option>
                    <option value="Dinas Perumahan dan Kawasan Permukiman"  >Dinas Perumahan dan Kawasan Permukiman</option>
                    <option value="Dinas Perdagangan, Perindustrian, Koperasi dan UKM"  >Dinas Perdagangan, Perindustrian, Koperasi dan UKM</option>
                    <option value="Dinas Kesehatan"  >Dinas Kesehatan</option>
                    <option value="Dinas Sosial"  >Dinas Sosial</option>
                    <option value="Dinas Perhubungan"  >Dinas Perhubungan</option>
                    <option value="Dinas Tanaman Pangan, Hortikultura, Perkebunan, dan Ketahanan Pangan"  >Dinas Tanaman Pangan, Hortikultura, Perkebunan, dan Ketahanan Pangan</option>
                    <option value="Dinas Pemberdayaan Masyarakat Desa"  >Dinas Pemberdayaan Masyarakat Desa</option>
                    <option value="Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana"  >Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana</option>
                    <option value="Dinas Peternakan, Kesehatan Hewan dan Perikanan"  >Dinas Peternakan, Kesehatan Hewan dan Perikanan</option>
                    <option value="Dinas Lingkungan Hidup"  >Dinas Lingkungan Hidup</option>
                    <option value="Dinas Perpustakaan dan Kearsipan"  >Dinas Perpustakaan dan Kearsipan</option>
                    <option value="Satuan Polisi Pamong Praja dan Pemadam Kebakaran"  >Satuan Polisi Pamong Praja dan Pemadam Kebakaran</option>
                    <option value="Rumah Sakit Umum Daerah La Temmamala"  >Rumah Sakit Umum Daerah La Temmamala</option>
                  </select>
              </div>

              <div class="form-group">
                <label>Lokasi</label>
                <textarea class="form-control" name="lokasi" id="lokasi" rows="3" placeholder="Lokasi ..."></textarea>
              </div>

              <div class="col-12">
                <input type="text" hidden id="id_jadwal" name="id_jadwal" value="<?= $id_jadwal ?>" class="form-control">
                <input type="text" hidden id="id_lokasi" name="id_lokasi" value="<?= $id_lokasi ?>" class="form-control">
                <input type="text" hidden id="id_anggota" name="id_anggota" value="<?= $get_id_akun_anggota ?>" class="form-control">
              <button type="submit" name="submit_aspirasi" class="btn btn-success float-right" style="margin-top: 3% ; margin-left: 2%;">Simpan</button>
              <a href="/reses-dprd/anggota-dpr/reses/data-aspirasi.php?id_lokasi=<?= $id_lokasi.'&id_jadwal='.$id_jadwal ?>" class="btn btn-secondary float-right" style="margin-top: 3% ;">Batal</a>
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