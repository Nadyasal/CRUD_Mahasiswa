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
<body>
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
		<h2>Update Mahasiswa</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['nim'])){
			$nim = $_GET["nim"];
		
		
		#query utk mencari nama mahasiswa berdasarkan nim
		$sql = "SELECT nim, nama_mhs,id_jk 
				FROM mahasiswa 
				WHERE nim = '$nim'";
				
		#eksekusi query
		$result = $koneksi -> query($sql);

		#cek jika data ada, gunakan num_rows
		if ($result -> num_rows > 0) #jika num_rows > 0, berarti ada
		{
			#looping data dan tampilkan
			#method fetch_assoc() utk data array
			while($row = $result->fetch_assoc())
			{
				$tampil_nim = $row["nim"];
				$tampil_nama = $row["nama_mhs"];
			}
		}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if (isset($_POST["nim"]) && ($_POST["nama"]) && ($_POST["jk"])){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$jk   = $_POST["jk"];
			
			
			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mhs='$nama', id_jk='$jk' WHERE nim='$nim'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Update Data Berhasil."); document.location="edit.php?nim='.$nim.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Insert Data Gagal.</div>';
			}
			header("location:index.php");
		}
		
		?>
		
		<form action="edit.php?nim=<?php echo $nim; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="11" value="<?php echo $tampil_nim;?>"  required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA MAHASISWA</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $tampil_nama; ?>"  required>
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
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>