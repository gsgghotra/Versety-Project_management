<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/saveevent.php';
require_once 'aps/header.php';
?>
<!DOCTYPE html>
<html>
<head>
 <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>

 <link rel="stylesheet" type="text/css" href="js/date/jquery.datetimepicker.css"/ >
<script type="text/javascript" src="js/date/jquery.datetimepicker.full.js"></script>

<div id="container">
<aside class="rhome">
<?php
$timestamp ='';
$timestamp=(int)$timestamp; 
		$current_time=time();
		$date_added=date("d-M-y");
		$time_added=$current_time - $timestamp;
		?>
<!---   Test for new update - gsg 20/07/17     -->

  <!---  Change calender view buttons-->
  <?php 
if(isset($_POST['submitweek'])) {
$_SESSION['calender'] = "calender07";
} else {
	$_SESSION['calender'] = "calender30";
}
  ?>
<form method="post" action="" autocomplete="off">
		<h2> New Event</h2>
		<input type="hidden" name="suserid" value="<?php echo $u_id ?>"/>
		<input type="hidden" name="stimestamp" value="<?php echo $time_added ?>"/>
<div class="fieldrow">
		 <label class="fieldtitle"  for="bday">Title:</label>
		<input type="text" maxlength="19" name="stitle" required="required" class="fieldinput" placeholder="Title"/>
	</div>
			<div class="fieldrow">
		 <label class="fieldtitle" for="bday">Date:</label>
        <input type="text" name="sdate" class="dab" Placeholder="Due date" required="required" id="datetimepicker"/>
			</div>

	 	<div class="fieldrow">
	 		<label class="fieldtitle" for="bday">Colour: </label>
	 		<div class="colour_container">
			<label class="orange_op">
			  <input type="radio" name="color" value="1">
			  <div class="button"><span></span></div>
			</label>

			<label class="indigo_op">
			  <input type="radio" name="color" value="2">
			  <div class="button"><span></span></div>
			</label>

			<label class="amber_op">
			  <input type="radio" name="color" value="3">
			  <div class="layer"></div>
			  <div class="button"><span></span></div>
			</label>

			<label class="lime_op">
			  <input type="radio" name="color" value="4">
			  <div class="layer"></div>
			  <div class="button"><span></span></div>
			</label>

			<label class="blue_op">
			  <input type="radio" name="color" value="5">
			  <div class="layer"></div>
			  <div class="button"><span></span></div>
			</label>

			<label class="black_op">
			  <input type="radio" name="color" value="6">
			  <div class="layer"></div>
			  <div class="button"><span></span></div>
			</label>
		</div>
	</div>
	 


		 <div class="fieldrow">
		  <label class="fieldtitle" for="bday">Info:</label>
		<textarea class="sinfo" name="sdetails" placeholder="Details"></textarea>
	</div>
		 <button type="submit" name="formsubmit" class="ssubmit" value="Update"><span class="icon-compass"></span>  Add  </button>
		 </form>
</aside>

<!-- MAin content of the body --> 
<main>
	<?php

if ($_SESSION['calender']=="calender07"){
	require_once 'aps/weekly_view.php'; 
	} else {
	require_once 'aps/smallcal.php'; }
?>
</main>
<script type="text/javascript">
jQuery('#datetimepicker').datetimepicker({
	step:10,
    timepicker: true,
    formatDate:'d/m/Y',
 minDate:'01/10/2017',//yesterday is minimum date(for today use 0 or -1970/01/01)
 maxDate:'10/03/2021'
});
</script>
<!-- Footer -->
</div>
<?php require_once 'aps/footer.php';?>

</body>
</html>
