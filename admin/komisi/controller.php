<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT KOMISI
if (isset($_POST['submit_komisi'])) {
	$nama_komisi = $_POST['nama_komisi'];
	$bidang_komisi = $_POST['bidang_komisi'];
    // TAMBAH DATA
	$query= "INSERT INTO tb_komisi VALUES (NULL, '$nama_komisi', '$bidang_komisi')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Komisi Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE KOMISI
if (isset($_POST['update_komisi'])) {
    $id_komisi = $_POST['id_komisi'];
    $nama_komisi = $_POST['nama_komisi'];
    $bidang_komisi = $_POST['bidang_komisi'];
		$query = "UPDATE tb_komisi SET nama_komisi = '$nama_komisi', bidang_komisi = '$bidang_komisi' WHERE id_komisi = '$id_komisi'";\

	// EDIT KOMISI
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Komisi berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS KOMISI
if (isset($_GET['hapus_komisi'])) {
	$id_komisi = $_GET['id_komisi'];

	$query = "DELETE FROM tb_komisi WHERE id_komisi = '$id_komisi'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Komisi berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>