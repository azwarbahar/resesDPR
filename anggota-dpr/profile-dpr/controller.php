<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
	<script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>
<?php }
require('../../koneksi.php');

// SUBMIT ANGGOTA DPR
if (isset($_POST['submit_anggota'])) {

	// CARD BIODATA
	$nama_anggota = $_POST['nama_lengkap'];
	$alamat_anggota = $_POST['alamat'];
	$tempat_lahir_anggota = $_POST['tempat_lahir'];
		//Tanggal Lahir
	$tanggal = $_POST['tanggal'];
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$tanggal_lahir_anggota = $tanggal. ' ' .$bulan. ' ' .$tahun;

	$agama_anggota = $_POST['agama'];
	$status_kawin = $_POST['status_kawin'];

	//Set Username dan Passwor Akun Login Anggota (Sama)
	$username = $_POST['username'];
	$password = password_hash($username, PASSWORD_DEFAULT);
	$level_akun = "dpr";


	//CARD PROFIL ANGGOTA DEWAN
	$jabatan_anggota = $_POST['jabatan'];
	$id_partai = $_POST['id_partai'];
	$id_dapil = $_POST['id_dapil'];
	$id_komisi = $_POST['id_komisi'];
	$id_fraksi = $_POST['id_fraksi'];

	// CARD FOTO
	$status_anggota = "Aktif";
	// SET FOTO
	$foto = $_FILES['foto_anggota']['name'];
	$ext = pathinfo($foto, PATHINFO_EXTENSION);
	$foto_anggota = "image_anggota_".time().".".$ext;
    $file_tmp = $_FILES['foto_anggota']['tmp_name'];

    // TAMBAH DATA
	$query= "INSERT INTO tb_anggota VALUES (NULL, '$nama_anggota',
											'$alamat_anggota',
											'$tempat_lahir_anggota',
											'$tanggal_lahir_anggota',
											'$agama_anggota',
											'$status_kawin',
											'$jabatan_anggota',
											'$id_partai',
											'$id_dapil',
											'$id_komisi',
											'$id_fraksi',
											'$foto_anggota',
											'$status_anggota')";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {

			//get Id anggota
		$getIdInster = mysqli_insert_id($conn);
		// TAMBAH AKUN LOGIN ANGGOTA
		$queryAkunAnggota = "INSERT INTO tb_akun VALUES (NULL, '$getIdInster', '$username', '$password', '$level_akun', '$status_anggota')";
		mysqli_query($conn, $queryAkunAnggota);
		move_uploaded_file($file_tmp, 'foto/'.$foto_anggota);
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Anggota Berhasil ditambah!',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// UPDATE ANGGOTA
if (isset($_POST['update_anggota'])) {

	// CARD BIODATA
	$id_anggota = $_POST['id_anggota'];
	$nama_anggota = $_POST['nama_lengkap'];
	$alamat_anggota = $_POST['alamat'];
	$tempat_lahir_anggota = $_POST['tempat_lahir'];
		//Tanggal Lahir
	$tanggal = $_POST['tanggal_lahir_anggota_old'];

	$agama_anggota = $_POST['agama'];
	$status_kawin = $_POST['status_kawin'];

	


	//CARD PROFIL ANGGOTA DEWAN
	$jabatan_anggota = $_POST['jabatan'];
	$id_partai = $_POST['id_partai'];
	$id_dapil = $_POST['id_dapil'];
	$id_komisi = $_POST['id_komisi'];
	$id_fraksi = $_POST['id_fraksi'];

	// CARD FOTO
	$status_anggota = "Aktif";

    // SET FOTO
	if ($_FILES['foto_anggota']['name'] != '') {
		$foto = $_FILES['foto_anggota']['name'];
		$ext = pathinfo($foto, PATHINFO_EXTENSION);
		$foto_anggota = "image_anggota_".time().".".$ext;
		$file_tmp = $_FILES['foto_anggota']['tmp_name'];
		// HAPUS OLD FOTO
		$target = "/reses-dprd/admin/profile-dpr/foto/".$_POST['foto_now'];
		if (file_exists($target) && $_POST['foto_now'] != 'default.png') unlink($target);
		// UPLOAD NEW FOTO
		move_uploaded_file($file_tmp, '../../admin/profile-dpr/foto/'.$foto_anggota);
	} else {
		$foto_anggota = $_POST['foto_now'];
	}
	$username = $_POST['username'];
	$id_akun_login = $_POST['id'];
	$query2 = "UPDATE tb_akun SET username = '$username' WHERE id = '$id_akun_login'";
	mysqli_query($conn, $query2);
		$query = "UPDATE tb_anggota SET nama_anggota = '$nama_anggota',
										alamat_anggota = '$alamat_anggota',
										tempat_lahir_anggota = '$tempat_lahir_anggota',
										tanggal_lahir_anggota = '$tanggal',
										agama_anggota = '$agama_anggota',
										status_kawin = '$status_kawin',
										jabatan_anggota = '$jabatan_anggota',
										id_partai = '$id_partai',
										id_dapil = '$id_dapil',
										id_komisi = '$id_komisi',
										id_fraksi = '$id_fraksi',
										foto_anggota = '$foto_anggota'
									WHERE id_anggota = '$id_anggota'";

	// EDIT PARTAI
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil',
					text: 'Data Anggota berhasil diubah',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}


// HAPUS ANGGOTA
if (isset($_GET['hapus_anggota'])) {
	$id_anggota = $_GET['id_anggota'];

	$query = "DELETE FROM tb_anggota WHERE id_anggota = '$id_anggota'";
	mysqli_query($conn, $query);
	if (mysqli_affected_rows($conn) > 0) {
		plugins(); ?>
		<script>
			$(document).ready(function() {
				swal({
					title: 'Berhasil Dihapus',
					text: 'Data Anggota berhasil dihapus',
					icon: 'success'
				}).then((data) => {
					location.href = 'data.php';
				});
			});
		</script>
	<?php }
}

?>