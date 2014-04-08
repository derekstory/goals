<?php

include 'connect.php'; 

$sql = "INSERT INTO
                                                           rating(rating_title,
			   	    	                          rating_score,
                                                                 rating_author)

        VALUES(        '" . mysql_real_escape_string($_POST['postTitle']) . "',
	              '" . mysql_real_escape_string($_POST['postSelect']) . "',
                                            '" . $_SESSION['user_name'] . "')";
     
mysql_query($sql);

?>