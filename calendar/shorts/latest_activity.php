<?php
$getactivity = mysqli_query($connection, "SELECT * FROM latest_activity WHERE user_id='$u_id' AND project_id='$project_id' ORDER BY posttime DESC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getactivity)) 
{
			$activity_id = $row['activity_id'];
            $activity_uid = $row['user_id'];
            $activity_project_id = $row['project_id'];
            $activity_event_id = $row['event_id'];
            $activity_time = $row['posttime'];
            $activity_ref = $row['ref'];
            $Posted_time = time_passed($activity_time);

            if ($activity_event_id != '0') {
            	 $getposts = mysqli_query($connection, "SELECT * FROM posts WHERE id ='$activity_event_id'") or die(mysqli_error($connection));
				while ($row = mysqli_fetch_assoc($getposts)) 
				{
	            	$event_title = $row['title'];
	        	}
            }
           //get userid from users
          $getowner = mysqli_query($connection, "SELECT * FROM users WHERE id='$activity_uid'") or die(mysqli_error($connection));
		while ($row = mysqli_fetch_assoc($getowner))
		{
			$user_fname = $row["first_name"];
			$user_lname = $row["last_name"];
			$username = $row["username"];
		}



            $avatar_pic = 'img/avatar/main.png';
            if ($activity_ref =='890') {
            	$activity_title = $user_fname." ".$user_lname." Created this project.";
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
			  <a href="#"><?php echo $activity_title; ?></a>
			 
			</div>
			</td></tr>
		</tbody>
	</table>
<?php
}

?>