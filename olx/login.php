<?php 
 
 include 'config/function.php';
 
error_reporting(0);
 
session_start();
$_SESSION['akses'];
$_SESSION['foto'];
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
            if ($row['akses']=="admin"){
                $_SESSION['username'] = $row['username'];
                $_SESSION['akses'] = "admin";
                $_SESSION['foto'] = $row['foto'];
                header("Location: index.php");
            } else {
                $_SESSION['username'] = $row['username'];
                $_SESSION['akses'] = "user";
                $_SESSION['foto'] = $row['foto'];
                header("Location: index.php");
            }
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/shit.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-aweasome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Login</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="asset/logo.png" alt="" style="  width: 80px;">
                <div class="nama-logo">

                </div> 
            </div>
        </header>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['error']?>
        </div>
        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class ="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-daftar-teks">Anda Belum Punya Akun? <a href="daftar.php">Register</a></p>
            </form>
        </div>
    </body>
</html>