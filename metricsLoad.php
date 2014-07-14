<?php
include'connect.php';
include 'head.php';

//Today Average of all Goal ratings

$avgToday = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && DATE(`rating_date`) = CURDATE()");
while($avgRowToday = mysql_fetch_array($avgToday))
{
    $averageToday = $avgRowToday["avg(rating_score)"];
    $avgRoundToday = round($averageToday, -1);
}

//Yesterday Average
$avgYesterday = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && `rating_date` > DATE_ADD(CURDATE(), INTERVAL -2 DAY) AND `rating_date` < CURDATE()");
while($avgRowYesterday = mysql_fetch_array($avgYesterday))
{
    $averageYesterday = $avgRowYesterday["avg(rating_score)"];
    $avgRoundYesterday = round($averageYesterday, -1);
}

//Week Average of all goal ratings  

$avgWeek = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && rating_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
while($avgRowWeek = mysql_fetch_array($avgWeek))
{
    $averageWeek = $avgRowWeek["avg(rating_score)"];
    $avgRoundWeek = round($averageWeek, -1);
}
//Previous Week Average of all goal ratings  

$avgPrevWeek = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "' && rating_date > DATE_SUB(NOW(), INTERVAL 2 WEEK) && rating_date < DATE_SUB(NOW(), INTERVAL 1 WEEK)");
while($avgRowPrevWeek = mysql_fetch_array($avgPrevWeek))
{
    $averagePrevWeek = $avgRowPrevWeek["avg(rating_score)"];
    $avgRoundPrevWeek = round($averagePrevWeek, -1);
}
//Month Average of all goal ratings 

$avgMonth = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && rating_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
while($avgRowMonth = mysql_fetch_array($avgMonth))
{
    $averageMonth = $avgRowMonth["avg(rating_score)"];
    $avgRoundMonth = round($averageMonth, -1);
}

//Previous Month Average of all goal ratings 

$avgPrevMonth = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "' && rating_date > DATE_SUB(NOW(), INTERVAL 2 MONTH) && rating_date < DATE_SUB(NOW(), INTERVAL 1 MONTH)"); 
while($avgRowPrevMonth = mysql_fetch_array($avgPrevMonth))
{
    $averagePrevMonth = $avgRowPrevMonth["avg(rating_score)"];
    $avgRoundPrevMonth = round($averagePrevMonth, -1);
}


//All-time Average of all goal ratings 

$avg = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'");
while($avgRow = mysql_fetch_array($avg))
{
    $average = $avgRow["avg(rating_score)"];
    $avgRoundAlltime = round($average, -1);
}

//Today's Average of Happiness rating

$happyToday = mysql_query("SELECT avg(happy_score) FROM `happy`, `users` WHERE happy_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && DATE(`happy_date`) = CURDATE()");
while($happyRowToday = mysql_fetch_array($happyToday))
{
    $happyAvgToday = $happyRowToday["avg(happy_score)"];
    $happyRoundToday = round($happyAvgToday, -1);
}

//Week's Average of Happiness rating

