<?php
require_once "../aps/connect_i.php";
$eventid = $_POST['postid'];
$eventvalue = $_POST['reply'];
if ($eventvalue ==''){
	echo 'The connection is weak please Refresh the page.';
}else{
//add comment

	mysqli_query($connection, "UPDATE posts SET status=('$eventvalue') WHERE id ='$eventid'");	
		echo 'success';

}
?>