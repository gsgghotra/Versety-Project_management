<?php
if (isset($_POST['formsubmit'])) {
    $error = array(); 
    if (empty($_POST['stitle'])) { 
        $error[] = 'Please Enter a Title '; 
    } else {
        $stitle = $_POST['stitle']; 
    }
    if (empty($_POST['stime'])) {
        $stime = "00:00";
        
    } else{
                $stime = $_POST['stime']; 
    }
    if (empty($_POST['sdate'])) {
        
        $error[] = 'Please Enter a Valid date '; 
    } else {
        $sdate = $_POST['sdate']; 
        $sstatus = 1;
        $fsdate = strtotime($sdate);
        $stype = $_POST['stype']; 
        $sdetails = $_POST['sdetails']; 
        $suserid = $_POST['suserid']; 
        $scolor = $_POST['scolor']; 
        $saccessor = $_POST['saccessor']; 
        $stimestamp = $_POST['stimestamp']; 
    }

    if (empty($error)){
        
            $query = "INSERT INTO `posts` ( `title`, `type`, `duedate`, `duetime`, `details`, `userid`, `posttime`,`status`,`color`,`accessor`) VALUES ( '$stitle', '$stype', '$fsdate', '$stime', '$sdetails', '$suserid', '$stimestamp','$sstatus','$scolor','$saccessor')";

            $result = mysqli_query($connection, $query);
            echo "<script>window.location.assign(\"home.php\")</script>";     
            if (!$result) {
                echo 'Query Failed ';
            }

    
 } 
} // End of the main Submit conditional.
?>