<?php
include'connect.php';

$rate = mysql_query("SELECT *
                        FROM `rating`, `users`
			WHERE rating_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			&& DATE(rating_date) = DATE(NOW())");
  $rateTotal = mysql_num_rows($rate);
  {
    if($rateTotal < 1)
    {

    $post = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'");
        $postTotal = mysql_num_rows($post);
        {
        if($postTotal < 1)
           {
	   echo '<h4>Nothing is here yo</h4>';
	   
	   echo '<script>

	   </script';
	   }
	   else
	   while($postList = mysql_fetch_array($post))
	   {
           $postTitle = $postList["post_title"];	

           echo '<form>
   	     <div class="rateThis"> 
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
	        <h3>' . $postTitle . '</h3>
	      </div>
	     </div>
           </form>';
	   }
	 }
    }	 
    else
    while($rateList = mysql_fetch_array($rate))
    {
    $rateTitle = $rateList["rating_title"];	
    $rateScore = $rateList["rating_score"];	
    
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