<?php
define("ADAY", (60*60*24));
//Define year
if(isset($_POST['year'])){
$year = $_POST['year'];
} else {
	$nowArray = getdate();
$year = $nowArray['year'];	
}

if(isset($_POST['month'])){
$month = $_POST['month'];
}else{
$month = $nowArray['mon'];
}



$start = mktime (12, 0, 0, $month, 1, $year);
$firstDayArray = getdate($start);
?>
<html>

<body>

<span class="authaction"></span>
<div id="tablehomecon">

	<?php require_once 'testcal.php'; ?>
	<?php
	$datedaytoday  = date("d");
	$datemonthtoday  = date("m");
	$dateyeartoday  = date("Y");
	$days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
$days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
echo "<TABLE BORDER=0 CELLPADDING=1 class='tablecal' ><tr>\n";
foreach ($days as $day) {
  echo "<TD class='tablehomecalh' >$day</td>\n";
}
	for ($count=0; $count < (6*7); $count++) {
		$dayArray = getdate($start);
		if(($count % 7) == 0) {
			if ($dayArray['mon'] != $month){
				break;
			} else {
				echo "</tr><tr class='tablehomecalhq'>\n";
			}
		}
		if ($count < $firstDayArray['wday'] || $dayArray['mon'] != $month) {
			echo "<td></td>";
		} else {
			echo "<td>";
if ($dateyeartoday == $year AND $datemonthtoday == $month AND $datedaytoday == $dayArray['mday']){
	echo "<div class='dateoftoday'><p class='topright'>".$dayArray['mday']."</p></div>";
}	else {
	echo "<div class='dateofall'><p class='topright'>".$dayArray['mday']."</p></div>";
}
echo "</a><div class='calhomeevent'>";
$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' ORDER BY duedate") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$title = $row['title'];
						$type = $row['type'];
						$duedate = $row['duedate'];
						$duetime = $row['duetime'];
						$details = $row['details'];
						$color = $row['color'];
if($color == 1){
	$color = 'orange';
} else if($color == 2){
	$color = 'pink';
} else if($color == 3){
	$color = 'yellow';
} else if($color == 4){
	$color = 'green';
}  else if($color == 5){
	$color = 'blue';
}  else if($color == 6){
	$color = 'black';
}  else {
	$color = 'black';
}


$fduedate = date("d/m/Y",$duedate);
$duedateyear = date("Y",$duedate);
$duedatemonth = date("m",$duedate);
$duedateday = date("d",$duedate);
$day == $dayArray['mday'];
	//lets test the year

			if ($duedateyear == $year AND $duedatemonth == $month AND $duedateday == $dayArray['mday']){

				echo "<span id='".$color."_ev'> </span><p class='".$color."' onclick=\"location.href='event.php?u=$id'\" >".$title.'</p>';
}}
			echo "</div></td>\n";

			$start += ADAY;
		}
	}
	echo "</tr></table>";
	?>
	</div>
</body>
