<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "cafe";

    $conn = mysqli_connect($server, $user, $pass, $database);

    if (!$conn) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function klaim($voc, $username, $info, $exp){
        global $conn;
        $sql = "SELECT * FROM user_voucher WHERE username='$username' AND voucher='$voc'";
		$result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $result =  mysqli_query($conn, "INSERT INTO user_voucher (username, voucher, info, exp) VALUES ('$username', '$voc', '$info', '$exp')");
            if ($result) {
                echo "<script>alert('Selamat, Klaim Voucher Berhasil')</script>";
                $voucher = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Anda Sudah Mengklaim Voucher Tersebut')</script>";
        }
    }
    function tambahKeranjang($produk, $username, $harga){
        global $conn;
        $sql = "SELECT * FROM user_keranjang WHERE username='$username' AND produk='$produk'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO user_keranjang (username, produk, harga)
                    VALUES ('$username', '$produk', '$harga')";
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
    }
  

?>