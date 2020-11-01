<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// UPDATE ASPIRASI
if (isset($_POST['update_aspirasi'])) {
    $id_aspirasi = $_POST['id_aspirasi'];
    $kegiatan = $_POST['kegiatan'];
    $skpd = $_POST['skpd'];
	$status_aspirasi = 'Kirim';
    $lokasi = $_POST['lokasi'];
    $keterangan_aspirasi = '';
		$query = "UPDATE tb_aspirasi SET kegiatan = '$kegiatan',
										 skpd = '$skpd',
										 lokasi = '$lokasi',
										 status_aspirasi = '$status_aspirasi',
										 keterangan_aspirasi = '$keterangan_aspirasi' WHERE id_aspirasi = '$id_aspirasi'";

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
					location.href = 'data.php';
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



// KIRIM RESES
if (isset($_GET['kirim_reses'])){

	$id_anggota = $_GET['id_anggota'];
	$id_jadwal = $_GET['id_jadwal'];
		$query = "UPDATE tb_aspirasi SET  status_aspirasi = 'Kirim' WHERE id_anggota = '$id_anggota' AND id_jadwal = '$id_jadwal' ";

	// EDIT LAPORAN STATUS
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Reses Berhasil di Kirim',
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
	$id_jadwal = $_GET['id_jadwal'];

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
					location.href = 'data-aspirasi.php?id_lokasi=<?= $id_lokasi.'&id_jadwal='.$id_jadwal ?>';
				});
			});
		</script>
	<?php }
}

?>