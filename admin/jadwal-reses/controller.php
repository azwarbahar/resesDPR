<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT JADWAL
if (isset($_POST['submit_jadwal'])) {
	$nama_jadwal = $_POST['nama_jadwal'];
	$mulai_jadwal = $_POST['tanggal_mulai'];
	$akhir_jadwal = $_POST['tanggal_akhir'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_jadwal VALUES (NULL, '$nama_jadwal', '$mulai_jadwal', '$akhir_jadwal', '')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Jadwal Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE JADWAL
if (isset($_POST['update_jadwal'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $nama_jadwal = $_POST['nama_jadwal'];
    $mulai_jadwal = $_POST['tanggal_mulai'];
	$akhir_jadwal = $_POST['tanggal_akhir'];

		$query = "UPDATE tb_jadwal SET nama_jadwal = '$nama_jadwal', mulai_jadwal = '$mulai_jadwal', akhir_jadwal = '$akhir_jadwal' WHERE id_jadwal = '$id_jadwal'";

	// EDIT JADWAL
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Jadwal berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS JADWAL
if (isset($_GET['hapus_jadwal'])) {
	$id_jadwal = $_GET['id_jadwal'];

	$query = "DELETE FROM tb_jadwal WHERE id_jadwal = '$id_jadwal'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Jadwal berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>