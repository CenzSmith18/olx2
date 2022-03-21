<?php
include 'config/function.php';
session_start();
if (!isset($_SESSION['username'])) {
    //header("Location: login.php");
    
}
if (isset($_POST['submit'])) {
    $targetDir = "image/upload";
    $desk =nl2br($_POST["deskripsi"]);
    $judul = $_POST['judul'];
    $username = $_SESSION['username'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $merek = $_POST['merek'];
    $file= $_FILES['file']['name'];
    foreach ($file as $row) :
    
        $fileName = $row[$i];
        $sql = "INSERT INTO postingan (username,merek,judul,deskripsi,alamat,foto) VALUES ('$username', '$merek', '$judul', '$desk', '$alamat', '$fileName')";
        if($conn->query($sql) === TRUE){
            echo("Sukses");
        }else{
            echo"error";
        }
        move_uploaded_file($_FILES['file']['tmp_name'][$i], 'image/upload' .$fileName);
    endforeach;

}



?>

<form action="" method="post" enctype="multipart/formdata">
            <div class="form-group">
                <label for="Judul">Judul</label>
                <input type="text" class="form-control" id="Judul" name="judul" placeholder="Masukan Judul">
            </div>
            <div class="form-group">
                <label for="Merek">Merek</label>
                <input type="text" class="form-control" id="Merek" name="merek" placeholder="Masukan Merek">
            </div>
            <div class="form-group">
                <label for="Tahun">Tahun</label>
                <input type="number" class="form-control" id="Tahun" name="tahun" placeholder="Masukan Tahun">
            </div>
            <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="number" class="form-control" id="Harga" name="harga" placeholder="Masukan Harga">
            </div>
            <div class="form-group">
                <label for="Lokasi">Lokasi Detail</label>
                <input type="text" class="form-control" id="Lokasi" name="lokasi" placeholder="Masukan Lokasi Detail">
            </div>
            <div class="form-group">
                <label for="Lokasi">Deskripsi</label>
                <textarea rows="5" id="deskripsi" name="deskripsi" class="form-control" cols="40">
               </textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="file[]" id="file" required="required"  multiple />
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>