<?php
require_once "../aps/connect_i.php";
$eventid = $_POST['event_id'];
$eventdetail = $_POST['text_detail'];


if ($eventid != ''){
		if ($eventdetail != ''){
			echo "success";
	}
			
		}

?>