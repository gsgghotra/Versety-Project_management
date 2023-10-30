<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php'; 
?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
		.left_container_project {
			float: left;
			width: 26%;
			border: 1px solid #e2e2e2;
			padding-bottom: 10px;
			background-color: #ffffff;
			border-radius: 10px 0px 0px 0px;
		}
		.left_project {
			width: 100%;
			padding-bottom: 10px;
			background-color: #ffffff;
			border-radius: 10px 0px 0px 0px;
		}
		.left_project h2 {
			color: #000000;
			background-color: #dedede;
			margin: 0px auto;
			border-bottom: 1px solid silver;
			width: 100%;
			padding-top: 5px;
			padding-bottom: 5px;
			border-radius: 10px 0px 0px 0px;
			text-align: center;
			border-bottom: none;
			margin-bottom: 15px;
			font-size: 14px;
		}

		/* Notification id */
		.right_project {
			width: 100%;
			padding-bottom: 10px;
			background-color: #ffffff;
			border-radius: 10px 0px 0px 0px;
		}
		.right_project h2 {
			color: #000000;
			background-color: #dedede;
			margin: 0px auto;
			border-bottom: 1px solid silver;
			width: 100%;
			padding-top: 5px;
			padding-bottom: 5px;
			border-radius: 10px 0px 0px 0px;
			text-align: center;
			border-bottom: none;
			margin-bottom: 15px;
			font-size: 14px;
		}

		/* Project */
		.project_centre {
			color: black;
			float: left;
			width: 50%;
			height: 100%;
			border: 1px solid #e2e2e2;
			padding-bottom: 10px;
			background-color: #ffffff;
		}
		.project_centre h2 {
			color: #000000;
			background-color: #dedede;
			margin: 0px auto;
			border-bottom: 1px solid silver;
			width: 100%;
			padding-top: 5px;
			padding-bottom: 5px;
			text-align: center;
			border-bottom: none;
			margin-bottom: 15px;
			font-size: 14px;
		}
		.right_project {
			float: left;
			width: 23%;
			border: 1px solid #e2e2e2;
			padding-bottom: 10px;
			background-color: #ffffff;
			border-radius: 0px 10px 0px 0px;
		}
		.right_project h2 {
			color: #000000;
			background-color: #dedede;
			margin: 0px auto;
			border-bottom: 1px solid silver;
			width: 100%;
			padding-top: 5px;
			padding-bottom: 5px;
			border-radius: 0px 10px 0px 0px;
			text-align: center;
			border-bottom: none;
			margin-bottom: 15px;
			font-size: 14px;
		}

		.left_project_stats {
			float: left;
			width: 100%;
			border: 1px solid #e2e2e2;
			padding-bottom: 10px;
			background-color: #ffffff;
			color: black;
		}
		.left_project_stats h2 {
			color: #000000;
			background-color: #eaeaea;
			margin: 0px auto;
			border-top: 1px solid #c5c2c2;
			border-bottom: 1px solid #c5c2c2;
			padding-top: 10px;
			padding-bottom: 5px;
			text-align: center;
			margin bottom: 15px;
			font-size: 14px;
		}
		.left_project_stats .row {
			padding-top: 10px;
			margin: 10px auto;
			text-align: center;
		}
		.left_project_stats .value {
			text-align: center;
			display: inline;
			padding-top: 10px;
			font-size: 20px;
		}
		.left_project_stats .item {
			text-align: center;
			padding-top: 10px;
		}
		.left_project_activity {
			float: left;
			width: 100%;
			border: 1px solid #e2e2e2;
			padding-bottom: 10px;
			background-color: #ffffff;
			color: black;
		}
		.left_project_activity h2 {
			color: #000000;
			background-color: #eaeaea;
			margin: 0px auto;
			border-top: 1px solid #c5c2c2;
			border-bottom: 1px solid #c5c2c2;
			width: 100%;
			padding-top: 10px;
			padding-bottom: 5px;
			text-align: center;
			margin-bottom: 15px;
			font-size: 14px;
		}
		.left_project_activity .value {
			text-align: center;
			display: inline;
			padding-top: 10px;
		}
		.left_project_activity .item {
			text-align: center;
			padding-top: 10px;
		}

		/* Event page posts */
		.project_main_box {
			width: 96%;
			border: 1px groove white;
			margin: 8px auto;
			height: 90px;
			box-shadow: 0 8px 6px -6px black;
		}
		.project_date {
			border-right: 1px solid #ababab;
			height: 90px;
			width: 90px;
			display: inline;
			float: left;
		}
		.project_p_title {
			width: 100px;
			margin-top: 17px;
			display: inline;
			font-size: 80%;
			margin-left: 20px;
			float: left;
		}
		.project_p_duetime {
			font-size: 70%;
			margin-top: 3px;
			width: 60px;
			display: inline;
			margin-left: 20px;
			float: left;
		}
		.project_p_timeleft {
			font-size: 70%;
			margin-top: 3px;
			width: 100px;
			display: inline;
			float: left;
		}
		.project_p_emailicon {
			font-size: 80%;
			margin-top: 3px;
			width: 25px;
			display: inline;
			float: left;
		}
		.project_p_shareicon {
			font-size: 80%;
			margin-top: 3px;
			width: 25px;
			display: inline;
			float: left;
		}
		.project_p_statusoption {
			height: 30px;
			width: 25px;
			margin-top: 3px;
			display: inline;
			font-size: 80%;
			float: left;
		}
		.project_p_viewbtn {
			border-right: 1px groove gray;
			width: 60px;
			margin-top: 10px;
			display: inline;
			float: right;
			text-align: center;
			font-size: 200%;
		}
		.p_eventday {
			color: black;
			width: 100%;
			padding: 10px 0px;
			text-align: center;
			font-size: 55px;
			text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15);
			float: left;
			margin-top: -7px;
			display: inline;
		}
		.p_event_month {
			color: black;
			float: left;
			width: 100%;
			text-align: center;
			margin-top: -8px;
			font-size: 70%;
		}

		.project_filter_box {
			width: 100%;
			margin: 8px auto;
			margin-bottom: 40px;
			height: 110px;
		}
		.project_filter_main {
			border: 1px groove gray;
			height: 90px;
		}
		.project_filter_button {
			width: 100%;
			height: 29px;
			cursor: pointer;
			outline: none;
			background-color: #d8d8d8;
			color: #404040;
			border: 1px solid #404040;
			border-top: none;
		}
		.project_ftr_box {
			width: 160px;
			height: 68px;
			margin: 10px;
			margin-left: 20px;
			float: left;
			display: inline;
		}
		.project_title {
			width: 160px;
			height: 20px;
			font-size: 120%;
			color: gray;
		}
		.project_option {
			margin-top: 5px;
		}
		.project_option select {
			width: 100%;
			padding: 2px;
			color: gray;
			outline: none;
		}

		/* Event page posts */
		.project_e_box {
			width: 96%;
			border: 1px groove gray;
			margin: 8px auto;
			height: 45px;
		}
		.event_date {
			border-right: 1px groove gray;
			height: 45px;
			width: 60px;
			background-color: silver;
			display: inline;
			float: left;
		}
		.event_title {
			width: 200px;
			margin-top: 17px;
			display: inline;
			font-size: 80%;
			margin-left: 20px;
			float: left;
		}
		.project_duetime {
			font-size: 70%;
			margin-top: 3px;
			width: 60px;
			display: inline;
			margin-left: 20px;
			float: left;
		}
		.project_timeleft {
			font-size: 70%;
			margin-top: 3px;
			width: 100px;
			display: inline;
			float: left;
		}
		.project_emailicon {
			font-size: 80%;
			margin-top: 3px;
			width: 25px;
			display: inline;
			float: left;
		}
		.project_shareicon {
			font-size: 80%;
			margin-top: 3px;
			width: 25px;
			display: inline;
			float: left;
		}
		.project_statusoption {
			height: 30px;
			width: 25px;
			margin-top: 3px;
			display: inline;
			font-size: 80%;
			float: left;
		}
		.project_viewbtn {
			border-right: 1px groove gray;
			width: 60px;
			margin-top: 10px;
			display: inline;
			float: right;
			text-align: center;
			font-size: 200%;
		}
		.project_delbtn {
			width: 40px;
			margin-top: 5px;
			padding-top: 5px;
			display: inline;
			float: right;
			font-size: 130%;
			border-left: 1px solid silver;
			text-align: center;
			cursor: pointer;
		}
		.eventday {
			color: black;
			width: 100%;
			padding: 10px 0px;
			text-align: center;
			font-size: 130%;
			float: left;
			margin-top: -7px;
			display: inline;
		}
		.event_month {
			color: black;
			float: left;
			width: 100%;
			text-align: center;
			margin-top: -8px;
			font-size: 70%;
		}
		/* Search */

		.product_main {
			width: 96%;
			margin: 5px auto;
			height: 60px;
			border-radius: 2px;
			-webkit-font-smoothing: antialiased;
			-webkit-box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.75);
			-moz-box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.75);
			box-shadow: 0px 0px 3px 0px rgba(50, 50, 50, 0.75);
		}

		.project_c_profile {
			width: 95%;
			float: left;
			font-size: 12px;
			padding-top: 5px;
			padding-left: 5px;
			padding-bottom: 0px;
			height: 50px;
			transform: rotate(0deg);
			overflow: hidden;
			text-align: left;
			color: rgb(97, 97, 97);
		}

		.project_c_profile button {
			background-color: #00609a;
			float: right;
			/* margin-right: 5px; */
			/* display: inline; */
			/* position: relative; */
			/* border: none; */
			outline: none;
			cursor: pointer;
			font-family: Trebuchet MS,'Gill Sans';
			color: white;
			width: 55px;
			padding: 2px 0px;
			border-radius: 5px;
			margin-top: 5px;
			border: 1px groove black;
			-webkit-font-smoothing: antialiased;
			font-size: 12px;
		}

		.project_c_profile img {
			height: 40px;
			left: 9px;
			top: 0px;
			border-radius: 0px;
			width: 40px;
			transform: scaleX(1);
			filter: none;
			float: left;
			display: inline;
		}

		.project_c_profile_title {
			display: block;
			font-size: 14px;
			padding: 3px;
			padding-left: 10px;
			padding-bottom: 5px;
			padding-bottom: none;
			transform: rotate(0deg);
			overflow: hidden;
			text-align: left;
		}

		.project_c_profile_info {
			float: left;
			display: inline;
			font-size: 12px;
			padding-left: 3px;
			padding-bottom: 0px;
			padding-bottom: none;
			transform: rotate(0deg);
			overflow: hidden;
			text-align: left;
			color: rgb(117, 117, 117);
		}

		.project_c_profile_info span {
			padding-left: 5px;
			padding-right: 5px;
		}

		.search_details {
			margin: 10px;
			display: block;
			font-size: 10px;
			padding-left: 3px;
			padding-bottom: 20px;
			transform: rotate(0deg);
			overflow: hidden;
			text-align: right;
			color: rgb(117, 117, 117);
		}

		.search_details span {
			padding-left: 5px;
			padding-right: 5px;
		}

		.search_details .pointer {
			width: 5px;
			padding: 2px;
			border-left: 1px solid grey;
		}

		.right_project input[type=text] {
			width: 90%;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 12px;
			background-color: white;
			background-image: url('../css/PNG/search.png');
			background-size: 18px 18px;
			background-position: right 10px center;
			background-repeat: no-repeat;
			padding: 5px 20px 5px 20px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
			margin: 0px auto;
			margin-left: 5%;
			outline: none;
		}

		.select {
			border: none;
			border-radius: 0px;
			outline: none;
			&:focus, &:active {
				outline: none;
			}
		}

		.selectbtn {
			position: absolute;
			margin-top: -25px;
			right: 0px;
			background-color: white;
		}
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="js/date/jquery.datetimepicker.css"/ >
	<script type="text/javascript" src="js/date/jquery.datetimepicker.full.js"></script>
