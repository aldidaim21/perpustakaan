<?php 
// koneksi database
$conn = mysqli_connect("localhost","root","","perpustakaan");

// data muncul di web
function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows =[];
	while ( $row=mysqli_fetch_assoc($result)){
		$rows[] = $row;
		
	}
	return $rows;
 }


//  tambah data

  function tambah($data){
 	global $conn;

	$judul=htmlspecialchars($data["judul"]);
	$pengarang=htmlspecialchars($data["pengarang"]);
	$kategori=htmlspecialchars($data["kategori"]);
	$deskripsi=htmlspecialchars($data["deskripsi"]);
	$harga=htmlspecialchars($data["harga"]);


	// upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO buku
				VALUES
				('','$judul','$pengarang','$kategori','$deskripsi','$harga','$gambar')

			 ";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);


 }

function upload(){

	$namaFile=$_FILES['gambar']['name'];
	$ukuranFile=$_FILES['gambar']['size'];
	$error=$_FILES['gambar']['error'];
	$tmpName=$_FILES['gambar']['tmp_name'];

	//cek upload gambar
	if ($error === 4) {
		echo "<script>
		alert('pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}

// cek apakah filr jenis apload



$ekstensiGambarValid=['jpg','jpeg','png'];
$ekstensiGambar=explode('.',$namaFile);
$ekstensiGambar=strtolower(end($ekstensiGambar));

if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
	echo "<script>
		alert('yang anda aploud bukan gambar!');
		</script>";
		return false;
}

// cek ukuran gambar 
if ($ukuranFile > 1000000) {
	echo "<script>
		alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
}


// lolos pengecekan ,gambar siap diupload
// generate nama baru
$namaFileBaru=uniqid();
$namaFileBaru .='.';
$namaFileBaru .=$ekstensiGambar;




move_uploaded_file($tmpName,'img/'.$namaFileBaru);

return $namaFileBaru;
}




// fungsi hapus
function hapus($id){
 	global $conn;
 	mysqli_query($conn,"DELETE FROM buku WHERE id = $id");

 	return mysqli_affected_rows($conn);
 }

 function ubah($data){
 	global $conn;
 	$id=$data["id"];
	$judul=htmlspecialchars($data["judul"]);
	$pengarang=htmlspecialchars($data["pengarang"]);
	$kategori=htmlspecialchars($data["kategori"]);
	$deskripsi=htmlspecialchars($data["deskripsi"]);
	$harga=htmlspecialchars($data["harga"]);
	$gambarLama=htmlspecialchars($data["gambarLama"]);
	

// cek apakah user pilih gambar baru atau tidak

	if ($_FILES['gambar'] ['error'] === 4){
		$gambar = $gambarLama;
	} else{
		$gambar =upload();
	}
	

	$query = "UPDATE buku SET 
				judul='$judul',
				pengarang='$pengarang',
				kategori='$kategori',
				deskripsi='$deskripsi',
				harga='$harga',
				gambar='$gambar'
				WHERE id = $id
				";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);

 }

function cari($keyword){
	$query ="SELECT * FROM buku
			WHERE 
			judul LIKE '%$keyword%' OR
			pengarang LIKE '%$keyword%' OR
			kategori LIKE '%$keyword%' OR
			harga LIKE '%$keyword%'
			";
			return query($query);
}

function registrasi($data){
	global $conn;

	$username=strtolower(stripcslashes($data["username"]));
	$password=mysqli_real_escape_string($conn,$data["password"]);
	$password2=mysqli_real_escape_string($conn,$data["password2"]);

// cek username sudah ada atau belum
	$result=mysqli_query ($conn,"SELECT username FROM admin WHERE username= '$username' ");
if (mysqli_fetch_assoc($result)){
	echo "<script>
			alert('username sudah terdaftar!!');
			</script>
			";
	return false;
}


// cek password sama 
	if ($password !== $password2) {
		echo "<script>
				alert ('konfirmasi password tidak sesuai');
				</script>

		";
		return false;
	}
	


	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambah userbaru ke data base
	mysqli_query($conn,"INSERT INTO admin VALUES ('','$username','$password')");

	return mysqli_affected_rows ($conn);
 

}
