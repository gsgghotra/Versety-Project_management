<?php

$date = date('d');
$day = date("D");
//Find correct day layout
if($day == "Mon"){
	$c_day = $date-1;
}else if ($day == 'Tue'){$c_day = $date-2;}
	else if ($day == 'Wed'){$c_day = $date-3;}
		else if ($day == 'Thu'){$c_day = $date-4;}
			else if ($day == 'Fri'){$c_day = $date-5;}
				else if ($day == 'Sat'){$c_day = $date-6;}
else {$c_day = $date;};
//Add day to the date
$day_1 = date('D', strtotime("-1 day"));
$day1 = date('D', strtotime("+1 day"));
$day2 = date('D', strtotime("+2 day"));
$day3 = date('D', strtotime("+3 day"));
$day4 = date('D', strtotime("+4 day"));
$day5 = date('D', strtotime("+5 day"));
$day6 = date('D', strtotime("+6 day"));
//Dates  for weeks
//Add day to the date
$date_1 = date('d', strtotime("-1 day"));
$date1 = date('d', strtotime("+1 day"));
$date2 = date('d', strtotime("+2 day"));
$date3 = date('d', strtotime("+3 day"));
$date4 = date('d', strtotime("+4 day"));
$date5 = date('d', strtotime("+5 day"));
$date6 = date('d', strtotime("+6 day"));

//this month

$monththis = date('m');
$yearthis = date('Y');
?>
<html>

<body>
<style>

</style>
<span class="authaction"></span>
<div id="tablehomecon">

	<?php require_once 'weekly_tab.php'; ?>

	<?php
	$datedaytoday  = date("d");
	$datemonthtoday  = date("m");
	$dateyeartoday  = date("Y");
	$days = Array("Time","$day_1 $date_1", "$day $date ", "$day1 $date1", "$day2 $date2", "$day3 $date3", "$day4 $date4", "$day5 $date5");




	$time = Array("00:00","01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00");




	echo "<ul>";
foreach ($days as $day) {
  echo "<li style=\"float: left;\"><a style=' display: block;' href=''>$day\"-\"</a></li>";
}
	echo "</ul></br>";



	echo "<ul>";
foreach ($time as $hour) {
  echo "<li><a style=' float:left; display: inline' href='#hom'>$hour</a></li>";
}
	echo "</ul>";





	echo "<ul>";
foreach ($time as $hour) {
   echo "<li><a style=' float:left; display: inline' href='#hom'>$hour</a></li>";
}
	echo "</ul>";
	?>
<tr>

	</div>
</body>
