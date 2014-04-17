<?php
include 'connect.php';

       if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
        {}else
        {
        header("Location: signin.php");
        }


include 'head.php';
include 'home.php';
include 'goals.php';
include 'rate.php';
include 'metrics.php';
include 'scripts.php';
?>

