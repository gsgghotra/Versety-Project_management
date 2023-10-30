<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
	.left_container_project{
	float: left;
    width: 20%;
    height: 100%;
    position: fixed;
    border: 1px solid #e2e2e2;
    padding-bottom: 10px;
    background-color: #efefef;
    border-radius: 10px 0px 0px 0px;
    -webkit-box-shadow: 10px 0 5px -2px #888;
    box-shadow: 10px 0 5px -2px #888;
}
.left_project{
    width: 100%;
    padding-bottom: 10px;
    background-color: #efefef;
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
    text-align: center;
    border-bottom: none;
    margin-bottom: 10px;
    font-size: 14px;
    box-shadow: 0px 1px 0px #9a9a9a;

	}
.project_centre{
	color: black;
	float: left;
    width: 50%;
    height: 100%;
    border: 1px solid #e2e2e2;
    padding-bottom: 10px;
    background-color: #efefef;
    margin-left: 26%;
}
.project_centre h2{
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
.right_project{
	float: left;
    width: 23%;
    padding-bottom: 10px;
    background-color: #efefef;
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

	.left_project_stats{
	float: left;
    width: 100%;
    padding-bottom: 10px;
    background-color: #efefef;
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
    margin-bottom: 15px;
    font-size: 14px;

	}
	.left_project_stats .row{
		padding-top: 5 px;
		margin:10px auto;
		text-align: center;
	}
	.left_project_stats .value {
		text-align: center;
		display: inline;
		padding-top:10px;
		font-size: 18px;
	}
	.left_project_stats .item {
		text-align: center;
		padding-top:10px;
	
}

	.left_project_activity{
	float: left;
    width: 100%;
    padding-bottom: 10px;
    background-color: #efefef;
    color: black;
}
.view_activity_button{
		width: 20%;
    padding: 5px;
    display: inline;
    border: 1px solid silver;
    position: absolute;
    margin-left: 15%;
    margin-top: -7px;
    border-radius: 3px;
    cursor: pointer;
    background: #025290;
    color: white;
    box-shadow: 0 0 1px 0px black;
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
    text-align: center;    margin-bottom: 15px;
    font-size: 14px;

	}
	.left_project_activity .value {
		text-align: center;
		display: inline;
		padding-top:10px;
	}
	.left_project_activity .item {
		text-align: center;
		padding-top:10px;
	}
/* Event page posts*/

	.project_e_box{
		width: 96%;
		border:1px groove gray;
		margin:8px auto;
		height:45px;
	}
	.event_date{
		border-right:1px groove gray;
		height:45px;
		width:60px;
		background-color: silver;
		display: inline;
		float: left;
	}
	.event_title{
		width: 100px;
	    margin-top: 17px;
	    display: inline;
	    font-size: 80%;
	    margin-left: 20px;
	    float: left;
	}
	.project_duetime{
		font-size: 70%;
		margin-top: 3px;
		width:60px;
		display: inline;
		margin-left:20px;
		float: left;
	}
	.project_timeleft{
	    font-size: 70%;
	    margin-top: 3px;
	    width: 100px;
	    display: inline;
	    /* margin-left: 60px; */
	    float: left;
	}
	.project_emailicon{
	    font-size: 80%;
	    margin-top: 3px;
	    width: 25px;
	    display: inline;
	    /* margin-left: 60px; */
	    float: left;
	}
	.project_shareicon{
	    font-size: 80%;
	    margin-top: 3px;
	    width: 25px;
	    display: inline;
	    /* margin-left: 60px; */
	    float: left;
	}
	.project_statusoption{
		height:30px;
		width: 25px;
		margin-top: 3px;
		display: inline;
		font-size: 80%;
		float: left;
	}
	.project_viewbtn{
		border-right:1px groove gray;
		width:60px;
		margin-top: 10px;
		display: inline;
		float: right;
		text-align: center;
		font-size: 200%;
	}
	.project_delbtn{
		width:40px;
		margin-top: 5px;
		padding-top: 5px;
		display: inline;
		float: right;
		font-size: 130%;
		border-left: 1px solid silver;
		text-align: center;
		cursor: pointer;
	}
	.eventday{
		color: black;
	    width: 100%;
	    padding: 10px 0px;
	    text-align: center;
	    font-size: 130%;
	    float: left;
	    margin-top: -7px;
	    display: inline;

		}
	.event_month{
		color: black;
	    /* padding: 10px; */
	    float: left;
	    width: 100%;
	    text-align: center;
	    margin-top: -8px;
	    font-size: 70%;
	}



	.project_filter_box{
		width: 100%;
		margin:8px auto;
		margin-bottom: 40px;
		height:110px;
	}
	.project_filter_main{
		border:1px groove gray;
		height: 90px;
	}
	.project_filter_button{
		width: 100%;
		height: 29px;
		cursor: pointer;
		outline: none;
		background-color: #d8d8d8;
		color:#404040;
		border:1px solid #404040;
		
		border-top:none;
	}
	.project_ftr_box{
		width: 160px;
		height: 68px;
		margin: 10px;
		margin-left: 20px;
		float: left;
		display: inline;
	}
	.project_title{
		width: 160px;
		height: 20px;
		font-size: 80%;
		color: gray;
	}
	.project_option{
		margin-top: 5px;
	}
	.project_option select{
		width: 100%;
		padding: 2px;
		color: gray;
		outline: none;
	}


	#project_container{
		width: 100%;
    	margin: 30px auto;
    	min-height: 100%;
	}
	

</style>
    <script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="js/date/jquery.datetimepicker.css"/ >
<script type="text/javascript" src="js/date/jquery.datetimepicker.full.js"></script>
</head>
<body>
<main>
<div id="project_container">
	<?php
	//This code is for timestamp,
	$timestamp ='';
	$timestamp=(int)$timestamp; 
	$current_time=time();
	$date_added=date("d-M-y");
	$time_added=$current_time - $timestamp;
	$countu = "SELECT * FROM projects WHERE project_createdby='$u_id'";
												$resultuser = mysqli_query($connection, $countu);
												$resultu = $resultuser->num_rows;
	$count_task = "SELECT * FROM posts WHERE userid='$u_id'";
												$resulttask = mysqli_query($connection, $count_task);
												$result_task = $resulttask->num_rows;

	?>
<div class="left_container_project">
	<aside class="left_project">
			<h2> Create new project</h2>
			<input type="hidden" id="userid" name="suserid" value="<?php echo $u_id ?>"/>

	<div class="fieldrow">
			 <label class="fieldtitle"  for="bday">Title:</label>
			<input type="text" maxlength="19" id="p_name" name="ptitle" required="required" class="fieldinput" placeholder="Title"/>
		</div>
				<div class="fieldrow">
			 <label class="fieldtitle" for="bday">Date:</label>
	        <input type="text" name="sdate" class="dab" Placeholder="Due date" required="required" id="datetimepicker"/>
				</div>
			<div class="fieldrow">
		<label class="fieldtitle" for="bday">Type:</label>
		 <select  name="stype" class="swtype" required="required" >
			<option value="1">Assignment</option>
			<option value="2">Appointment</option>
			<option value="3">Homework</option>
			<option value="4">Others</option>
			</select>
		</div>

		 
			 <button type="submit" onclick="log_auth()" class="ssubmit"><span class="icon-compass"></span>  Add  </button>
		 </aside>
	<div class="left_project_stats">
		<h2>Stats</h2>
		<div class="row">
			<span class="value"> <?php echo $resultu ?> </span><span class="item">Projects, </span>
			<span class="value"> <?php echo $result_task ?> </span><span class="item">Tasks</span>
		</div>
	</div>
	<div class="left_project_activity" id="activity_list">
		<h2>Latest Activity<button class="view_activity_button">View all</button></h2>
		<div>
			<?php require_once 'shorts/projects_activity.php'; ?>
		</div>
	</div>
</div>

	<div class="project_centre" id="project_list">
		
		
        <h2>My projects</h2>
		<?php

		$getposts = mysqli_query($connection, "SELECT * FROM projects WHERE project_createdby='$u_id' ORDER BY project_duedate ASC") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getposts)) 
		{
					$project_id = $row['project_id'];
		            $project_name = $row['project_name'];
		            $project_date = $row['project_duedate'];
		          	$fduedate = date("d",$project_date);
            		$fduemonth = date("M Y",$project_date);
            		$new_duetime = date("H:i",$project_date);

            		//get time left

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
		           ?>




		<div class="project_e_box">
          <div class="event_date" id="black_event">
          	<div class='eventday'><?php echo $fduedate;?></div>
          	<div class='event_month'><?php echo $fduemonth; ?></div>
          </div>
          <div class="event_title">
            <?php echo $project_name ?>
          </div>
          <div class="project_duetime">
            <span class="icon-clock"></span><?php echo" ".$new_duetime ?>
          </div>
          <div class="project_timeleft">
            <span class="icon-hour-glass"></span><?php echo " ".$left_time ?>
          </div>
         <div class="project_statusoption">
            <span class="icon-star-full"></span>
        </div>
          <div class="project_emailicon">
            <span class="icon-bubble"></span>
          </div>
          <div class="project_shareicon">
            <span class="icon-users"></span>
          </div>
          <div class="project_delbtn">
            <span class="icon-paste" onclick="location.href='project.php?p=<?php echo $project_id ?>'"></span>
          </div>
        </div>




<?php } ?>







	</div>
	<div class="right_project">
		<h2>Notification</h2>

	</div>

	</div>

	</main>
<script type="text/javascript">
jQuery('#datetimepicker').datetimepicker({
	step:10,
    timepicker: true,
    formatDate:'d/m/Y',
 minDate:'01/10/2017',//yesterday is minimum date(for today use 0 or -1970/01/01)
 maxDate:'10/03/2025'
});

function log_auth(){
	if($('#p_name').val().length == 0){
		alert("Please enter the title.");
	} else if($('#datetimepicker').val().length == 0){
		alert("Please enter the date.");
	} else {
		$.post('ajax/new_project.php',
					{projectname: $('#p_name').val(), projectdate: $('#datetimepicker').val(), userid: $('#userid').val()},
					 function(data){
							 $('#p_name').val('');
							 $('#datetimepicker').val('');
					if (data =='success'){
						$("#project_list").load(" #project_list > *");
						$("#activity_list").load(" #activity_list > *");
					} else {
						console.log('Error passing the values.');
						console.log(data);
					}
					});
	}
	}


	
</script>
</body>
