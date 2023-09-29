<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php'; 
if(isset($_GET['u'])) {
	$ev_id = mysqli_real_escape_string($connection, $_GET['u']);
	if (ctype_alnum($ev_id)) {
 	//check user exists

		$check = mysqli_query($connection, "SELECT * FROM accessor WHERE accessor_id='$ev_id'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$ev_id = $get['accessor_id'];
	$accessor_name = $get['accessor_name'];
	$user_id = $get['user_id'];

		if ($user_id == $u_id){
			$sql = "DELETE FROM accessor WHERE accessor_id =$ev_id";
if ($connection->query($sql) === TRUE) {
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=addaccessor.php\">";
	exit();
} else {
    echo "Error deleting record: " . $connection->error;
}
		} else {
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
		}
}}}		

?>