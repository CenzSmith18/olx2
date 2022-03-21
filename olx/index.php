<?php

include 'config/function.php';
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
   //header("Location: login.php");
    
}
$listPostingan = query("SELECT * FROM postingan");

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="jual.php"><b> Jual</b></a>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='logout.php'><b>Logout</b></a>";
            } else {
                echo "<a href='login.php'><b>Login</b></a>";
                echo "<a href='daftar.php'><b>Daftar</b></a>";
            }
        ?>
        <img src="https://cdn.pixabay.com/photo/2014/04/03/09/59/scooter-309532_960_720.png"
            style="witdh:52px; height:52px;" />
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <br>
    <img src="https://statics.olx.co.id/external/base/img/hero_bg_id.jpg" alt="">
    <div class="container">
        <br><br>
        <div class="team-listing">
            <?php foreach ($listPostingan as $row) :?>
                <div class="item">
                <div class="groove">
                         <?php
                            $nama = $row["username"];
                            $judul = strlen($row["judul"]) > 30 ? substr($row["judul"],0,30)."..." : $row["judul"];
                            $judul2 = $row["judul"];
                            $sql = "SELECT * FROM gambarpost WHERE username='$nama' AND judul='$judul2' LIMIT 1;";
                            $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    
                                    while($row2 = $result->fetch_assoc()) {?>
                                    <img class="dude" src="<?= $row2["nama_file"]; ?>"/>
                                    <?php
                                    }
                                }
                            ?>
                       
                        <a class="no-mark" href="detail.php?user=<?= $nama ?>&judul=<?= $row["judul"]; ?>">
                        <div class="desk-kecil">
                            <span>Rp. <?= number_format($row["harga"], 2); ?></span><br>
                            <span class="tahun"><?= $row["tahun"]; ?></span><br>
                            <span class="judul"><?= $judul; ?></span><br>
                            <span class="lokasi"><?= $row["alamat"]; ?></span>
                        </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <br><br><br><br><br><br><br><br><br>

   <!-- Footer -->
   <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-dark">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-dark">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-dark">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-dark">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-0">Ikuti Kami</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!" class="text-dark"><i class="fa fa-instagram"></i> Nama Instagram</a>
            </li>
            <li>
              <a href="#!" class="text-dark"><i class="fa fa-facebook-square"></i> Nama Facebook</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->





      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">JualVespa.com</a>
    </div>
    <!-- Copyright -->
  </footer>