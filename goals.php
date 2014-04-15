 <section id="goals" class="zoom">
    <h1>Edit your Goals.</h1>

    <div class="editWrap">
      <h5 class="editTitle">Add new goal:</h5>
      <div class="removeWrap">
           <form method="POST" action="" name="newGoal" id="newGoal">
	      <input type="text" id="addGoalText" name="post_title" maxLength="90" placeholder="Enter new goal." />

              <input type="submit" value="Add" id="addGoal" />
                  <div id="error">You didn't add any content!</div> 
		  <div id="success">Your goal has been added! Add another?</div>
            </form>
       </div>
    </div>

    <div class="editWrap">
      <h5 class="editTitle">Manage goals:</h5>
      <?php
      echo '<div id="goalDelete"></div>';
      ?>
    </div>

</section>

