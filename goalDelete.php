<?php
    include 'connect.php';

    echo '<div class="editWrap">
      <h5 class="editTitle">Manage goals:</h5>';

    $rate = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			&& post_status = 'active'");
    $rateTotal = mysql_num_rows($rate);
    {
    if($rateTotal < 1)
        {
	echo '<h4 style="text-align: center; padding: .3em;">You have no goals to manage.</h4>';
	}
	else
	while($rateList = mysql_fetch_array($rate))
	{
        $rateTitle = $rateList["post_title"];
	$rateTitle = stripslashes($rateTitle);
        $postID = $rateList["post_id"];

        echo'<form method="POST" action="" name="delete" class="postDelete">
	<div class="removeWrap">
	   <h6>' . $rateTitle . '</h6>
	   <div class="delete">-Delete all data-</div>
	   <div class="deleteWarning">
	       <span>Are you sure?</span>
	       <span><input class="yes" value="Yes" type="submit" /></span>
	       <span> / </span>
	       <span class="no">No</span>
	   </div>
        </div>
	<input  type="hidden" name="postID" value="' . $postID . '"/>
	</form>';
        }
     }
?>
</div>

<script>
$('.delete').click(function() {
$(this).hide().next().show();			      
});

$('.no').click(function() {
$(this).parent().hide().prev().show();
});

$('.postDelete').on('submit', function(e) {
e.preventDefault();
    $.ajax({
        url: 'delete.php',
        data: $(this).serialize(),
        type: 'POST',
        success: function (data) {
            $("#goalDelete").load("goalDelete.php");
	    $("#goalLoad").load("goalLoad.php");	
	    $("#metricsLoad").load("metricsLoad.php");	
            console.log(data);
        },
        error: function (data) {
        }
    });
});

</script>
