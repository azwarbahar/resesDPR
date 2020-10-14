
<?php

require 'koneksi.php';

$id_akun = "2";
$username = "anggota";
$password = password_hash('anggota', PASSWORD_DEFAULT);
$level =  "dpr";
$status = "Aktif";

$query= "INSERT INTO tb_akun VALUES (NULL, '$id_akun', '$username', '$password', '$level', '$status')";
mysqli_query($conn, $query);

?>