$happyWeek = mysql_query("SELECT avg(happy_score) FROM `happy`, `users` WHERE happy_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && DATE(`happy_date`) > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
while($happyRowWeek = mysql_fetch_array($happyWeek))
{
    $happyAvgWeek = $happyRowWeek["avg(happy_score)"];
    $happyRoundWeek = round($happyAvgWeek, -1);
}

//Month's Average of Happiness rating
$happyMonth = mysql_query("SELECT avg(happy_score) FROM `happy`, `users` WHERE happy_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && DATE(`happy_date`) > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
while($happyRowMonth = mysql_fetch_array($happyMonth))
{
    $happyAvgMonth = $happyRowMonth["avg(happy_score)"];
    $happyRoundMonth = round($happyAvgMonth, -1);
}

//All Time Average of Happiness rating
$happyAlltime = mysql_query("SELECT avg(happy_score) FROM `happy`, `users` WHERE happy_author = user_name && user_name = '" . $_SESSION['user_name'] . "'");
while($happyRowAlltime = mysql_fetch_array($happyAlltime))
{
    $happyAvgAlltime = $happyRowAlltime["avg(happy_score)"];
    $happyRoundAlltime = round($happyAvgAlltime, -1);
}

//Individual goal statistics
$indie = mysql_query("SELECT *
                        FROM `post`, `users`
			WHERE post_author = user_name 
			&& user_name = '" . $_SESSION['user_name'] . "'
			");
$indieTotal = mysql_num_rows($indie);
?>

 <div class="metricsSectionWrap" id="allTimeWrap">
      <h3 class="metricsSectionTitle" id="allTime"></h3>
      <div class="metricsWrap">
	<h6 class="metricsPreTitle">Goals</h6>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">-Average for all goals- </h6>
	  <h6 class="metricsTitleSub">Today:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundToday . ''; ?></h6>
              </span>

	      <?php
  
              if($avgRoundToday > $avgRoundYesterday)
	          {
   	          echo '<span class="arrowUp" title="Improved from yesterday">
	      	      (&#8593;)
	      	  </span>';
		  }
		  elseif($avgRoundToday < $avgRoundYesterday)
		  {
 		  echo '<span class="arrowDown" title="Down from yesterday">
	      	     (&#8595;)
	      	  </span>';
		  }
 		  elseif($avgRoundToday == $avgRoundYesterday)
		  {
 		  echo '<span class="equal">
		  
	      	  </span>';
		  }
	      ?>
	  </h6>
	   <h6 class="metricsTitleSub">7 days:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundWeek . ''; ?></h6>
              </span>

              <?php
  
              if($avgRoundWeek > $avgRoundPrevWeek)
	          {
   	          echo '<span class="arrowUp" title="Improved from previous 7 days">
	      	      (&#8593;)
	      	  </span>';
		  }
		  elseif($avgRoundWeek < $avgRoundPrevWeek)
		  {
 		  echo '<span class="arrowDown" title="Down from previous 7 days">
	      	     (&#8595;)
	      	  </span>';
		  }
 		  elseif($avgRoundWeek == $avgRoundPrevWeek)
		  {
 		  echo '<span class="equal">
		  
	      	  </span>';
		  }
	      ?>

	  </h6>
	  <h6 class="metricsTitleSub">30 Days:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundMonth . ''; ?></h6>
              </span>


  	      <?php
  
              if($avgRoundMonth > $avgRoundPrevMonth)
	          {
   	          echo '<span class="arrowUp" title="Improved from previous 30 days">
	      	      (&#8593;)
	      	  </span>';
		  }
		  elseif($avgRoundMonth < $avgRoundPrevMonth)
		  {
 		  echo '<span class="arrowDown" title="Down from previous 30 days">
	      	     (&#8595;)
	      	  </span>';
		  }
 		  elseif($avgRoundMonth == $avgRoundPrevMonth)
		  {
 		  echo '<span class="equal">
		  
	      	  </span>';
		  }
	      ?>

	  </h6>
	   <h6 class="metricsTitleSub">All Time:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundAlltime . ''; ?></h6>
              </span>
	  </h6>
	</div>

	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">-Individual Goal Averages-</h6>

	<?php
	while($indieList = mysql_fetch_array($indie))
	{
	  $indieTitle = $indieList["post_title"];

	  $indieAuthor = $indieList["post_author"];
	  $indieRatingWeek = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' && rating_title = '".mysql_real_escape_string($indieTitle). "' && rating_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
	  $indieRatingMonth = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' && rating_title = '".mysql_real_escape_string($indieTitle). "' && rating_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	  $indieRating = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' AND rating_title = '".mysql_real_escape_string($indieTitle). "'");


	      while($indieAvgWeek = mysql_fetch_array($indieRatingWeek))
	      {
	      $indieAvgWeek = $indieAvgWeek["avg(rating_score)"];
	      $indieAvgWeekRound = round($indieAvgWeek, -1);

   	      while($indieAvgMonth = mysql_fetch_array($indieRatingMonth))
	      {
	      $indieAvgMonth = $indieAvgMonth["avg(rating_score)"];
	      $indieAvgMonthRound = round($indieAvgMonth, -1);

	      while($indieAvgAll = mysql_fetch_array($indieRating))
	      {
	      $indieAvg = $indieAvgAll["avg(rating_score)"];
	      $indieAvgAlltime = round($indieAvg, -1);

	         if($indieTotal != 0)
	         {	
	             echo '<h6 class="metricsTitleSub">
		        <span>
		           <h6 class="metricsGrade">' .$indieTitle. '</h6>
		        </span>
		     </h6>

		     <div class="timeDescriptWrap">
		        <h6 class="timeDescript">7 days: <span class="math">' .$indieAvgWeekRound. '</span> &nbsp;&nbsp;|&nbsp;&nbsp; 30 days: <span class="math">' .$indieAvgMonthRound. '</span> &nbsp;&nbsp;|&nbsp;&nbsp; All time: <span class="math">' .$indieAvgAlltime. '</span> </h6>
		     </div>';
		  }
	      }
	      }
	      }
	}
	?>
   </div>

   <div class="break"></div>

   <h6 class="metricsPreTitle">Happiness</h6>
   <div class="metricsRateWrap">
      <h6 class="metricsTitle">Average:</h6>
      <h6 class="metricsTitleSub">Today:
          <span>
             <h6 class="metricsGrade math"><?php echo '' . $happyRoundToday . ''; ?></h6>
          </span>
      </h6>
      <h6 class="metricsTitleSub">7 days:
          <span>
             <h6 class="metricsGrade math"><?php echo '' . $happyRoundWeek . ''; ?></h6>
          </span>
      </h6>
      <h6 class="metricsTitleSub">30 Days:
          <span>
             <h6 class="metricsGrade math"><?php echo '' . $happyRoundMonth . ''; ?></h6>
          </span>
       </h6>
       <h6 class="metricsTitleSub">All Time:
          <span>
            <h6 class="metricsGrade math"><?php echo '' . $happyRoundAlltime . ''; ?></h6>
          </span>
       </h6>
       <h6 class="metricsGrade math"></h6>
   </div>
  </div>
 </div>

<script>
$(".math").text(function () {
    return $(this).text().replace("130", "A+")
                         .replace("120", "A")
                         .replace("110", "A-")
                         .replace("100", "B+")
                         .replace("90", "B")
                         .replace("80", "B-")
                         .replace("70", "C+")
                         .replace("60", "C")
                         .replace("50", "C-")
                         .replace("40", "D+")
                         .replace("30", "D")
                         .replace("20", "D-")
                         .replace("10", "F")
                         .replace("0", "--")
});

</script>