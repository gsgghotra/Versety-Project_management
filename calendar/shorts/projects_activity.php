<?php
$getactivity = mysqli_query($connection, "SELECT * FROM latest_activity WHERE user_id='$u_id' AND event_id='0' ORDER BY posttime DESC LIMIT 5") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getactivity)) 
{
			$activity_id = $row['activity_id'];
            $activity_uid = $row['user_id'];
            $activity_project_id = $row['project_id'];
            $activity_event_id = $row['event_id'];
            $activity_time = $row['posttime'];
            $activity_ref = $row['ref'];
            $Posted_time = time_passed($activity_time);

           //get userid from users
          $getowner = mysqli_query($connection, "SELECT * FROM users WHERE id='$activity_uid'") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getowner))
		{
			$user_fname = $row["first_name"];
			$user_lname = $row["last_name"];
			$username = $row["username"];
		}

		$getproject = mysqli_query($connection, "SELECT * FROM projects WHERE project_id='$activity_project_id'") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getproject)) 
		{
					$project_id = $row['project_id'];
		            $project_name = $row['project_name'];
		        }



            $avatar_pic = 'img/avatar/main.png';
            if ($activity_ref =='890') {
            	$activity_title = $user_fname." ".$user_lname." Created new project - ".$project_name;
            } else if ($activity_ref =='614') {
            	$activity_title = $user_fname." ".$user_lname." added new task - ".$event_title;
            } ?>
           <table id="onlineusers" class="activity_box">
			<tbody>
			  <tr>
			<td width="41" align="center"> <img width="40" height="40" alt="avatar" src="<?php echo $avatar_pic; ?>"></td>
		      <td width="100%">
			  <div class="onuserbox">
			  	 <p class="activity_time"><?php echo $Posted_time; ?></p>
			  <a href="profile.php"><?php echo $activity_title; ?></a>
			 
			</div>
			</td></tr>
		</tbody>
	</table>
<?php
}

?>