</head>

<body>
<main>
	<div id="container">
<?php
if (isset($_GET['p'])) {
	$pr_id = mysqli_real_escape_string($connection, $_GET['p']);
	if (ctype_alnum($pr_id)) {
 	//check user exists

	$getposts = mysqli_query($connection, "SELECT * FROM projects WHERE project_id='$pr_id'") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getposts)) 
		{
					$project_id = $row['project_id'];
		            $project_name = $row['project_name'];
		            $project_date = $row['project_duedate'];
		          	$fduedate = date("d",$project_date);
            		$fduemonth = date("M Y",$project_date);
            		$new_duetime = date("H:i",$project_date);
            		$post_time = $row['post_time'];
            		$Posted_time = time_passed($post_time);
            		$Posted_by = $row['posted_by'];
            		            getdate($project_date);
            $seconds =$project_date - time();
            $days = floor($seconds / 86400);
            $seconds %= 86400;
            $hours = floor($seconds / 3600);
            $seconds %= 3600;
            $minutes = floor($seconds / 60);
            $seconds %= 60; 
            if ($minutes >= 1 && $hours < 1 && $days < 1 ){
                    $left_time = 'Due tomorrow';
                } else if ($hours >= 1 && $days < 1 ){
                    $left_time = 'Due tomorrow';
                } else if ($days >= 1){
                    $left_time = $days == 1 ? $days . ' Day left' : $days . ' Days left';
                } else if ($days == '-1'){
                    $left_time = 'Due today';
                } else if ($days < '-1'){
                    $left_time = '<span class="red">OVERDUE</span>';
                }
		           
            	}
           //get userid from users
          $getowner = mysqli_query($connection, "SELECT * FROM users WHERE id='$u_id'") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getowner))
		{
			$u_id = $row["id"];
			$f_name = $row["first_name"];
			$l_name = $row["last_name"];
			$username = $row["username"];
		} }
		?>
		
