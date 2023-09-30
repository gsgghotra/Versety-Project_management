
<?php

if(isset($_SESSION['calender_Filter'])){
	if($_SESSION['calender_Filter']="calender30"){
	require_once 'aps/smallcal.php'; 
	} else if ($_SESSION['calender_Filter']="calender07"){
	require_once 'aps/weekly_view.php'; 
	}
} else
{

}

?>