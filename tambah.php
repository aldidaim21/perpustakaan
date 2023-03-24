<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
require 'functions.php';
// koneksi data base
$conn = mysqli_connect("localhost", "root", "", "perpustakaan");
// cek apakah tombol submit 
if (isset($_POST["submit"])) {



	if (tambah($_POST) > 0) {
		echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href='tambah.php';
			</script>

	";
	} else {
		echo "<script>
			alert('data gagal ditambahkan!');
			document.location.href='tambah.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tamabh Buku</title>
	<link rel="icon" href='images/logo.png' />

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<!-- script src -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/searchbar.css">
</head>

<body>
	<div class="container align-items-center mr-2 ml-2 p-3">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="nama_hotel" class="col-sm-2 col-form-label col-form-label-sm">judul Buku</label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm" name="judul" id="judul" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label for="pengarang" class="col-sm-2 col-form-label col-form-label-sm">Pengarang</label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm" name="pengarang" id="pengarang" id="colFormLabelSm" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label for="nama_hotel" class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm" name="kategori" id="kategori" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label for="deskripsi" class="col-sm-2 col-form-label col-form-label-sm">deskripsi</label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm" name="deskripsi" id="deskripsi" id="colFormLabelSm" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label for="lokasi" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
				<div class="col-sm-9">
					<input type="text" class="form-control form-control-sm" name="harga" id="lokasi" id="colFormLabelSm" autocomplete="off">
				</div>
			</div>

			<div class="form-group row">
				<label for="gambar" class="label col-sm-2 col-form-label col-form-label-sm">Gambar</label><br>
				<input type="file" name="gambar" id="gambar" class="form_login">

			</div>


			<div class="form-group  center">
				<button type="submit" name="submit" class="btn btn-info">Submit</button>
			</div>


		</form>

	</div>
	<!-- scipt js -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>