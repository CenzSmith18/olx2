<?php
include 'config/function.php';
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    
}
$folderUpload = "./image/upload";

# periksa apakah folder tersedia
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}
$desk = $_POST["deskripsi"];
$judul = $_POST['judul'];
$username = $_SESSION['username'];
$harga = $_POST['harga'];
$tahun = $_POST['tahun'];
$lokasi = $_POST['lokasi'];
$merek = $_POST['merek'];
$id = $_POST['id'];
$judul2 = $_POST['judul2'];
echo($id);
$sql = "UPDATE postingan SET judul='$judul',merek='$merek',harga='$harga',tahun='$tahun',deskripsi='$desk',alamat='$lokasi' WHERE id=$id";
//mysqli_query($conn, "UPDATE user_keranjang SET judul='$judul',merek='$merek',harga='$harga',tahun='$tahun',deskripsi='$desk',alamat='$lokasi' WHERE id=$id");

$result = mysqli_query($conn, $sql);
if ($result) {
	$sql = "UPDATE gambarpost SET judul='$judul' WHERE judul='$judul2'";
	$result2 = mysqli_query($conn, $sql);
	if($result2) {
		header("Location: index.php");
	}
} else {
	echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
}





 
// for($x=0; $x<$jumlahFile; $x++){
// 	$namafile = $_FILES['foto']['name'][$x];
// 	$tmp = $_FILES['foto']['tmp_name'][$x];
// 	$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
// 	$ukuran = $_FILES['foto']['size'][$x];	
// 	if($ukuran > $limit){
// 		header("location:index.php?alert=gagal_ukuran");		
// 	}else{
// 			move_uploaded_file($tmp, 'file/'.date('d-m-Y').'-'.$namafile);
// 			$x = date('d-m-Y').'-'.$namafile;
// 			//header("location:index.php?alert=simpan");
		
// 	}
// }
	// $sql = "INSERT INTO gambarpost (pembuat, judul,  nama_file)
	// 					VALUES ('$username', '$judul', '$x')";
	// 			$result = mysqli_query($conn, $sql);
	// 			if ($result) {
	// 				echo "<script>alert('Selamat, registrasi berhasil!')</script>";
	//			 } else {
	// 				echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
	// 			}

?>