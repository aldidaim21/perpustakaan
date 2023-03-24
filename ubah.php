<?php

session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}


require 'functions.php';


// ambil data di url
$id = $_GET["id"];


// query data mahasiswa 
$mhs = query("SELECT * FROM siswa WHERE id = $id")[0];





// cek apakah tombol submit 
if (isset($_POST["submit"])) {


	if (ubah($_POST) > 0) {
		echo "
			<script>
			alert('data berhasil diubah!');
			document.location.href='costume.php';
			</script>

	";
	} else {
		echo "<script>
			alert('data gagal diubah!');
			document.location.href='costume.php';
			</script>";
	}
}


?>
<!DOCTYPE html>
<html>

<head>
	<title>ubah data buku</title>
	<link rel="icon" href='images/icons/ikon.png' />
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<center>

	<body>
		<h1>ubah data Buku</h1>

		<div class="kotak_login">
			<h3>pusdikhub.id</h3>
			<form action="" method="POST" enctype="multipart/form-data">


				<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
				<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">

				<label for="judul" class="label">Judul</label>
				<input type="text" name="judul" id="judul" value="<?= $mhs["judul"]; ?>" class="form_login" required="">




				<label for="pengarang" class="label">Pengarang</label>
				<input type="text" name="pengarang" id="pengarang" value="<?= $mhs["pengarang"]; ?>" class="form_login" required="">




				<label for="kategori" class="label">kategori</label>
				<input type="text" name="kategori" id="kategori" value="<?= $mhs["kategori"]; ?>" class="form_login" required="">




				<label for="deskripsi" class="label">Deskripsi</label>
				<input type="text" name="deskripsi" value="<?= $mhs["deskripsi"]; ?>" id="deskripsi" class="form_login" required="">

				<label for="harga" class="label">Harga</label>
				<input type="text" name="harga" value="<?= $mhs["harga"]; ?>" id="deskripsi" class="form_login" required="">






				<label for="gambar" class="label">Gambar</label><br>
				<img src="img/<?= $mhs['gambar']; ?>" width="100"><br>
				<input type="file" name="gambar" id="gambar" class="form_login">




				<button type="submit" name="submit">submit</button>



			</form>
			</table>
		</div>
	</body>
</center>

</html>

?>