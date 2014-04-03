 <?php
    include 'connect.php';

    $rate = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			&& post_status = 'active'");
    $rateTotal = mysql_num_rows($rate);
    {
    if($rateTotal < 1)
        {
	echo '<h4>Nothing is here yo</h4>';
	}
	else
	while($rateList = mysql_fetch_array($rate))
	{
        $rateTitle = $rateList["post_title"];

        echo'<div class="removeWrap">
	   <h6>' . $rateTitle . '</h6>
	   
	   <div onclick="document.myform.submit()" class="removeDisable removeOption">-Archive-</div>

	   <div class="removeErase removeOption">-Delete all data-</div>
        </div>';
        }
     }
?>