<div class="left_container_project">
		<?php
	//This code is for timestamp,
	$timestamp ='';
	$timestamp=(int)$timestamp; 
	$current_time=time();
	$date_added=date("d-M-y");
	$time_added=$current_time - $timestamp;

	?>
	<aside class="left_project">
			<h2> Add new task</h2>
			<input type="hidden" id="userid" name="suserid" value="<?php echo $u_id ?>"/>
			<input type="hidden" id="time_added" name="time_added" value="<?php echo $time_added ?>"/>
			<input type="hidden" id="projectid" name="project" value="<?php echo $project_id ?>"/>

	<div class="fieldrow">
			 <label class="fieldtitle"  for="bday">Title:</label>
			<input type="text" maxlength="19" id="title_name" name="ptitle" required="required" class="fieldinput" placeholder="Title"/>
		</div>
				<div class="fieldrow">
			 <label class="fieldtitle" for="bday">Date:</label>
	        <input type="text" name="sdate" class="dab" Placeholder="Due date" required="required" id="datetimepicker"/>
				</div>

		 	<div class="fieldrow">
		 		<label class="fieldtitle" for="bday">Colour: </label>
		 		<div class="colour_container">
				<label class="orange_op">
				  <input type="radio" name="pcolor"  value="1">
				  <div class="button"><span></span></div>
				</label>

				<label class="indigo_op">
				  <input type="radio" name="pcolor" value="2">
				  <div class="button"><span></span></div>
				</label>

				<label class="amber_op">
				  <input type="radio" name="pcolor" value="3">
				  <div class="layer"></div>
				  <div class="button"><span></span></div>
				</label>

				<label class="lime_op">
				  <input type="radio" name="pcolor" value="4">
				  <div class="layer"></div>
				  <div class="button"><span></span></div>
				</label>

				<label class="blue_op">
				  <input type="radio" name="pcolor" value="5">
				  <div class="layer"></div>
				  <div class="button"><span></span></div>
				</label>

				<label class="black_op">
				  <input type="radio" name="pcolor" value="6">
				  <div class="layer"></div>
				  <div class="button"><span></span></div>
				</label>
			</div>
		</div>
		 <div class="fieldrow">
		  <label class="fieldtitle" for="bday">Info:</label>
		<textarea class="sinfo" name="sdetails" id="t_details" placeholder="Details"></textarea>
	</div>
		 
			 <button type="submit" onclick="set_task()" class="ssubmit"><span class="icon-compass"></span>  Add  </button>
		 </aside>
	<div class="left_project_stats">
		<h2>Stats</h2>
		<div class="row">
			<span class="value"> 14 </span><span class="item">Projects</span><br/>
		</div>
		<div class="row">
			<span class="value"> 0 </span><span class="item">Tasks</span>
		</div>
	</div>
	<div class="left_project_activity" id="activity_list">
		<h2>Latest Activity</h2>
		<?php
		require_once 'shorts/latest_activity.php'; 
			?>
	</div>
