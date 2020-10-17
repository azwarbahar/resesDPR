
<?php

require 'koneksi.php';

$id_akun = "2";
$username = "admin2";
$password = password_hash('admin2', PASSWORD_DEFAULT);
$level =  "admin";
$status = "Aktif";

$query= "INSERT INTO tb_akun VALUES (NULL, '$id_akun', '$username', '$password', '$level', '$status')";
mysqli_query($conn, $query);

?>