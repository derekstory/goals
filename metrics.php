
<?php
//All-time Average of all ratings 

$avg = mysql_query("SELECT avg(rating_score) FROM `rating`, `users` WHERE rating_author = user_name && user_name = '" . $_SESSION['user_name'] . "'");
while($avgRow = mysql_fetch_array($avg))
{
$average = $avgRow["avg(rating_score)"];
$avgRoundAlltime = round($average, -1);
}
?>

 <section id="metrics" class="zoom">
    <h1>Metrics</h1>

   <div class="metricsSectionWrap" id="allTimeWrap">
      <h3 class="metricsSectionTitle" id="allTime"></h3>
      <div class="metricsWrap">
	<h6 class="metricsPreTitle">Goals</h6>
	<div class="metricsRateWrap">
	  <h6 class="metricsTitle">All time average:</h6>
	  <h6 class="metricsGrade math"><?php echo '' . $avgRoundAlltime . ''; ?></h6>
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
  </section>

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