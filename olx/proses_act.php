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


$sql = "INSERT INTO postingan (username,judul,merek,harga,tahun,deskripsi,alamat)
VALUES ('$username','$judul','$merek','$harga','$tahun','$desk','$lokasi')";
$result = mysqli_query($conn, $sql);
if ($result) {
	//echo "<script>alert('Selamat, registrasi berhasil!')</script>";
} else {
	//echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
}


echo("<br>");

$files = $_FILES;
$jumlahFile = count($files['listGambar']['name']);

for ($i = 0; $i < $jumlahFile; $i++) {
    $namaFile = $files['listGambar']['name'][$i];
    $lokasiTmp = $files['listGambar']['tmp_name'][$i];

    # kita tambahkan uniqid() agar nama gambar bersifat unik
    $namaBaru = uniqid() . '-' . $namaFile;
    $lokasiBaru = "{$folderUpload}/{$namaBaru}";
    $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

    # jika proses berhasil
    if ($prosesUpload) {
		$sql = "INSERT INTO gambarpost (username, judul, nama_file)
                VALUES ('$username', '$judul', '$lokasiBaru')";
        $result = mysqli_query($conn, $sql);	
            if ($result) {
                //echo "<script>alert('Selamat, registrasi berhasil!')</script>";
				header("Location: index.php");
            } else {
               // echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        echo "Upload file <a href='{$lokasiBaru}' target='_blank'>{$namaBaru}</a> berhasil. <br>";
    } else {
        echo "<span style='color: red'>Upload file {$namaFile} gagal</span> <br>";
    }
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