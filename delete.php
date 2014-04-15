<?php
include 'connect.php';

$delete = "DELETE FROM post
	   WHERE post_id = " . mysql_real_escape_string($_POST['postID']) . "";
     
mysql_query($delete);

?>