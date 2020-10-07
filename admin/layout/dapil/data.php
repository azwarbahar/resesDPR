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
            <h1 class="m-0 text-dark">Dapil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reses-dprd/admin/">Home</a></li>
              <li class="breadcrumb-item active">Dapil</li>
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
                <a href="tambah.php" type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>&nbsp Tambah Dapil</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Daerah</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td style="text-align:center">1</td>
                    <td>Daerah Pilihan I</td>
                    <td>

                      <ul>
                        <li>Kecamatan Marioriwawo</li>
                      </ul>

                    </td>
                    <td><a href="#">9 anggota</a></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center">2</td>
                    <td>Daerah Pilihan II</td>
                    <td>
                      <ul>
                        <li>Kecamatan Lilirilau</li>
                        <li>Kecamatan Liliriaja</li>
                        <li>Kecamatan Citta</li>
                      </ul>

                    </td>
                    <td><a href="#">3 anggota</a></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

                  <tr>
                    <td style="text-align:center">3</td>
                    <td>Daerah Pilihan III</td>
                    <td>
                      <ul>
                        <li>Kecamatan Lalabata</li>
                        <li>Kecamatan Ganra</li>
                      </ul>

                    </td>
                    <td><a href="#">3 anggota</a></td>
                    <td style="text-align:center">
                        <a href="edit.php" type="button" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                        <a href="#" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>
                  
                  <tr>
                    <td style="text-align:center">4</td>
                    <td>Daerah Pilihan IV</td>
                    <td>
                      <ul>
                        <li>Kecamatan Marioriawa</li>
                        <li>Kecamatan Donri Donri</li>
                      </ul>

                    </td>
                    <td><a href="#">5 anggota</a></td>
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