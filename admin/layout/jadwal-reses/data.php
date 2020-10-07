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
            <h1 class="m-0 text-dark">Jadwal Reses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Reses</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Jadwal</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mulai</th>
                    <th>Akhir</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td>1</td>
                    <td>Semester I</td>
                    <td>12 Januari 2020</td>
                    <td>12 April 2020</td>
                    <td><a href="#">9 Laporan</a></td>
                    <td style="text-align:center"><span class="badge bg-success">Selesai</span></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Semester II</td>
                    <td>12 Mei 2020</td>
                    <td>12 Agustus 2020</td>
                    <td><a href="#">20 Laporan</a></td>
                    <td style="text-align:center"><span class="badge bg-primary">Berjalan</span></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Semester III</td>
                    <td>12 September 2020</td>
                    <td>12 Desember 2020</td>
                    <td><a href="#">- Laporan</a></td>
                    <td style="text-align:center"><span class="badge bg-secondary">Menunggu</span></td>
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