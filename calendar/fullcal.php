<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
define("ADAY", (60*60*24));
if (!checkdate($_POST['month'], 1, $_POST['year'])) {
	$nowArray = getdate();
	$month = $nowArray['mon'];
	$year = $nowArray['year'];
} else {
	$month = $_POST['month'];
	$year = $_POST['year'];
}
$start = mktime (12, 0, 0, $month, 1, $year);
$firstDayArray = getdate($start);
?>
<html>
<head>
	<script language="JavaScript">
	function eventWindow(url){
		event_popupWin = window.open(url, 'event', 'resizeable=yes, scrollbars=yes, toolbar=no,width=400,height=400');
		event_popupWin.opener = self;
	}
	</script>
</head>
<body>

	<br>
	<?php
	$datedaytoday  = date("d");
	$datemonthtoday  = date("m");
	$dateyeartoday  = date("Y");
	$days = Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
	echo "<TABLE BORDER=1 CELLPADDING=4 class='tablecal' ><tr>\n";
	foreach ($days as $day) {
		echo "<TD class='tablecalh' ><strong>$day</strong></td>\n";
	}
	for ($count=0; $count < (6*7); $count++) {
		$dayArray = getdate($start);
		if(($count % 7) == 0) {
			if ($dayArray['mon'] != $month){
				break;
			} else {
				echo "</tr><tr class='tablecalhq'>\n";
			}
		}
		if ($count < $firstDayArray['wday'] || $dayArray['mon'] != $month) {
			echo "<td>  </td>";
		} else {
			echo "<td><a href=\"javascript:eventWindow('newevent.php?m=".$month."&d=".$dayArray['mday']."&y=$year');\">";
if ($dateyeartoday == $year AND $datemonthtoday == $month AND $datedaytoday == $dayArray['mday']){
	echo "<div class='dateoftoday'>".$dayArray['mday']."</div>";
}	else {
	echo $dayArray['mday'];
}
echo "</a> <br> <br>";
$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' ORDER BY duedate") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$title = $row['title'];
						$type = $row['type'];
						$duedate = $row['duedate'];
						$duetime = $row['duetime'];
						$details = $row['details'];

$fduedate = date("d/m/Y",$duedate);
$duedateyear = date("Y",$duedate);
$duedatemonth = date("m",$duedate);
$duedateday = date("d",$duedate);
$day == $dayArray['mday'];
	//lets test the year

			if ($duedateyear == $year AND $duedatemonth == $month AND $duedateday == $dayArray['mday']){

				echo "<p onclick=\"location.href='event.php?u=$id'\" >".$title.'</p><br>';
}}
			echo "</td>\n";

			$start += ADAY;
		}
	}
	echo "</tr></table>";
	?>
	</div>
</body>
<footer>
	<h4> &copy; G4A 2016</h4>
</footer>
</html>
