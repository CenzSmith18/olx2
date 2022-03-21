<?php
include 'config/function.php';
    session_start();   
    error_reporting(0);
    if (isset($_POST['submit'])) {
        $username = $_SESSION['username'];
        $produk = $_POST['namaproduk'];
        $harga = (int)$_POST['harga'];
        $jumlah= (int)$_POST['jumlah'];
        $total = $harga*$jumlah;
        $int = filter_input(INPUT_POST, 'jumlah', FILTER_VALIDATE_INT);
        $sql = "SELECT * FROM user_keranjang WHERE username='$username' AND produk='$produk'";
        $result = mysqli_query($conn, $sql);
        if ($int >= 0){
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO user_keranjang (username, produk, harga, jumlah, totalharga)
                        VALUES ('$username', '$produk', '$harga', '$jumlah', '$total')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Produk Sudah Ditambahkan Ke Keranjang')</script>";
                    //header("Location: profile.php?$username&div_id=keranjangmu2");
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Produk Sudah Ada Di Keranjang Silahkan Cek Keranjang Anda!.')</script>";
                //header("Location: profile.php?$username&div_id=keranjangmu2");
            }
        } else {
            echo "<script>alert('Woops! Silahkan Input Jumlah Yang Benar!.')</script>";
        }
    }
$listMenu = query("SELECT * FROM produk");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/voucher.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <script src="js/boostrap.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <div class="topnav" id="myTopnav">
            
            <a href="profile.php?<?= $_SESSION['username']; ?>">
                <i class="fas fa-user-circle"></i> <br>Profil
			</a>
            <a href="profile.php?<?= $_SESSION['username']; ?>&div_id=keranjangmu2">
			    <i class="fa fa-shopping-cart"></i><br>Keranjang
			</a>
            <a href="profile.php?<?= $_SESSION['username']; ?>&div_id=vouchermu">
            <i class="fas fa-scroll"></i><br>Voucher
			</a>
            </div>
        </header>
        <div class="container">

            <div class="Menu-Container">
                    <div class="Header">
                        <h3 class="Heading">Shopping Menu</h3>  
                    </div>
                    <?php foreach ($listMenu as $row) :?>
                    <form action="" method="POST">
                            <div class="Menu-Items">
                                
                                <div class="image-box">
                                <img src="<?= $row["gambar"]; ?>"/>
                                </div>
                                <div class="about">
                                    <input class="i-produk" type="text" value="<?= $row["nama"]; ?> " name="namaproduk" readonly>
                                    <label class="i-harga"for="harga">Rp.</label>
                                    <input class="i-harga" id="harga" type="text" value="<?= $row["harga"]; ?>" name="harga" readonly>
                                   <!-- <h1 class="title" name="namaproduk"><h1>
                                    <h3 class="subtitle" name="harga"></h3>-->
                                </div>
                                <input class ="input-count" type="number" placeholder="0" name="jumlah">
                                <button class="btn" name="submit"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
            
    </body>
</html>