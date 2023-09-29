<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php'; 
if(isset($_GET['u'])) {
	$ev_id = mysqli_real_escape_string($connection, $_GET['u']);
	if (ctype_alnum($ev_id)) {
 	//check user exists

		$check = mysqli_query($connection, "SELECT * FROM posts WHERE id='$ev_id'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$ev_id = $get['id'];
	$ev_title = $get['title'];
	$ev_type = $get['type'];
	$ev_userid = $get['userid'];
	$ev_time = $get['duetime'];
	$ev_date = $get['duedate'];
	$ev_type = $get['type'];
	if($ev_type == 1){
	$evs_type = 'Assignment';
} else if ($ev_type == 2){
	$evs_type = 'Appointment';
} else if ($ev_type == 3){
	$evs_type = 'Homework';
} else if($ev_type == 4){
	$evs_type = 'others';
}
		if ($ev_userid == $u_id){
			$sql = "DELETE FROM posts WHERE id =$ev_id";
if ($connection->query($sql) === TRUE) {
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=allevents.php\">";
	exit();
} else {
    echo "Error deleting record: " . $connection->error;
}
		} else {
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
		}
}}}		

?>