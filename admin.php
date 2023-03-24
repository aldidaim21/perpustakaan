<?php 
session_start();
if(!isset($_SESSION["login"])){
	header("location:login.php");
	exit;
}


require 'functions.php';
$mahasiswa=query("SELECT * FROM buku");

if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}


 ?>
 <!DOCTYPE html>


<head>
	<title>halaman adimin</title>
	 <link rel="icon" href='images/icons/ikon.png'/>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
</head>

<body>

<!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light  bg-primary fixed-top fixed-top ">
        <div class="container">
            <h3></h3><i class="fas fa-shopping-cart mr-2"></h3></i>
        <a class="navbar-brand  " href="index.html">KutuBuku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-4">

            <li class="nav-item active">
        <a class="nav-link" href="tambah.php">Tambah buku</a>



           <li class="nav-item active">
        <a class="nav-link" href="Index.php">Home<span class="sr-only">(current)</span></a>
      </li>
       
        
        
          
          </ul>
          <form form action="" method="POST" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-2 btn-sm" name="keyword" size="40" autofocus placeholder="masukan pencarian" autocomplete="off" aria-label="Search">
            <button class="btn btn-dark btn-sm mr-2" type="submit" name="cari">Cari</button>
          </form>
        <a class="btn btn-secondary" href="logout.php">logout<span class="sr-only">(current)</span></a>
  
       
      </div>
        </div>
      </div>
      </nav>
     <br><br><br> 
<!-- table -->

<table class="table-hover table-dark" border="2" cellpadding="10" cellspacing="0" width="100%" >
	<tr class="btn-denger" style="text-align: center;">
		<th scope="col">Id</th>
		<th scope="col">Opsi</th>
		<th scope="col">Image</th>
		<th scope="col">Title</th>
		<th scope="col">Creator</th>
		<th scope="col">Category</th>
		<th scope="col">Description</th>
		<th scope="col">Price</th>

	</tr>
	<?php $i = 1;?>
<?php foreach ($mahasiswa as $row): ?>
	<tr style="text-align: center;">
		<td><?php echo $i; ?></td>
		
		<td>
	<a href="ubah.php?id=<?= $row["id"];?>" class="btn btn-primary btn-sm active btn-light" role="button" aria-pressed="true">ubah data</a>
			<a href="hapus.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm active btn-danger" role="button" aria-pressed="true"  onclick="return confirm('yakin');">delete</a>
		</td>
		
		<td><img src="img/<?php echo $row["gambar"] ?> "width="100"></td>
		
		<td><?php echo $row["judul"] ?></td>
		<td><?php echo $row["pengarang"] ?></td>
		<td><?php echo $row["kategori"] ?></td>
		<td><?php echo $row["deskripsi"] ?></td>
		<td><?php echo $row["harga"] ?></td>

	</tr> 
	
	<?php $i++; ?>

<?php endforeach; ?>

</table>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>