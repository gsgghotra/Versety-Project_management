<?php
	//This code is for timestamp,
require_once "../connection.php";
$taskname = $_POST['fname'];
$pro_query = "UPDATE saves
SET text_field = '$taskname'
WHERE id = 1";
	 $final_result = mysqli_query($connection, $pro_query);
	 if (!$final_result){
	 	echo "fail";
				    } else {
				    	echo "success";
				    }

		?> 