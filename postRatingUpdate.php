<?php

include 'connect.php'; 

$updateRating = "UPDATE
						           rating
                                    SET
                                                           rating_score =  '" . mysql_real_escape_string($_POST['postSelectUpdate']) . "'
                                    WHERE
                                                           rating_id = " . mysql_real_escape_string($_POST['rateID']). "";
     
mysql_query($updateRating);

?>