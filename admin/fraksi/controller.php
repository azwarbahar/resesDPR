<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT FRAKSI
if (isset($_POST['submit_fraksi'])) {
	$id_partai = $_POST['id_partai'];
    // TAMBAH DATA
	$query= "INSERT INTO tb_fraksi VALUES (NULL, '$id_partai')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Fraksi Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE FRAKSI
if (isset($_POST['update_fraksi'])) {
    $id_fraksi = $_POST['id_fraksi'];
    $id_partai = $_POST['id_partai'];
		$query = "UPDATE tb_fraksi SET id_partai = '$id_partai' WHERE id_fraksi = '$id_fraksi'";\

	// EDIT FRAKSI
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Fraksi berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS FRAKSI
if (isset($_GET['hapus_fraksi'])) {
	$id_fraksi = $_GET['id_fraksi'];

	$query = "DELETE FROM tb_fraksi WHERE id_fraksi = '$id_fraksi'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Fraksi berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>