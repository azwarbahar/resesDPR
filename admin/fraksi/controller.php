<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT PARTAI
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


// UPDATE PARTAI
if (isset($_POST['edit_partai'])) {
	$id_partai = $_POST['id_partai'];
	$nama_partai = $_POST['nama_partai'];

    // SET FOTO
	if ($_FILES['gambar_partai']['name'] != '') {
		$foto = $_FILES['gambar_partai']['name'];
		$ext = pathinfo($foto, PATHINFO_EXTENSION);
		$nama_foto = "image_".time().".".$ext;
		$file_tmp = $_FILES['gambar_partai']['tmp_name'];
		// HAPUS OLD FOTO
		$target = "gambar/".$_POST['foto_now'];
		if (file_exists($target) && $_POST['foto_now'] != 'default.png') unlink($target);
		// UPLOAD NEW FOTO
		move_uploaded_file($file_tmp, 'gambar/'.$nama_foto);
	} else {
		$nama_foto = $_POST['foto_now'];
	}

		$query = "UPDATE tb_partai SET nama_partai = '$nama_partai', gambar_partai = '$nama_foto' WHERE id_partai = '$id_partai'";\

	// EDIT PARTAI
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Partai berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS PARTAI
if (isset($_GET['hapus_partai'])) {
	$id_partai = $_GET['id_partai'];

	$query = "DELETE FROM tb_partai WHERE id_partai = '$id_partai'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Partai berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>