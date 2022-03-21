<?php
include 'config/function.php';
session_start();
if (!isset($_SESSION['username'])) {
    //header("Location: login.php");
    
}

$getJudul = $_GET["judul"];
$getUser = $_GET["user"];
$getId = $_GET["id"];


if (isset($getUser)) {
    if ($getUser == $_SESSION["username"]){
        $sql = "DELETE FROM postingan WHERE id=$getId";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
            $sql2 = "DELETE FROM gambarpost WHERE judul=$getJudul";
            if (mysqli_query($conn, $sql2)) {
                echo "Record deleted successfully";
              } else {
                echo "Error deleting record: " . mysqli_error($conn);
              }
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
          }
    }

}

?>