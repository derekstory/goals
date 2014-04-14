<?php

include 'connect.php'; 

$happysql = "INSERT INTO
                                                             happy(happy_score,
                                                                  happy_author)

       VALUES(        '" . mysql_real_escape_string($_POST['happyScore']) . "',
                                            '" . $_SESSION['user_name'] . "')";
     
mysql_query($happysql);

?>