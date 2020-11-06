<?php
require '../template/header/header.php';

$result = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_anggota = '$get_id_akun_anggota'");
$dta = mysqli_fetch_assoc($result);

$partai = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = '$dta[id_partai]'");
$dta_partai = mysqli_fetch_assoc($partai);

$dapil = mysqli_query($conn, "SELECT * FROM tb_dapil WHERE id_dapil = '$dta[id_dapil]'");
$dta_dapil = mysqli_fetch_assoc($dapil);

$komisi = mysqli_query($conn, "SELECT * FROM tb_komisi WHERE id_komisi = '$dta[id_komisi]'");
$dta_komisi = mysqli_fetch_assoc($komisi);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
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
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Profil</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
              <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="img-fluid" src="/reses-dprd/admin/profile-dpr/foto/<?= $dta['foto_anggota'] ?>" style="max-width: 280px; max-height: 350px; min-width: 280px; min-height: 350px;" alt="User profile picture">
                    </div>
                    <br>
                    <h5 class="text-center"><?= $dta['nama_anggota'] ?></h5>
                    <p class="text-muted text-center"><?= $dta['jabatan_anggota'] ?></p>
                    <ul class="list-group list-group-unbordered mb-3"></ul>

                    <a href="edit.php?id_anggota=<?= $dta['id_anggota'] ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                  <h5 class="text-center">Partai</h5>
                    <div class="text-center">
                      <img src="/reses-dprd/admin/partai/gambar/<?= $dta_partai['gambar_partai'] ?>" style="max-width: 300px; max-height: 200px; min-width: 300px; min-height: 200px;" alt="User profile picture">
                    </div>
                    <br>
                    <h5 class="text-center"><b><?= $dta_partai['nama_partai'] ?></b></h5>
                  </div>
                  <!-- /.card-body -->
                </div>

                <!-- /.card -->
              </div>

          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab">Biodata</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profile Anggota Dewan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#akun" data-toggle="tab">Akun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="biodata">
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item mb-3">
                        <b>Nama Lengkap :</b> <a class="float-right"><?= $dta['nama_anggota'] ?></a>
                      </li>
                      <li class="list-group-item mb-3">
                        <b>Alamat :</b> <a class="float-right"><?= $dta['alamat_anggota'] ?></a>
                      </li>
                      <li class="list-group-item mb-3">
                        <b>Tempat Lahir :</b> <a class="float-right"><?= $dta['tempat_lahir_anggota'] ?></a>
                      </li>
                      <li class="list-group-item mb-3">
                        <b>Tanggal Lahir :</b> <a class="float-right"><?= $dta['tanggal_lahir_anggota'] ?></a>
                      </li>
                      <li class="list-group-item mb-3">
                        <b>Agama :</b> <a class="float-right"><?= $dta['agama_anggota'] ?></a>
                      </li>
                      <li class="list-group-item mb-3">
                        <b>Status Kawin :</b> <a class="float-right"><?= $dta['status_kawin'] ?></a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="profile">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled id="jabatan" value="<?= $dta['jabatan_anggota'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Partai</label>
                        <div class="col-sm-10">
                          <input type="text" disabled class="form-control" id="partai" value="<?= $dta_partai['nama_partai'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Dapil</label>
                        <div class="col-sm-10">
                          <input type="text" disabled class="form-control" id="dapil" value="Daerah Pilihan <?= $dta_dapil['nama_dapil'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Komisi</label>
                        <div class="col-sm-10">
                        <input type="text" disabled class="form-control" id="komisi" value="<?= $dta_komisi['nama_komisi'].' ('.$dta_komisi['bidang_komisi'].')'?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Fraksi</label>
                        <div class="col-sm-10">
                          <?php

                            $fraksi = mysqli_query($conn, "SELECT * FROM tb_fraksi WHERE id_fraksi = '$dta[id_fraksi]'");
                            $dta_fraksi = mysqli_fetch_assoc($fraksi);
                            $fraksi_partai = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = '$dta_fraksi[id_partai]'");
                            $dta_fraksi_partai = mysqli_fetch_assoc($fraksi_partai);

                          ?>
                          <input type="text" disabled class="form-control" id="fraksi" value="<?= $dta_fraksi_partai['nama_partai'] ?>">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  
                  <div class="tab-pane" id="akun">
                    <form class="form-horizontal">

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" disabled id="jabatan" value="<?= $get_data_akun['username'] ?>">
                        </div>
                      </div>
                      <p class="mb-1 float-right">
                        <a href="reset-password.php?id=<?= $get_id_session ?>">Ubah Password</a>
                      </p>
                    </form>
                  </div>
                  <!-- /.tab-pane -->


                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->

          </div>


            </div>

          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
require '../template/footer/footer.php';
?>