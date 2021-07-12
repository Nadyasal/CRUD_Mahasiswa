<?php include('conn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD MAHASISWA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		body 
		{
		background-color: #afd694;
		}
	</style>
</head>
<body >
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" >CRUD MAHASISWA</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Select Data</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Insert Data</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Tambah Mahasiswa</h2>
		
		<hr>
		
		<?php
		if (isset($_POST["nim"]) && ($_POST["nama"]) && ($_POST["jk"]))
		{
			$nim = $_POST["nim"];
			$jk = $_POST["jk"];
			$nama = $_POST["nama"];
			
			
			$cek="INSERT INTO mahasiswa (nim,id_jk,nama_mhs) VALUES ('$nim','$jk','$nama')";
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim,id_jk,nama_mhs) VALUES ('$nim','$jk','$nama')") or die(mysqli_error($koneksi));
				
				if($sql){
					echo '<script>alert("Insert Data Berhasil."); document.location="tambah.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Insert Data Gagal.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">NIM sudah terdaftar !</div>';
			}
			header("location:index.php");
		}
		?>
		
		<form action="tambah.php" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jk" value="LAKI-LAKI" required>
						<label class="form-check-label">LAKI-LAKI</label>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="form-check-input" name="jk" value="PEREMPUAN" required>
						<label class="form-check-label">PEREMPUAN</label>
					</div>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="simpan" class="btn btn-primary" value="SIMPAN" >
					<input type="reset" class="btn btn-danger" value="RESET"/>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>