</div>
<!-- The center goes here -->
	<div class="project_centre" id="task_list">

		
        <h2>Project</h2>

		<div class="project_main_box">
          <div class="project_date">
          	<div class='p_eventday'><?php echo $fduedate;?></div>
          	<div class='p_event_month'><?php echo $fduemonth; ?></div>
          </div>
          <div class="project_p_title">
            <?php echo $project_name ?>
          </div>
          <div class="project_p_duetime">
            <span class="icon-clock"></span><?php echo" ".$new_duetime ?>
          </div>
          <div class="project_p_timeleft">
            <span class="icon-hour-glass"></span><?php echo " ".$left_time ?>
          </div>
         <div class="project_p_statusoption">
            <span class="icon-star-full"></span>
        </div>
          <div class="project_p_emailicon">
            <span class="icon-bubble"></span>
          </div>
          <div class="project_p_shareicon">
            <span class="icon-users"></span>
          </div>
          <div class="event_delbtn">
            <span onclick="Delete_project(<?php echo $project_id; ?>)" class="icon-bin"></span>
          </div>
        </div>


        <h2>Tasks</h2>
        <?php
$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' AND project_id='$project_id' ORDER BY duedate ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) 
{
            $id = $row['id'];
            $title = $row['title'];
            $type = $row['type'];
            $duedate = $row['duedate'];
            $duetime = $row['duetime'];
            $details = $row['details'];
            $status = $row['status'];
            $accessor = $row['accessor'];
            $color = $row['color'];
            date_default_timezone_set('Europe/London');
            $time_passed= time_passed($row['posttime']);
            $fduedate = date("d",$duedate);
            $fduemonth = date("M Y",$duedate);
            $new_duetime = date("H:i",$duedate);

            // colour s
            if($color == 1){
              $color = 'orange_event';
            } else if($color == 2){
              $color = 'pink_event';
            } else if($color == 3){
              $color = 'yellow_event';
            } else if($color == 4){
              $color = 'green_event';
            }  else if($color == 5){
              $color = 'blue_event';
            }  else if($color == 6){
              $color = 'black_event';
            }  else {
              $color = 'black_event';
            }



            //get time left

            getdate($duedate);
            $seconds =$duedate - time();
            $days = floor($seconds / 86400);
            $seconds %= 86400;
            $hours = floor($seconds / 3600);
            $seconds %= 3600;
            $minutes = floor($seconds / 60);
            $seconds %= 60; 

      //end time left
      //test for todays date
      $todaydate = date("d/m/Y");
      $timestamp ='';
      $timestamp=(int)$timestamp; 
      $current_time=time();
      $todaysdate=$current_time - $timestamp;
      //tomorrow date
        $tomorrowdate = strtotime('+1 day', $todaysdate);
        $ftomorrowdate = date("d/m/Y",$tomorrowdate);



        if($status == 1){
        $sfstatus = 'Not Started';
      } else if ($status == 2){
        $sfstatus = 'In progress';
      } else if ($status == 3){
        $sfstatus = 'Completed';
      } else if($status == 4){
        $sfstatus = 'Cancelled';
      }
?>


		<div class="project_e_box">
          <div class="event_date" id="<?php echo $color ?>">
          	<div class='eventday'><?php echo $fduedate;?></div>
          	<div class='event_month'><?php echo $fduemonth; ?></div>
          </div>
          <div class="event_title">
            <?php echo $title ?>
          </div>
          <div class="project_duetime">
            <span class="icon-clock"></span><?php echo" ".$new_duetime ?>
          </div>
          <div class="project_timeleft">
            <span class="icon-hour-glass"></span><?php echo " ".$left_time ?>
          </div>
          <div class="project_delbtn">
            <span class="icon-paste" onclick="location.href='event.php?u=<?php echo $id ?>'"></span>
          </div>
        </div>






 <?php }
      ?>








	</div>

	<div class="right_project">
		<h2>Add members</h2>
		<div id="user_project">
			<div class="input-group">
				<input type="text" name="search_text" id="search_text" placeholder="Search by username" class="form-control" />
			<div class="search_details">
				<span>10 Comments</span>
				<span class="pointer"></span>
				<span>Shared with 0 people</span>
			</div>
		</div>
		<div id="result"></div>
		<div style="clear:both"></div>
	</div>

	</div>
		
		<?php

	}	
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
	exit();
	}

