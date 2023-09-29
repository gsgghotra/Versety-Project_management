<?php require_once 'init.php'; ?>
<html>

<body>

	<div id="tablehomeset">
 

 <!--- <form action="home.php" method="post">
    <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['calender'] != 'calender07') { echo "view_btn_active_left"; } else {echo "view_btn_left";}?>
     name="submitmonth">Month</button></td>
  </form>
  <form action="home.php" method="post">
    <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['calender'] == 'calender07') { echo "view_btn_active_right"; } else {echo "view_btn_right";}?>
     name="submitweek">Week</button></td>
  </form>
-->
<form method="post" class="deactiveform" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
	<?php
		if ($month >= 1){ ?>
				<input type="hidden" name="month" value="
	<?php echo $month - 1; ?>"/>
	<input type="hidden" name="year" value="<?php echo $year; ?>"/>
	<?php	}
		if ($month == 1){ ?>
				<input type="hidden" name="month" value="
	<?php echo '12' ?>"/>

	<input type="hidden" name="year" value="<?php echo $year - 1; ?>"/>
	<?php	}
	?>
	<button type="submit"  class="selback" value="Next"><span class="icon-circle-left"></span></button>
	</form>


	<form method="post" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
	<select name="month" class="selmon">
	<?php
	$months = Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	for ($x=1; $x <= count($months); $x++) {
		echo "<option class='seloption' value=\"$x\"";
		if ($x == $month) {
			echo " SELECTED";
		}
			echo ">".$months[$x-1]."";
	} ?>
	</select>
	<select name="year" class="selyear">
	<?php
	for ($x=2016; $x<=2025; $x++){
		echo " <option";
		if ($x == $year) {
			echo " SELECTED";
		}
		echo ">$x";
	}
	?>
	</select>
	<button type="submit" class="selgo" value="Go!"><span class="icon-circle-down"></span></button>
</form>

	<!---  testing next button -->
	<form method="post" class="deactiveform" action="<?php echo "$_SERVER[PHP_SELF]"; ?> ">
	<?php
		if ($month <= 12){ ?>
				<input type="hidden" name="month" value="
	<?php echo $month + 1; ?>"/>
	<input type="hidden" name="year" value="<?php echo $year; ?>"/>
	<?php	}
		if ($month == 12){ ?>
				<input type="hidden" name="month" value="
	<?php echo '1' ?>"/>
	<input type="hidden" name="year" value="<?php echo $year + 1; ?>"/>
	<?php	}
	?>
	<button type="submit" class="selnext" value="Next"><span class="icon-circle-right"></span></button>
	</form>
	</div>

