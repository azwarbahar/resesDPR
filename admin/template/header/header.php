<?php
require('../../koneksi.php');

if (!isset($_SESSION['login_admin'])) {
  header("location: ../login.php");
}

// Set Nama Dan Foto Header
$get_id_session = $_SESSION['get_id'];
$query_header_akun = mysqli_query($conn, "SELECT * FROM tb_akun WHERE id = '$get_id_session'");
$get_data_akun = mysqli_fetch_assoc($query_header_akun);
$get_id_akun_admin = $get_data_akun['id_akun'];
$query_header_admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$get_id_akun_admin'");
$get_data_admin = mysqli_fetch_assoc($query_header_admin);
$nama = $get_data_admin['nama_admin'];
$foto = $get_data_admin['foto_admin'];


// CEK DURASI JADWAL RESES
  //cek tgl sekarang
$tanggal_sekarang = date('d-m-Y');

$jadwal = mysqli_query($conn, "SELECT * FROM tb_jadwal");

foreach($jadwal as $dta) {

  $status = null;
  $tanggal_mulai = date('d-m-Y', strtotime($dta['mulai_jadwal']));
  $tanggal_akhir = date('d-m-Y', strtotime($dta['akhir_jadwal']));
  if (strtotime($tanggal_sekarang) < strtotime($tanggal_mulai)) {
    $status = 'Menunggu';
  } else if (strtotime($tanggal_mulai) <= strtotime($tanggal_sekarang) &&
         strtotime($tanggal_akhir) >= strtotime($tanggal_sekarang)) {
          $status = 'Berjalan';
  } else if (strtotime($tanggal_sekarang) > strtotime($tanggal_akhir)) {
    $status = 'Selesai';
  }

  $query = "UPDATE tb_jadwal SET status_jadwal = '$status' WHERE id_jadwal = '$dta[id_jadwal]'";
	mysqli_query($conn, $query);

}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Reses DPRD</title>
  <link rel="icon" href="/reses-dprd/assets/dist/img/soppeng.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- bootstrap-switch-button -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="/reses-dprd/assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/reses-dprd/admin/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->

      <?php
      $jadwal1 = mysqli_query($conn, "SELECT * FROM tb_jadwal WHERE status_jadwal='Berjalan'");
      $dta_jadwal1 = mysqli_fetch_assoc($jadwal1);
        $aspirasi_header = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE status_aspirasi='Kirim' AND id_jadwal='$dta_jadwal1[id_jadwal]'");
        $row_aspirasi_header = mysqli_num_rows($aspirasi_header);
        $row_aspirasi_header_final = $row_aspirasi_header;
        if($row_aspirasi_header_final > 0){
          echo "  <li class='nav-item dropdown'>
                    <a class='nav-link' data-toggle='dropdown' href='#'>
                      <i class='far fa-bell'></i>
                      <span class='badge badge-warning navbar-badge'>$row_aspirasi_header_final</span>
                    </a>
                    <div class='dropdown-menu dropdown-menu-lg dropdown-menu-right'>
                      <span class='dropdown-item dropdown-header'>$row_aspirasi_header_final Pemberitahuan</span>
                      <div class='dropdown-divider'></div>
                      <a href='/reses-dprd/admin/laporan-masuk/data.php' class='dropdown-item'>
                        <i class='fas fa-envelope mr-2'></i> $row_aspirasi_header_final Laporan Masuk
                      </a>
                      <div class='dropdown-divider'></div>
                      <a href='/reses-dprd/admin/laporan-masuk/data.php' class='dropdown-item dropdown-footer'>Lihat Semua</a>
                    </div>
                  </li>";
        } else{
          echo "  <li class='nav-item dropdown'>
                    <a class='nav-link' data-toggle='dropdown' href='#'>
                      <i class='far fa-bell'></i>
                    </a>
                    <div class='dropdown-menu dropdown-menu-lg dropdown-menu-right'>
                      <span class='dropdown-item dropdown-header'>0 Pemberitahuan</span>
                      <div class='dropdown-divider'></div>
                      <a href='#' class='dropdown-item'>
                        <i class='fas fa-envelope mr-2'></i> Tidak Ada
                      </a>
                      <div class='dropdown-divider'></div>
                      <a href='#' class='dropdown-item dropdown-footer'>Lihat Semua</a>
                    </div>
                  </li>";

        }
      ?>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/reses-dprd/admin/index.php" class="brand-link">
      <img src="/reses-dprd/assets/dist/img/soppeng.png" alt="Logo Kabupaten Soppeng" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RESES DPRD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/reses-dprd/admin/user/foto/<?= $foto ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../user/edit.php?id_admin=<?= $get_id_akun_admin ?>" class="d-block"><?= $nama ?></a>
          <a href="../user/edit.php?id_admin=<?= $get_id_akun_admin ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item has-treeview menu-open">
            <a href="/reses-dprd/admin/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/reses-dprd/admin/jadwal-reses/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Reses</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/reses-dprd/admin/dapil/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dapil</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/reses-dprd/admin/partai/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partai</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/reses-dprd/admin/fraksi/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fraksi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/reses-dprd/admin/komisi/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Komisi</p>
                </a>
              </li>
              <br>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
              Anggota DPR
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/reses-dprd/admin/profile-dpr/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota DPR</p>
                </a>
              </li><br>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
              Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/reses-dprd/admin/laporan-masuk/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/reses-dprd/admin/laporan-approve/data.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Approve</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-header">Setting</li>


          <li class="nav-item">
            <a href="/reses-dprd/admin/user/data.php" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="nav-icon fa fa-desktop"></i>
              <p>
                Tema
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="/reses-dprd/logout.php?logout=true&for=login_admin" role="button">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>