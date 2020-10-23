<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT LOKASI RESES
if (isset($_POST['submit_lokasi_reses'])) {
	$id_anggota = $_POST['id_anggota'];
	$id_jadwal = $_POST['id_jadwal'];
	$nama_lokasi = $_POST['nama_lokasi'];
	$tanggal_lokasi = $_POST['tanggal_lokasi'];


    // TAMBAH DATA
	$query= "INSERT INTO tb_lokasi_reses VALUES (NULL, '$id_anggota',
												'$id_jadwal',
												'$nama_lokasi',
												'$tanggal_lokasi')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Lokasi Reses Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// SUBMIT ASPIRASI
if (isset($_POST['submit_aspirasi'])) {
	$id_lokasi = $_POST['id_lokasi'];
	$id_anggota = $_POST['id_anggota'];
	$kegiatan = $_POST['kegiatan'];
	$skpd = $_POST['skpd'];
	$lokasi = $_POST['lokasi'];


    // TAMBAH DATA
	$query= "INSERT INTO tb_aspirasi VALUES (NULL, '$id_lokasi',
												'$id_anggota',
												'$kegiatan',
												'$skpd',
												'$lokasi')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Aspirasi Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = "data-aspirasi.php?id_lokasi=<?= $id_lokasi ?>";
				});
			});
		</script>
	<?php }
}


// UPDATE LOKASI RESES
if (isset($_POST['update_lokasi_reses'])) {
	$id_lokasi = $_POST['id_lokasi'];
	$nama_lokasi = $_POST['nama_lokasi'];
	$tanggal_lokasi = $_POST['tanggal_lokasi'];
		$query = "UPDATE tb_lokasi_reses SET nama_lokasi = '$nama_lokasi',
										tanggal_lokasi = '$tanggal_lokasi'
										WHERE id_lokasi = '$id_lokasi'";

	// EDIT LAPORAN
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Lokasi Reses berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE ASPIRASI
if (isset($_POST['update_aspirasi'])) {
    $id_lokasi = $_POST['id_lokasi'];
    $id_aspirasi = $_POST['id_aspirasi'];
    $kegiatan = $_POST['kegiatan'];
    $skpd = $_POST['skpd'];
    $lokasi = $_POST['lokasi'];
		$query = "UPDATE tb_aspirasi SET kegiatan = '$kegiatan', skpd = '$skpd', lokasi = '$lokasi' WHERE id_aspirasi = '$id_aspirasi'";

	// EDIT LAPORAN
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Aspirasi berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data-aspirasi.php?id_lokasi=<?= $id_lokasi ?>';
				});
			});
		</script>
	<?php }
}

// UPDATE LAPORAN STATUS
if (isset($_POST['update_status_laporan'])){

	$id_laporan = $_POST['id_laporan'];
	$status_laporan = $_POST['status_laporan'];

	if ($status_laporan == "Pending"){
		$query = "UPDATE tb_laporan SET  status_laporan = 'Masuk' WHERE id_laporan = '$id_laporan'";
	} else if ($status_laporan == "Masuk"){
		$query = "UPDATE tb_laporan SET  status_laporan = 'Pending' WHERE id_laporan = '$id_laporan'";
	}

	// EDIT LAPORAN STATUS
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Laporan berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }

}


// HAPUS LOKASI RESES
if (isset($_GET['hapus_lokasi_reses'])) {
	$id_lokasi = $_GET['id_lokasi'];

	$query = "DELETE FROM tb_lokasi_reses WHERE id_lokasi = '$id_lokasi'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Lokasi Reses berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS ASPIRASI
if (isset($_GET['hapus_aspirasi'])) {
	$id_aspirasi = $_GET['id_aspirasi'];
	$id_lokasi = $_GET['id_lokasi'];

	$query = "DELETE FROM tb_aspirasi WHERE id_aspirasi = '$id_aspirasi'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Aspirasi berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data-aspirasi.php?id_lokasi=<?= $id_lokasi ?>';
				});
			});
		</script>
	<?php }
}

?>