<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');
// SUBMIT PARTAI
if (isset($_POST['submit_partai'])) {
	$nama_partai = $_POST['nama_partai'];

	// SET FOTO
	$foto = $_FILES['gambar_partai']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$nama_foto = "image_".time().".".$ext;
    $file_tmp = $_FILES['gambar_partai']['tmp_name'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_partai VALUES (NULL, '$nama_partai', '$nama_foto')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		move_uploaded_file($file_tmp, 'gambar/'.$nama_foto);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Partai Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


?>