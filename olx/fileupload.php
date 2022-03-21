<?php
 include 'config/function.php';
$limit = 10 * 1024 * 1024;
$ekstensi =  array('png','jpg','jpeg','gif');
$jumlahFile = count($_FILES['foto']['name']);
$targetDir = "image/upload";
$desk =nl2br($_POST["deskripsi"]);
$judul = $_POST['judul'];
$harga = $_POST['harga'];
$lokasi = $_POST['lokasi'];
$merek = $_POST['merek'];
 
for($x=0; $x<$jumlahFile; $x++){
	$namafile = $_FILES['foto']['name'][$x];
	$tmp = $_FILES['foto']['tmp_name'][$x];
	$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
	$ukuran = $_FILES['foto']['size'][$x];	
	if($ukuran > $limit){
		header("location:index.php?alert=gagal_ukuran");		
	}else{
		if(!in_array($tipe_file, $ekstensi)){
			header("location:index.php?alert=gagal_ektensi");			
		}else{		
			move_uploaded_file($tmp, 'image/upload/'.$namafile);
			$x = $namafile;
			mysqli_query($conn,"INSERT INTO gambar VALUES(NULL, '$x')");
			
		}
	}
}