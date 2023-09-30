<?php
require_once "../aps/connect_i.php";
	if(isset($_POST['submit_delete'])) {
		if(isset($_POST['checkbox'])) {
		$checkbox = $_POST['checkbox'];
	} else{
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=../allevents.php\">";
	exit();
	}

    	$delete = $_POST['submit_delete'];
				
if($checkbox){
				
	foreach($checkbox as $value){ 
    			$sql = "DELETE FROM posts WHERE id='$value'";
				$result = mysqli_query($connection, $sql);
}
			if ($connection->query($sql) === TRUE) {
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=../allevents.php\">";
	exit();
} else {
    echo "Error deleting record: " . $connection->error;
}
} else
{
	 echo "<meta http-equiv=\"refresh\" content=\"0; URL=../allevents.php\">";
}
		
		mysqli_close($connection);
	}
	else
	{
		echo "error";
		}

?>
