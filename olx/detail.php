<?php

include 'config/function.php';

session_start();
if (!isset($_SESSION['username'])) {
   header("Location: login.php");
    
}
$akses = $_SESSION['akses'];
$getJudul = $_GET["judul"];
$getUser = $_GET["user"];
$detail = query("SELECT * FROM postingan WHERE username='$getUser' AND judul='$getJudul'");
$gambar = query("SELECT * FROM gambarpost WHERE username='$getUser' AND judul='$getJudul' LIMIT 1;");
$ListGambar = query("SELECT * FROM gambarpost WHERE username='$getUser' AND judul='$getJudul'");
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            }
        ?>
    <img src="https://cdn.pixabay.com/photo/2014/04/03/09/59/scooter-309532_960_720.png"
      style="witdh:52px; height:52px;" />
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <br>
  <div class="card">
    <div class="container-fliud">
      <div class="wrapper row">
        <div class="preview col-md-6">

          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php foreach ($gambar as $row) :?>
              <div class="carousel-item active">
                <img src="<?= $row["nama_file"]  ?>" width="10px" height="550" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; ?>
              <?php foreach ($ListGambar as $row) :?>
              <div class="carousel-item">
                <img src="<?= $row["nama_file"]  ?>" width="10px" height="550" class="d-block w-100" alt="...">
              </div>
              <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </div>
        <div class="details col-md-6">
          <?php foreach ($detail as $row) :?>
          <h3 class="product-title"><?= $row["judul"] ?></h3>
          <h4 class="product-title">Penjual: <?= $row["username"] ?></h4>
          <h4 class="price">Harga: <span>Rp. <?= number_format($row["harga"], 2); ?></span></h4>
          <div class="desk">
            <textarea rows="5" id="S1" name="S1" cols="80" disabled><?= $row["deskripsi"] ?></textarea>
          </div>
          <br>
          <div class="action">
            <?php
              $id = $row["id"];
              $nama = $row["username"];
              
                $sql = "SELECT * FROM users WHERE username='$nama'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row2 = $result->fetch_assoc()) {?>
            <a href="chat.php?judul=<?= $getJudul; ?>&nohp=<?= $row2['nohp']; ?>" class="btn btn-success"><i
                class="fa fa-whatsapp" aria-hidden="true"></i> Chat Penjual</a>
            <?php
                  }
              }

              ?>
              <?php
                if ($nama == $_SESSION['username'] or $akses == "admin"){ ?>
                    <a href="edit.php?id=<?= $id ?>" class="btn btn-success"><i
                class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                <a href="delete.php?id=<?= $id?>&judul=<?= $getJudul; ?>&user=<?= $nama ?>" class="btn btn-danger"><i
                class="fa fa-trash" aria-hidden="true"></i> Hapus</a><?php
                }
              ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br><br>

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