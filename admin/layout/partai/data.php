<?php
require '../../template/header.php';
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
              <li class="breadcrumb-item active">Partai</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Partai</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Anggota</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td style="text-align:center">1</td>
                    <td style="text-align:center"><img src="/reses-dprd/assets/dist/img/golkar.jpg" alt="" border=3 height=60 width=60></img></td>
                    <td>Golkar</td>
                    <td><a href="#">9 anggota</a></td>
                    <td style="text-align:center"><span class="badge bg-primary">Aktif</span></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center">2</td>
                    <td style="text-align:center"><img src="/reses-dprd/assets/dist/img/pdip.jpg" alt="" border=3 height=60 width=60></img></td>
                    <td>PDIP</td>
                    <td><a href="#">4 anggota</a></td>
                    <td style="text-align:center"><span class="badge bg-danger">Non-Aktif</span></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center">3</td>
                    <td style="text-align:center"><img src="/reses-dprd/assets/dist/img/demokrat.png" alt="" border=3 height=60 width=60></img></td>
                    <td>Demokrat</td>
                    <td><a href="#">8 anggota</a></td>
                    <td style="text-align:center"><span class="badge bg-primary">Aktif</span></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

                  </tbody>

                </table>
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
require '../../template/footer.php';
?>