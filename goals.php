 <section id="goals" class="zoom">
    <h1>Edit your Goals.</h1>
    
    <div class="editWrap">
      <h5 class="editTitle">Add new goal:</h5>

      <div class="removeWrap">

           <form method="POST" action="" name="newGoal" id="newGoal">
	      <input type="text" id="addGoalText" name="post_title" maxLength="90" placeholder="Enter new goal." />

                
              <input type="submit" value="Add" id="addGoal" />
                  <span id="error" style="display: none; color:#F00">Some Error!Please Fill form Properly </span> 
		  <span id="success" style="display: none; color:#0C0">Your goal has been added! Add another?</span>
           </form>

       </div>
    </div>
       
    <div class="editWrap">
      <h5 class="editTitle">Manage goals:</h5>

      <h5 class="editCat">Active Goals:</h5>

    <?php
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

     <h5 class="editCat">Archived goals:</h5>

     <div class="removeWrap">
	<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
	<div class="reActivate removeOption">-Re-activate-</div>
	<div class="removeErase removeOption">-Delete all data-</div>
      </div>
    </div>

  </section>
