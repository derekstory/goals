<?php

include 'connect.php'; 

$updateHappyRating = "UPDATE
						           happy
                                    SET
                                                           happy_score =  '" . mysql_real_escape_string($_POST['happyScoreUpdate']) . "'
                                    WHERE
                                                           happy_id = " . mysql_real_escape_string($_POST['happyID']). "";
     
mysql_query($updateHappyRating);

?>