<?php
require_once "../../../connection.php";
$n_avatar = $_POST['share_with'];
$project = $_POST['project_id'];
$myid = $_POST['usermy_id'];

//User details
$check = mysqli_query($connection, "SELECT * FROM users WHERE username='$n_avatar'");
if (mysqli_num_rows($check)===1) {
$get = mysqli_fetch_assoc($check);
$userid = $get['id'];
$username = $get['username'];


		//Project details
		$checkproject = mysqli_query($connection, "SELECT * FROM projects WHERE project_id='$project'");
		if (mysqli_num_rows($checkproject)===1) {
		$get = mysqli_fetch_assoc($checkproject);
		$user_id = $get['user_id'];
		}
		// Filter alrady ecxisted users ijn project.
		$check_users = mysqli_query($connection, "SELECT * FROM project_shared WHERE project_id='$project'");
		$allsharedwith = mysqli_num_rows($check_users);
		while ($row = mysqli_fetch_assoc($check_users)) 
		{
			$listed_users = $row['share_with'];
			$listed_by = $row['shared_by'];

			//FIlter if user exists in loop
			if ($listed_users == $userid) {
				echo "Already_exists";
				exit();
			}

		}



	if ($userid == $myid) {
		echo "youowner";
		} else {
			$stmt = $connection->prepare("INSERT INTO project_shared (project_id, share_with, shared_by) VALUES (?, ?, ?)");
			$stmt->bind_param("iii", $add_project_id, $add_user, $shared_by);

			    // insert a row
			    $add_project_id = $project;
			    $add_user = $userid;
			    $shared_by = $myid;
			    $stmt->execute();

			echo "success";

			$stmt->close();
			$connection->close();
		}

}

?>