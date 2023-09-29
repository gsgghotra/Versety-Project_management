<?php
if (isset($_POST['formsubmit'])) {
    $error = array(); 
    if (empty($_POST['stitle'])) { 
        $error[] = 'Please Enter a Title '; 
    } else {
        $stitle = $_POST['stitle']; 
    }

    if (empty($_POST['color'])) { 
        $scolor = '6'; 
    } else {
        $scolor = $_POST['color']; 
    }


	if (empty($_POST['sdate'])) {
		
        $error[] = 'Please Enter a Valid date '; 
    } else {
        $sdate = $_POST['sdate']; 
		$sstatus = 1;
		$fsdate = strtotime($sdate);
        $sdetails = $_POST['sdetails']; 
        $suserid = $_POST['suserid']; 
        $stimestamp = $_POST['stimestamp']; 
    }

    if (empty($error)){
		
            $query = "INSERT INTO `posts` ( `title`, `duedate`, `details`, `userid`, `posttime`,`status`,`color`) VALUES ( '$stitle', '$fsdate', '$sdetails', '$suserid', '$stimestamp','$sstatus','$scolor')";

            $result = mysqli_query($connection, $query); 
            if (!$result) {
                echo 'Query Failed ';
            }

    
 } 
} // End of the main Submit conditional.
?>