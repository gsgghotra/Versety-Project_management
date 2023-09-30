<?php
require_once "../database/connection.php";
	if(isset($_POST['delete'])) {
		$checkbox = $_POST['checkbox'];
    	$delete = $_POST['delete'];
		if($delete) {
			for($i=0;$i<$count;$i++){
				$del_id = $checkbox[$i];
				
				$sql = "DELETE FROM posts WHERE id='$del_id'";
				$result = mysqli_query($connection, $sql);
			}
			if($result) {
				echo"success";

			}
		}
		mysqli_close($connection);
	}
	else
	{
		}

?>
