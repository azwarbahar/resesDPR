<?php
require '../template/header/header.php';
$anggota = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE status_anggota= 'Aktif' ");
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
              <li class="breadcrumb-item active">Anggota DPR</li>
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

            <!-- card -->
            <div class="card">
              <div class="card-header">
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Anggota</a>
              </div>


              <!-- Default box -->
                 <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row d-flex align-items-stretch">

                        <?php $i = 1; foreach($anggota as $dta) { ?>
                             <!-- Profil 1 -->
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                    <div class="card-header text-muted border-bottom-0">
                                      Profil
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b><?= $dta['nama_anggota'] ?></b></h2>
                                                <p class="text-muted text-sm"><b>AKD: </b><?= $dta['jabatan_anggota'] ?></p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= $dta['alamat_anggota'] ?></li><br>
                                                    <?php
                                                        $partai = mysqli_query($conn, "SELECT * FROM tb_partai WHERE id_partai = $dta[id_partai]");
                                                        while($row=mysqli_fetch_assoc($partai)) {
                                                            echo "<li class='small'><span class='fa-li'><i class='fas fa-lg fa-flag'></i></span> Partai: $row[nama_partai]</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="foto/<?= $dta['foto_anggota'] ?>" alt="" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="#" type="button" class="btn btn-sm bg-danger"  data-toggle="modal" data-target="#modal-danger<?= $dta['id_anggota'] ?>"><i class="fas fa-trash"></i></a>
                                            <a href="#" class="btn btn-sm bg-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="detail.php" class="btn btn-sm btn-primary"><i class="fas fa-user"></i> Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Profil 1 -->
                                  <!-- Modal Hapus -->
      <div class="modal fade" tabindex="-1" id="modal-danger<?= $dta['id_anggota'] ?>">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Anggota</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin Ingin Menghapus Anggota</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
              <a href="controller.php?hapus_anggota=true&id_anggota=<?= $dta['id_anggota'] ?>" type="button" class="btn btn-outline-light">Hapus</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                        <?php $i = $i + 1; } ?>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
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