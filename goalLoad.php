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
			 AND post_author = rating_author
			 AND DATE(rating_date) = DATE(NOW())
			 ");
        
	   $postTotal = mysql_num_rows($post);
        
	   while($postList = mysql_fetch_array($post))
	   {
           $postTitle = $postList["post_title"];
	   $postTitle = stripslashes($postTitle);
           $postAuthor = $postList["post_author"];
           $rateTitle = $postList["rating_title"];
	   $rateTitle = stripslashes($rateTitle);
           $rateAuthor = $postList["rating_author"];
           $rateScore = $postList["rating_score"];
           $rateID = $postList["rating_id"];
	   $active    = $_SESSION["user_name"];
           	
           if($rateTitle == null AND $postAuthor == $active)
               {
               echo '<form method="POST" action="" name="postRating" class="postRating">
   	         <div class="rateThis"> 
	          <div class="rateThisWrap">
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
            	echo '<form method="POST" action"" name="postRatingUpdate class="postRatingUpdate">
            	  <div class="rateThis"> 
            	    <div class="rateThisWrap">
            	    <select name="postSelectUpdate" class="postSelectUpdate">
	     	      <option class="selected" >' . $rateScore . '</option>
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
            	    <h3>' . $rateTitle . '</h3>
		    <input  type="hidden" name="rateID" value="' . $rateID . '"/>
            	    </div>
            	  </div>
                </form>';
            	}
           }

	   $happyPost = mysql_query("SELECT *
                        FROM `happy`, `users`
			WHERE happy_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			&& DATE(happy_date) = DATE(NOW())
			");

  	   $happyTotal = mysql_num_rows($happyPost);
  	   {
    	   if($happyTotal < 1)
    	   {
           echo '<form  method="POST" action="" name="happyRating" class="happyRating">
             <div class="rateThisDay">
	       <div class="rateThisWrap">
	        <select name="happyScore" class="happyScore">
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
	        <h3>Rate your overall happiness today.</h3>
	        <h5 class="happyMessage">**Base this on your mood and experience - this is not a overall grade of your goals.**</h5>
	     </div>
	  </div>
         </form>';
	 }
	 else
	 while($happyList = mysql_fetch_array($happyPost))
	 {
         $happyScore = $happyList["happy_score"];
         $happyID = $happyList["happy_id"];

	  echo '<form method="POST" action="" name="happyRatingUpdate" class="happyRatingUpdate">
             <div class="rateThisDay">
	       <div class="rateThisWrap">
	        <select name="happyScoreUpdate" class="happyScoreUpdate">
		      <option class="selected">' . $happyScore . '</option>
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
   	        <input  type="hidden" name="happyID" value="' . $happyID . '"/>
	        <h3>Rate your overall happiness today.</h3>
	        <h5 class="happyMessage">**Base this on your mood and experience - this is not a overall grade of your goals.**</h5>
	     </div>
	  </div>
       </form>';
	 }
	 }
       }
  }
?>


     

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
            console.log(data);
            $("#success").css('opacity', '1').fadeTo(3000, 0);
        },
        error: function (data) {
            $(".error").css('opacity', '1').fadeTo(3000, 0);
        }
    });
});

$('select.postSelectUpdate').change(function () {
    $.ajax({
        url: 'postRatingUpdate.php',
        data: $(this.form).serialize(),
        type: 'POST',
        success: function (data) {
            $("#goalLoad").load("goalLoad.php");
            console.log(data);
            $("#success").css('opacity', '1').fadeTo(3000, 0);
        },
        error: function (data) {
            $(".error").css('opacity', '1').fadeTo(3000, 0);
        }
    });
});

$('select.happyScore').change(function () {
    $.ajax({
        url: 'happyRate.php',
        data: $(this.form).serialize(),
        type: 'POST',
        success: function (data) {
            $("#goalLoad").load("goalLoad.php");
            console.log(data);
            $("#success").css('opacity', '1').fadeTo(3000, 0);
        },
        error: function (data) {
            $(".error").css('opacity', '1').fadeTo(3000, 0);
        }
    });
});

$('select.happyScoreUpdate').change(function () {
    $.ajax({
        url: 'happyRateUpdate.php',
        data: $(this.form).serialize(),
        type: 'POST',
        success: function (data) {
            $("#goalLoad").load("goalLoad.php");
            console.log(data);
            $("#success").css('opacity', '1').fadeTo(3000, 0);
        },
        error: function (data) {
            $(".error").css('opacity', '1').fadeTo(3000, 0);
        }
    });
});
</script>