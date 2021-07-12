<?php
//include file config.php
include('conn.php');
 
//jika benar mendapatkan GET id dari URL
if(isset($_GET["nim"])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$nim = $_GET["nim"];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));

 
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Delete Data Berhasil."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Delete Data Gagal."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("NIM tidak ditemukan."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("NIM tidak ditemukan."); document.location="index.php";</script>';
}
 
?>