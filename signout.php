<?php
ob_start();
include 'connect.php';

echo '<h2>Sign out</h2>';

if($_SESSION['signed_in'] == true)
{
        $_SESSION['signed_in'] = NULL;
        $_SESSION['user_name'] = NULL;
        $_SESSION['user_id']   = NULL;

        header("Location: signin.php");
}
else
{
        header("Location: signin.php");
}
ob_end_flush();
?>