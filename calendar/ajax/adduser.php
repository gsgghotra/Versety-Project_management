<?php
require_once "../aps/connect_i.php";

$sharewith = $_POST['share_with'];
$userid = $_POST['userid'];
$project_id = $_POST['projectid'];


	//This code is for timestamp,
	$timestamp ='';
	$timestamp=(int)$timestamp; 
	$current_time=time();
	$date_added=date("d-M-y");
	$time_added=$current_time - $timestamp;

if ($sharewith != ''){
	           //get userid from users
          $getowner = mysqli_query($connection, "SELECT * FROM users WHERE username='singh'") or die(mysqli_error($connection));
          $countusers = $getowner->num_rows;
          if ($countusers == 1) {
	          	while ($row = mysqli_fetch_assoc($getowner))
			{
				$user_db_id = $row["id"];
			}
				$final_share = "UPDATE projects SET user_id=CONCAT(user_id,',5') WHERE project_id ='$project_id'";
				 $final_result = mysqli_query($connection, $final_share);
				 if (!$final_result) {
				 	echo "failed";
						} else {
								echo "success";
						}
	      
	          } else {
	          	echo "No user Found";
	          }
}
?>