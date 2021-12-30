<?php 
session_start();
unset($_SESSION['username']);
header('location:../index.php');


<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}
?>
?>