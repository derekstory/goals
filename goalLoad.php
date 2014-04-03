<?php
include'connect.php';

    $rate = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'");
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
	        <h3>' . $rateTitle . '</h3>
	      </div>
	      <div onclick="document.myform.submit()" class="updateRating">UPDATE</div>
	  </div>
         </form>';
	 }
      }	 
      ?>