
<?php
require 'koneksi.php';

if (isset($_COOKIE['login_admin'])) $_SESSION['login_admin'] = $_COOKIE['login_admin'];
else if (isset($_COOKIE['login_dpr'])) $_SESSION['login_dpr'] = $_COOKIE['login_dpr'];

if (isset($_COOKIE['get_id'])) $_SESSION['get_id'] = $_COOKIE['get_id'];

if (isset($_SESSION['login_admin'])) header("location: admin/");
else if (isset($_SESSION['login_dpr'])) header("location: anggota-dpr/");

$password = null;
$username = null;
$err_user = false;
$err_pass = false;
$err_stss = false;


if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM tb_akun WHERE username = '$username' AND status = 'Aktif'");
  $get = mysqli_fetch_assoc($result);

  if ($get) {
    $get_password = $get['password'];
    $get_id = $get['id'];
    $level_akun = $get['level_akun'];
    $status = $get['status'];

    if (password_verify($password, $get_password)) {
      $_SESSION['get_id'] = $get_id;
      setcookie('get_id', $get_id, time()+172800);

      if ($level_akun == 'admin') {
        if ($status != 'Aktif') $err_stss = true;
        else {
          $_SESSION['login_admin'] = $get_password;
          if (isset($_POST['remember'])) {
            setcookie('login_admin', $get_password, time()+172800);
          }
          header("location: admin/");
          exit();
        }
      } else if ($level_akun == 'dpr') {
        if ($status != 'Aktif') $err_stss = true;
        else {
          $_SESSION['login_dpr'] = $get_password;
          if (isset($_POST['remember'])) {
            setcookie('login_dpr', $get_password, time()+172800);
          }
          header("location: anggota-dpr/");
          exit();
        }
      }
    } else $err_pass = true;
  } else $err_user = true;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Rese DPRD | Kab Soppeng</title>
  <link rel="icon" href="/reses-dprd/assets/dist/img/soppeng.png">
	<!--fonts-->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Reses DPRD Kabupaten Soppeng" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- js -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- js -->
<!---- start-smoth-scrolling---->
<!-- <script type="text/javascript" src="js/move-top.js"></script> -->
<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!---- start-smoth-scrolling---->
	<!----graph -------->
	<!----//graph -------->
</head>
<body>
<!-- content -->
<div class="content">
	<div class="container">
		<div class="header">
			<div class="logo">
				<a href="#"><img src="images/icon_login.png" alt=""/></a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="content-top">
			<div class="wrap">
				<div class="col-md-5 content-left">
					<h1>Blocky UI Kit</h1>
					<div class="border"></div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Nulla volutpat sed quam ut luctus. In hac habitasse platea dictumst.
					Donec id purus elit. Suspendisse eget felis nec mauris placerat convallis.</p>
					<a href="#login" class="hvr-rectangle-out button scroll">Login</a>
					<!-- <a href="#"class="hvr-rectangle-in button more-mar">MORE INFO</a> -->
				</div>
				<div class="col-md-7 content-right">
					<!-- responsiveslides -->
						<script src="js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								 // Slideshow 4
								$("#slider3").responsiveSlides({
									auto: true,
									pager: true,
									nav: false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
								$('.events').append("<li>before event fired.</li>");
								},
								after: function () {
									$('.events').append("<li>after event fired.</li>");
									}
									});
									});
							</script>
					<!-- responsiveslides -->
					<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="slider-image">
									<img src="images/img-slide1.jpg" alt=""/>
								</div>
							</li>
							<li>
								<div class="slider-image">
									<img src="images/img-slide2.jpg" alt=""/>
								</div>
							</li>
							<li>
								<div class="slider-image">
									<img src="images/img-slide3.jpg" alt=""/>
								</div>
							</li>
							<li>
								<div class="slider-image">
									<img src="images/img-slide4.jpg" alt=""/>
								</div>
							</li>
							<li>
								<div class="slider-image">
									<img src="images/img-slide5.jpg" alt=""/>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div id="login" class="content-bottom">
			<div class="col-md-5 con-btm-left">
				<div class="register">
					<div class="register-grids">
							<div class="user-login">
								<h2>Login</h2>
								<div class="strip"></div>
								<form method="POST" class="needs-validation">
									<?php if ($err_user == true) { ?>
										<p style="margin-bottom: 10px; color: red;">Username Tidak Sesuai</p>
									<?php } ?>
									<?php if ($err_stss == true) { ?>
										<p style="margin-bottom: 10px; color: red;">Akun belum diverifikasi atau sedang dinonaktifkan</p>
        							<?php } ?>
									<input type="text" name="username" id="username" placeholder="Username" required="">
									<?php if ($err_pass == true) { ?>
										<p style="margin-bottom: 10px; color: red;">Password Tidak Sesuai</p>
									<?php } ?>
									<input type="password" name="password" id="password" placeholder="Password" required="">
										<div class="user-grids">
											<div class="user-left">
												<label><input type="checkbox" name="checkbox" checked=""><i>Remember me?</i></label>
											</div>
											<div class="user-right">
												<input type="submit" name="login" value="LOGIN">
											</div>
											<div class="clearfix"></div>
										</div>
								</form>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 con-btm-right">
				<div class="pricing-grids">
					<div class="pricing-grid">
						<div class="basic-plan">
							<h3>KOMISI I</h3>
							<p>(Bidang Pemerintahan)</p>
						</div>
						<ul>
							<?php
								$anggotaKomisi = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_komisi='1'");
								while($data = mysqli_fetch_assoc($anggotaKomisi)) {
									echo " <li>$data[nama_anggota]</li>";
								}
							?>
						</ul>
					</div>
					<div class="pricing-grid">
						<div class="basic-plan a">
							<h3>KOMISI II</h3>
							<p>(Perekonomian & Pembangunan)</p>
						</div>
						<ul>
							<?php
								$anggotaKomisi = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_komisi='2'");
								while($data = mysqli_fetch_assoc($anggotaKomisi)) {
									echo " <li>$data[nama_anggota]</li>";
								}
							?>
						</ul>
					</div>
					<div class="pricing-grid">
						<div class="basic-plan b">
							<h3>KOMISI III</h3>
							<p>Keuangan dan Kesejahteraan Rakyat</p>
						</div>
						<ul>
							<?php
								$anggotaKomisi = mysqli_query($conn, "SELECT * FROM tb_anggota WHERE id_komisi='3'");
								while($data = mysqli_fetch_assoc($anggotaKomisi)) {
									echo " <li>$data[nama_anggota]</li>";
								}
							?>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="footer">
			<p>Copyright &copy; 2020 <a href="#">RESES DPRD Kabupaten Soppeng</a>.</p>
		</div>
	</div>
</div>
<!-- //content -->
</body>
</html>
