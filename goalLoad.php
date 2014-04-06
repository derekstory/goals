<?php
include'connect.php';

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
			 FROM post
			 LEFT JOIN rating ON rating.rating_title = post_title
			 AND post_author = '" . $_SESSION['user_name'] . "'
			 AND DATE(rating_date) = DATE(NOW())
			 ");
        
	   $postTotal = mysql_num_rows($post);
          
        
           if($postTotal < 1)
	   {
	   }	   
	   else
	   while($postList = mysql_fetch_array($post))
	   {
           $postTitle = $postList["post_title"];
           $rateTitle = $postList["rating_title"];
           $rateScore = $postList["rating_score"];
           	
           if($rateTitle == null)
           {
           echo '<form>
   	     <div class="rateThis"> 
	      <div class="rateThisWrap">
	        <select>
		  <option class="selected"></option>
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
	        <h3>' . $postTitle . '</h3>
	      </div>
	     </div>
            </form>';
	    }
            if(!empty($rateTitle))
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

<script>
$(".selected").text(function () {
    return $(this).text().replace("100", "A+")
                         .replace("95", "A")
                         .replace("90", "A-")
                         .replace("87", "B+")
                         .replace("85", "B")
                         .replace("80", "B-")
});
</script>