<?php
	//This code is for timestamp,
	$timestamp ='';
	$timestamp=(int)$timestamp; 
	$current_time=time();
	$date_added=date("d-M-y");
	$time_added=$current_time - $timestamp;

require_once "../aps/connect_i.php";
$taskname = $_POST['taskname'];
$duedate = $_POST['taskdate'];
$userid = $_POST['userid'];
   

    if (empty($_POST['t_colour'])) { 
        $colour = '6'; 
    } else {
        $colour = $_POST['t_colour'];
    }

$details = $_POST['t_details'];
$sstatus = 1;
if (isset($_POST['projectid'])){
	if (empty($_POST['projectid'])) {
		$projectid = "";
	} else {
		$projectid = $_POST['projectid'];
	}
}
if ($taskname != ''){
		if ($duedate != ''){
			$pro_date = strtotime($duedate);
	$pro_query = "INSERT INTO `posts` ( `title`, `duedate`, `details`, `userid`, `posttime`,`status`,`color`,`project_id`) VALUES ( '$taskname','$pro_date', '$details', '$userid', '$time_added','$sstatus','$colour','$projectid')";
	 $final_result = mysqli_query($connection, $pro_query);
	 if (!$final_result) {
				           echo 'Query Failed ';
				    } else { 
				    		$last_id = mysqli_insert_id($connection);
							$activity_query = "INSERT INTO `latest_activity` (`user_id`,`project_id`,`event_id`,`posttime`,`ref`) VALUES ('$userid','$projectid','$last_id','$time_added','614')";
							$activity_result = mysqli_query($connection, $activity_query);
							if (!$activity_result) {
								echo "Query Failed";
							} else {
								echo "success";
							}
						}
	}
			
		}

?>