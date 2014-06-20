<?php
include'connect.php';
include 'head.php';

//24 hour Average of all goal ratings 

$avgToday = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'  && rating_date > DATE_SUB(NOW(), INTERVAL 1 DAY)");
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

?>

 <div class="metricsSectionWrap" id="allTimeWrap">
      <h3 class="metricsSectionTitle" id="allTime"></h3>
      <div class="metricsWrap">
	<h6 class="metricsPreTitle">Goals</h6>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">Average for all goals:</h6>
	  <h6 class="metricsTitleSub">24 Hours:
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
	  <h6 class="metricsTitle">Most improved goal:</h6>
	  <h6 class="metricsGrade"></h6>
	</div>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">All time average:</h6>
	  <h6 class="metricsGrade math"></h6>
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
</script>