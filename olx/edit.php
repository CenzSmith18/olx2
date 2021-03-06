<?php

include 'config/function.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    
}
$akses = $_SESSION['akses'];
$getID = $_GET["id"];

$editSelected = query("SELECT * FROM postingan WHERE id='$getID'");
 foreach ($editSelected as $row) :
    if ($row["username"] == $_SESSION["username"] or $akses == "admin"){

    }else{
        header("Location: index.php");
    }

  endforeach;


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
        <a href="daftar.php"><b>Daftar</b></a>
        <img src="https://cdn.pixabay.com/photo/2014/04/03/09/59/scooter-309532_960_720.png"
            style="witdh:52px; height:52px;" />
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <br>
    <div class="container">
        <form action="proses_edit.php" method="post" enctype="multipart/form-data">
            <?php
             foreach ($editSelected as $row) :
               ?>
            <div class="form-group">
                <label for="Id">ID</label>
                <input type="text" class="form-control" id="Id" name="id" placeholder="Masukan Judul" value="<?= $row["id"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Judul">Judul</label>
                <input type="text" class="form-control" id="Judul" name="judul" placeholder="Masukan Judul" value="<?= $row["judul"] ?>">
                <input type="hidden" class="form-control" id="Judul2" name="judul2" placeholder="Masukan Judul" value="<?= $row["judul"] ?>">
            </div>
            <div class="form-group">
                <label for="Merek">Merek</label>
                <input type="text" class="form-control" id="Merek" name="merek" placeholder="Masukan Merek" value="<?= $row["merek"] ?>">
            </div>
            <div class="form-group">
                <label for="Tahun">Tahun</label>
                <input type="number" class="form-control" id="Tahun" name="tahun" placeholder="Masukan Tahun" value="<?= $row["tahun"] ?>">
            </div>
            <div class="form-group">
                <label for="Harga">Harga</label>
                <input type="number" class="form-control" id="Harga" name="harga" placeholder="Masukan Harga" value="<?= $row["harga"] ?>">
            </div>
            <div class="form-group">
                <label for="Lokasi">Lokasi Detail</label>
                <input type="text" class="form-control" id="Lokasi" name="lokasi" placeholder="Masukan Lokasi Detail" value="<?= $row["alamat"] ?>">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea rows="5" id="deskripsi" name="deskripsi" class="form-control" cols="40"><?= $row["deskripsi"] ?></textarea>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
    </div>
    </section>
    <?php
    endforeach;
    ?>
    </form>
    </div> <br><br>

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
                            <a href="#!" class="text-dark"><i class="fa fa-facebook-square"></i> Nama
                                Facebook</a>
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
            ?? 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">JualVespa.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var htmlPreview =
                        '<span>Image Selected</span>'
                    var wrapperZone = $(input).parent();
                    var previewZone = $(input).parent().parent().find('.preview-zone');
                    var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                  
                    boxZone.empty();
                    boxZone.append(htmlPreview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }
        $(".dropzone").change(function () {
            readFile(this);
        });
        $('.dropzone-wrapper').on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });
        $('.dropzone-wrapper').on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });
        $('.remove-preview').on('click', function () {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
        });
    </script>

</body>

</html>