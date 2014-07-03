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


//Week Average of all goal ratings 

$avgWeek = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && rating_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
while($avgRowWeek = mysql_fetch_array($avgWeek))
{
$averageWeek = $avgRowWeek["avg(rating_score)"];
$avgRoundWeek = round($averageWeek, -1);
}

//Month Average of all goal ratings 

$avgMonth = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && rating_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
while($avgRowMonth = mysql_fetch_array($avgMonth))
{
$averageMonth = $avgRowMonth["avg(rating_score)"];
$avgRoundMonth = round($averageMonth, -1);
}

//All-time Average of all goal ratings 

$avg = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'");
while($avgRow = mysql_fetch_array($avg))
{
$average = $avgRow["avg(rating_score)"];
$avgRoundAlltime = round($average, -1);
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
	  </h6>
	   <h6 class="metricsTitleSub">7 days:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundWeek . ''; ?></h6>
              </span>
	  </h6>
	  <h6 class="metricsTitleSub">30 Days:
	      <span>
                 <h6 class="metricsGrade math"><?php echo '' . $avgRoundMonth . ''; ?></h6>
              </span>
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
	  $indieRatingWeek = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' && rating_title = '$indieTitle' && rating_date > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
	  $indieRatingMonth = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' && rating_title = '$indieTitle' && rating_date > DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	  $indieRating = mysql_query("SELECT avg(rating_score) FROM `rating`, `post` WHERE rating_author = '$indieAuthor' AND rating_title = '$indieTitle'");

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
	  <h6 class="metricsTitle">All time average:</h6>
	  <h6 class="metricsGrade math"></h6>
	</div>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">Happiest when this goal has a high rating:</h6>
	  <h6 class="metricsGrade"></h6>
	</div>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">All time average:</h6>
	  <h6 class="metricsGrade math"></h6>
	</div>
      </div>
 </div>

<script >
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