 <section id="goals" class="zoom">
    <h1>Edit your Goals.</h1>
    
    <div class="editWrap">
      <h5 class="editTitle">Add new goal:</h5>

      <div class="removeWrap">

           <form method="POST" action="" name="newGoal" id="newGoal">
	      <input type="text" id="addGoalText" name="post_title" maxLength="90" placeholder="Enter new goal." />

                
              <input type="submit" value="Add" id="addGoal" />
                  <div id="error">Woops! It didn't work. Give it another try!</div> 
		  <div id="success">Your goal has been added! Add another?</div>
           </form>

       </div>
    </div>
       
    <div class="editWrap">
      <h5 class="editTitle">Manage goals:</h5>

      <h5 class="editCat">Active Goals:</h5>

     <?php
     echo '<div id="goalDelete"></div>';
     ?>

     <h5 class="editCat">Archived goals:</h5>

     <div class="removeWrap">
	<h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
	<div class="reActivate removeOption">-Re-activate-</div>
	<div class="removeErase removeOption">-Delete all data-</div>
      </div>
    </div>

  </section>
