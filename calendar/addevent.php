<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
require_once 'aps/saveevent.php'; 

$timestamp=(int)$timestamp;
		$current_time=time();
		date_default_timezone_set("Europe/London");
		$date_added=date("d-M-y");
		$time_added=$current_time - $timestamp;
		?>
<!DOCTYPE HTML>
<html>
<body>
<main>
	<div id="container">
		<aside class="setpage">
<form method="post" class="pssdregister" action="" autocomplete="off" >
		<h2> Set a new plan</h2>
		<input type="hidden" name="suserid" value="<?php echo $u_id ?>"/>
		<input type="hidden" name="stimestamp" value="<?php echo $time_added ?>"/>
		 <label class="addinfo"  for="bday">Title:</label>
		<input type="text" maxlength="20" name="stitle" class="stitle" placeholder="Title"/>
		<label class="addinfo" for="bday">Type:</label>
		 <select  name="stype" class="stype" required="required" > 
			<option value="1">Assignment</option>
			<option value="2">Appointment</option>
			<option value="3">Homework</option>
			<option value="4">Others</option>
			</select>
		 <label class="addinfo" for="bday">Due Date:</label>
        <input type="date" name="sdate" class="dab"  Placeholder="Due date" required="required" id="d_o_b">
		 <label class="addinfo" for="bday">Due Time:</label>
		 <input type="time" class="dab" Placeholder="Due date"  name="stime" id="d_o_b">
		  <label class="addinfo" for="bday">Details:</label>
		<textarea class="sinfo" name="sdetails" placeholder="Details"></textarea>
		 <button type="submit" name="formsubmit" class="ssubmit" value="Update">Submit</button>
		 </form>
		 </aside>
</div>
</main>
</body>
</html>
<?php
 require_once 'aps/footer.php';?>	 
