<?php
require_once "../../database/connection.php";
$eventid = $_POST['postid'];
$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE id='$eventid'") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$status = $row['status'];
}
if($status == 1){
	$sstatus = 'Not Started';
} else if ($status == 2){
	$sstatus = 'In progress';
} else if ($status == 3){
	$sstatus = 'Completed';
} else if($status == 4){
	$sstatus = 'Cancelled';
}
echo $sstatus;
?>
