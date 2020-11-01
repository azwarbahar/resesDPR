<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');


// UPDATE LAPORAN
if (isset($_GET['approve_aspirasi'])) {
	$id_aspirasi = $_GET['id_aspirasi'];
	$id_anggota = $_GET['id_anggota'];
		$query = "UPDATE tb_aspirasi SET status_aspirasi = 'Approve' WHERE id_aspirasi = '$id_aspirasi'";

	// EDIT LAPORAN
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Aspirasi berhasil di Setujui',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php?id_anggota=<?= $id_anggota ?>';
				});
			});
		</script>
	<?php }
}

// TOLAK LAPORAN STATUS
if (isset($_POST['tolak_aspirasi'])){
	$id_anggota = $_POST['id_anggota'];
	$id_aspirasi = $_POST['id_aspirasi'];
	$keterangan = $_POST['keterangan'];
		$query = "UPDATE tb_aspirasi SET  status_aspirasi = 'Tolak', keterangan_aspirasi = '$keterangan'  WHERE id_aspirasi = '$id_aspirasi'";

	// EDIT LAPORAN STATUS
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Laporan berhasil diajukan',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php?id_anggota=<?= $id_anggota ?>';
				});
			});
		</script>
	<?php }

}


// HAPUS LAPORAN
if (isset($_GET['hapus_laporan'])) {
	$id_laporan = $_GET['id_laporan'];

	$query = "DELETE FROM tb_laporan WHERE id_laporan = '$id_laporan'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Laporan berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>