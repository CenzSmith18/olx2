<?php
include 'config/function.php';
    session_start();
    error_reporting(0); 
    //error_reporting(0);
        $getNomorHP = $_GET["nohp"];
        $getJudul = $_GET["judul"];
        $username = $_SESSION['username'];

            $text =  "Halo Ini Saya $username Berminat Dengan $GetJudul";
            $url = "https://api.whatsapp.com/send?phone=$getNomorHP&text=$text";
            //echo $username,$total,$jumlah,$produk,$harga,$alamat;
            //echo $text;
        ?>
        <html>
            <head>
            <meta http-equiv="refresh" content="5; url=<?=$url?>">
            <script type="text/javascript">
                window.location.href = "<?=$url?>";
            </script>
            </head>

            <body>
            </body>
        </html>
        
        
