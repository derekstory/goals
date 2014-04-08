<?php
include'connect.php';
include 'head.php';

$initial = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			");

  $initialTotal = mysql_num_rows($initial);
  {
    if($initialTotal < 1)
    {
    echo '<div>too bad yo</div>';
    }
    else
    {

    $post = mysql_query("SELECT *
			 FROM `post`
			 LEFT JOIN rating ON rating.rating_title = post_title
			 AND post_author = '" . $_SESSION['user_name'] . "'
			 AND DATE(rating_date) = DATE(NOW())
			 ");
        
	   $postTotal = mysql_num_rows($post);
        
	   while($postList = mysql_fetch_array($post))
	   {
           $postTitle = $postList["post_title"];
           $postAuthor = $postList["post_author"];
           $rateTitle = $postList["rating_title"];
           $rateAuthor = $postList["rating_author"];
           $rateScore = $postList["rating_score"];
	   $active    = $_SESSION["user_name"];
           	
           if($rateTitle == null && $postAuthor == $active)
               {
               echo '<form method="POST" action="" name="postRating" class="postRating">
   	         <div class="rateThis"> 
	          <div class="rateThisWrap">
		    <div style="opacity: 0" class="error">bad!</div>
	            <select name="postSelect" class="postSelect">
		      <option class="selected"></option>
		      <option value="120">A+</option>
		      <option value="110">A</option>
		      <option value="100">A-</option>
		      <option value="90">B+</option>
		      <option value="80">B</option>
		      <option value="70">B-</option>
		      <option value="60">C+</option>
		      <option value="50">C</option>
		      <option value="40">C-</option>
		      <option value="30">D+</option>
		      <option value="20">D</option>
		      <option value="10">D-</option>
		      <option value="0">F</option>
	            </select>
		    <input  type="hidden" name="postTitle" value="' . $postTitle . '"/>
	            <h3>' . $postTitle . '</h3>
	          </div>
	         </div>
                </form>';

  	    	}
            	if(!empty($rateTitle) && $rateAuthor == $active)
            	{
            	echo '<form>
            	  <div class="rateThis"> 
            	    <div class="rateThisWrap">
            	    <select>
	     	      <option class="selected">' . $rateScore . '</option>
	     	      <option value="100">A+</option>
	     	      <option>A</option>
	     	      <option>A-</option>
	     	      <option>B+</option>
	     	      <option>B</option>
	     	      <option>B-</option>
	     	      <option>C+</option>
	     	      <option>C</option>
	     	      <option>C-</option>
	     	      <option>D+</option>
	     	      <option>D</option>
	     	      <option>D-</option>
	     	      <option>F</option>
            	      </select>
            	      <h3>' . $rateTitle . '</h3>
            	    </div>
            	  </div>
                </form>';
            	}
           }
       }
  }
?>


      <form>
	<div class="rateThisDay">
	  <div class="rateThisWrap">
	    <select>
	      <option></option>
	      <option>A</option>
	      <option>A-</option>
	      <option>B+</option>
	      <option>B</option>
	      <option>B-</option>
	      <option>C+</option>
	      <option>C</option>
	      <option>C-</option>
	      <option>D+</option>
	      <option>D</option>
	      <option>D-</option>
	      <option>F</option>
	    </select>
	    <h3>Rate your overall happiness today.</h3>
	    <h5>**Base this on your mood and experience - this is not a overall grade of your goals.**</h5>
	  </div>
	</div>
      </form>

<script >
$(".selected").text(function () {
    return $(this).text().replace("120", "A+")
                         .replace("110", "A")
                         .replace("100", "A-")
                         .replace("90", "B+")
                         .replace("80", "B")
                         .replace("70", "B-")
                         .replace("60", "C+")
                         .replace("50", "C")
                         .replace("40", "C-")
                         .replace("30", "D+")
                         .replace("20", "D")
                         .replace("10", "D-")
                         .replace("0", "F")
});


$('select.postSelect').change(function () {
    $.ajax({
        url: 'postRating.php',
        data: $(this.form).serialize(),
        type: 'POST',
        success: function (data) {
            $("#goalLoad").load("goalLoad.php");
            $("#goalDelete").load("goalDelete.php");
            console.log(data);
            $("#success").css('opacity', '1').fadeTo(3000, 0);
            $('#addGoalText').val("");
        },
        error: function (data) {
            $(".error").css('opacity', '1').fadeTo(3000, 0);
        }
    });
});


</script>