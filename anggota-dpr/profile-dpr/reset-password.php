<?php

function plugins() { ?>
	<link rel="stylesheet" href="/reses-dprd/assets/plugins/bootstrap-more/css/bootstrap.min.css">
	<link rel="stylesheet" href="/reses-dprd/assets/dist/css2/components.css">
	<script src="/reses-dprd/assets/dist/jquery.min.js"></script>
    <script src="/reses-dprd/assets/dist/sweetalert/sweetalert.min.js"></script>

<?php }

require('../../koneksi.php');

$err_pass = false;
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $pass_lama = $_POST['password_lama'];
    $pass_baru = $_POST['password_baru'];

    $result = mysqli_query($conn, "SELECT * FROM tb_akun WHERE id = '$id'");
    $get = mysqli_fetch_assoc($result);
    if ($get) {
        $get_password = $get['password'];
        if (password_verify($pass_lama, $get_password)){
            $password_enq = password_hash($pass_baru, PASSWORD_DEFAULT);
            $query2 = "UPDATE tb_akun SET password = '$password_enq' WHERE id = '$id'";
            mysqli_query($conn, $query2);
            if (mysqli_affected_rows($conn) > 0) {
                plugins(); ?>
                <script>
                    $(document).ready(function() {
                        swal({
                            title: 'Berhasil',
                            text: 'Password berhasil diubah',
                            icon: 'success'
                        }).then((data) => {
                            location.href = 'data.php';
                        });
                    });
                </script>
            <?php }
        } else {
            //password tidak sesuai
            $err_pass = true;
        }

    }

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/reses-dprd/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/reses-dprd/assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>RESES</b>DPRD</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Kami meminta sandi lama anda , untuk memastikan bahwa ini benar-benar ada!</p>

      <form  method="POST" action="" enctype="multipart/form-data">

      <label>Password Lama</label>
        <div class="input-group mb-3">
          <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php if ($err_pass == true) { ?>
        <div class="text-danger">
          Password Lama tidak sesuai
        </div>
        <?php } ?>
        <br>

        <label>Password Baru</label>
        <div class="input-group mb-3">
          <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id='message'></span>
        <div class="row">
          <div class="col-12">
              <input type="hidden" value="<?= $_GET['id'] ?>" name="id" id="id">
            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Ubah password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="data.php">Back</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/reses-dprd/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/reses-dprd/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/reses-dprd/assets/dist/js/adminlte.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<script>

    $('#password_baru, #password_confirm').on('keyup', function () {
  if ($('#password_baru').val() == $('#password_confirm').val()) {
    $('#message').html('Benar').css('color', 'green');
  } else 
    $('#message').html('Sandi Tidak Sama').css('color', 'red');
});

</script>

</body>
</html>