?>
<script>
function Delete_project(id) {
    if (confirm("Are you sure you want to delete this Event?") == true)
        window.location = "delevent.php?u=" + id;
    return false;
}

jQuery('#datetimepicker').datetimepicker({
    step: 10,
    timepicker: true,
    formatDate: 'd/m/Y',
    minDate: '01/10/2017',
    maxDate: '10/03/2040'
});

function set_task() {
    if ($('#title_name').val().length == 0) {
        alert("Please enter the title.");
    } else if ($('#datetimepicker').val().length == 0) {
        alert("Please enter the date.");
    } else {
        $.post('ajax/new_task.php', {
            taskname: $('#title_name').val(),
            taskdate: $('#datetimepicker').val(),
            userid: $('#userid').val(),
            t_colour: $('input[name=pcolor]:checked').val(),
            t_details: $('#t_details').val(),
            projectid: $('#projectid').val()
        },
            function (data) {
                $('#title_name').val('');
                $('#datetimepicker').val('');
                $('#t_details').val('');
                if (data == 'success') {
                    $("#task_list").load(" #task_list > *");
                    $("#activity_list").load(" #activity_list > *");
                } else {
                    alert('Error passing the values.');
                }
            });
    }
}

// Add users to the project.
function share() {
    if ($('#share_with').val().length == 0) {
        alert("Please enter the username.");
    } else {
        $.post('ajax/adduser.php', {
            share_with: $('#share_with').val(),
            userid: $('#myuserid').val(),
            projectid: $('#projectid').val()
        },
            function (data) {
                $('#share_with').val('');
                if (data == 'success') {
                    $("#activity_list").load(" #activity_list > *");
                    alert("success");
                } else {
                    alert('Error passing the values.');
                }
            });
    }
}

