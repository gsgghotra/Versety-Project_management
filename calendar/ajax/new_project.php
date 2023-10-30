<?php
require_once "../../database/connection.php";
$projectname = $_POST['projectname'];
$projectdate = $_POST['projectdate'];
$userid = $_POST['userid'];

	//This code is for timestamp,
	$timestamp ='';
	$timestamp=(int)$timestamp; 
	$current_time=time();
	$date_added=date("d-M-y");
	$time_added=$current_time - $timestamp;

if ($projectname != ''){
		if ($projectdate != ''){
			$pro_date = strtotime($projectdate);
	$pro_query = "INSERT INTO `projects` (`project_name`,`project_duedate`,`project_createdby`,`post_time`) VALUES 
										 ('$projectname','$pro_date','$userid','$time_added')";
	 $final_result = mysqli_query($connection, $pro_query);
	 if (!$final_result) {
				           echo 'Query Failed ';
				    } else {
						echo "success";
				    	// $last_id = mysqli_insert_id($connection);
						// 	$activity_query = "INSERT INTO `latest_activity` (`user_id`,`project_id`,`posttime`,`ref`) VALUES ('$userid','$last_id','$time_added','890')";
						// 	$activity_result = mysqli_query($connection, $activity_query);
						// 	if (!$activity_result) {
						// 		echo "Query Failed";
						// 	} else {
						// 		echo "success";
						// 	}
						}
	}
			
		}

?>