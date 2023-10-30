<?php
require_once "../../database/connection.php";
$eventid = $_POST['event_id'];
$eventdetail = $_POST['text_detail'];


if ($eventid != ''){
		if ($eventdetail != ''){
			echo "success";
	}
			
		}

?>