// Search
function update_profile(id) {
    // Secure PHP
    var usermyid = '<?php $u_id ?>';
    var projectid = '<?php $project_id ?>';

    // Pass values
    $.post('ajax/update2/adduser.php', {
        share_with: id,
        project_id: projectid,
        usermy_id: usermyid
    },
        function (data) {
            if (data == 'success') {
                $('#search_text').val('');
                load_data();

                function load_data(query) {
                    $.ajax({
                        url: "fetch/search_member.php",
                        method: "post",
                        data: { query: query, projectid: projectid },
                        success: function (data) {
                            $('#result').html(data);
                        }
                    });
                }
            } else if (data == 'youowner') {
                alert('User already has access to the project.');
            } else {
                alert('Error passing the values.');
            }
        });

}

$(document).ready(function () {
    load_data();

    function load_data(query) {
        var projectid = '<?= $project_id ?>';
        $.ajax({
            url: "fetch/search_member.php",
            method: "post",
            data: { query: query, projectid: projectid },
            success: function (data) {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });
});

function share() {
    if ($('#share_with').val().length == 0) {
        alert("Please enter the username.");
    } else {
        $.post('ajax/adduser.php', {
            share_with: $('#share_with').val(),
            userid: $('#myuserid').val(),
            projectid: $('#projectid').val()
        },
            function (data) {
                $('#share_with').val('');
                if (data == 'success') {
                    $("#activity_list").load(" #activity_list > *");
                    alert("success");
                } else {
                    alert('Error passing the values.');
                }
            });
    }
}
</script>

</div>
</main>
</body>
</html>