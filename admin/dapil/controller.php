<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT WILAYAH DAPIL
if (isset($_POST['submit_dapil_wilayah'])) {
	$id_dapil = $_POST['id_dapil'];
	$nama_kecamatan = $_POST['nama_kecamatan'];
    // TAMBAH DATA
	$query= "INSERT INTO tb_dapil_wilayah VALUES (NULL, '$id_dapil' ,'$nama_kecamatan')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Wilayah Dapil Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// SUBMIT DAPIL
if (isset($_POST['submit_dapil'])) {
	$nama_dapil = $_POST['nama_dapil'];
    // TAMBAH DATA
	$query= "INSERT INTO tb_dapil VALUES (NULL, '$nama_dapil')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Dapil Berhasil ditambah!',
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


// HAPUS DAPIL
if (isset($_GET['hapus_dapil'])) {
	$id_dapil = $_GET['id_dapil'];

	$query = "DELETE FROM tb_dapil WHERE id_dapil = '$id_dapil'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Dapil berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>