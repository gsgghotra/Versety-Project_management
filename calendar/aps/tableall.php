<?php require_once 'aps/init.php';
protect_page(); 
?>
<div id="eventcontainer">
	<table style="width:100%">
  <tr>
    <th class="tablenam">Due date</th>
    <th class="tablenam">Time Left</th>
    <th class="tablenam">Title</th>
    <th class="tablenam">Status</th>
    <th class="tablenam">Added time</th>
    <th class="tablenam">More</th>
  </tr>
  </table>
  </div>
<?php


$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' ORDER BY duedate ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$title = $row['title'];	
						$type = $row['type'];	
						$duedate = $row['duedate'];
						$duetime = $row['duetime'];
						$details = $row['details'];
						$status = $row['status'];

$time_passed= time_passed($row['posttime']);
$fduedate = date("d/m/Y",$duedate);


//get time left

getdate($duedate);
$seconds =$duedate - time();
$days = floor($seconds / 86400);
$seconds %= 86400;
$hours = floor($seconds / 3600);
$seconds %= 3600;
$minutes = floor($seconds / 60);
$seconds %= 60;

	if ($minutes >= 1 && $hours < 1 && $days < 1 ){
        $left_time = $minutes == 1 ? $minutes . ' Minute left' : $minutes . ' Minutes left';
    } else if ($hours >= 1 && $days < 1 ){
        $left_time = '1 Day left';
    } else if ($days >= 1){
        $left_time = $days == 1 ? $days . ' Day left' : $days . ' Days left';
    } else if ($days == '-1'){
        $left_time = 'Due today';
    } else if ($days < '-1'){
        $left_time = '<span class="red">OVERDUE</span>';
    }
//end time left
//test for todays date
$todaydate = date("d/m/Y");
$todaysdate=$current_time - $timestamp;
//tomorrow date
  $tomorrowdate = strtotime('+1 day', $todaysdate);
  $ftomorrowdate = date("d/m/Y",$tomorrowdate);

?>
<div id="eventcontainer">

	<table style="width:100%">

  <tr>
    <?php //today or tomorrow
	if ($todaydate == $fduedate){
	echo '<td class="tablenam"><b>'.$duetime.'</b></td>';
} else if ($fduedate == $ftomorrowdate){
	echo '<td class="tablenam">Tomorrow</td>';
} else if($duedate < $todaysdate){
	echo  '<td class="tablenam">' .$fduedate.' </td>';
}else if($duedate > $todaysdate){
	echo '<td class="tablenam">'.$fduedate.'</td>';
}
	?>
    <td class="tablenam"><?php echo $left_time; ?></td>
    <td class="tablenam"><?php echo $title; ?></td>
    <td class="tablenam">
	


	<?php 
	$setstatus = @$_POST['sstatus'.$id];
	if($status == 1){
	$sfstatus = 'Not Started';
} else if ($status == 2){
	$sfstatus = 'In progress';
} else if ($status == 3){
	$sfstatus = 'Completed';
} else if($status == 4){
	$sfstatus = 'Cancelled';
}

if($setstatus!=""){
	mysqli_query($connection, "UPDATE posts SET status=('$setstatus') WHERE id ='$id'");
	
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=allevents.php\">";
}
?>	

<div class="dropdown">
<button onclick="myFunction(<?php echo $id ?>)" id='like_<?php echo $id?>' class="dropbtn"><?php echo $sfstatus ?></button>

  <div id="myDropdown<?php echo $id ?>" class="dropdown-content">
   <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply<?php echo $id?>" name="sstatus<?php echo $id?>" value="1">
<input type="hidden" id="postid<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add(<?php echo $id?>)' class="btn_gray">Not started</button>
 <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply2<?php echo $id?>" name="sstatus<?php echo $id?>" value="2">
<input type="hidden" id="postid2<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add2(<?php echo $id?>)' class="btn_orange">In progress</button>
 <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply3<?php echo $id?>" name="sstatus<?php echo $id?>" value="3">
<input type="hidden" id="postid3<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add3(<?php echo $id?>)' class="btn_green">Completed</button>
<!--- IN DEVELOPMENT E-->
<input type="hidden" id="reply4<?php echo $id?>" name="sstatus<?php echo $id?>" value="4">
<input type="hidden" id="postid4<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add4(<?php echo $id?>)' class="btn_red">Cancelled</button>
  </div>
</div>

</td>
    <td class="tablenam"><?php echo $time_passed ?></td>
    <td class="tablenam">                
	<span class="icon-eye" onclick="location.href='event.php?u=<?php echo $id?>'"></span>
	<span class="icon-pencil" onclick="location.href='editevent.php?u=<?php echo $id?>'"></span>
	<span class="icon-bin2"  onclick='return Deleteqry(<?php echo $id ?>);'></span>
	</td>
  </tr>
</table>
</div>	
	
<?php } 

?>
</div>