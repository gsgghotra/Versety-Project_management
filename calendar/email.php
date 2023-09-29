<?php
require_once 'aps/init.php';
$getposts = mysqli_query($connection, "SELECT * FROM users ORDER BY id ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
						$email = $row['email'];
						$user = $row['id'];
						$f_name = $row['first_name'];
	
echo '<hr/>'.$email.'<br/><hr/>';

$getpostss = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$user';") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getpostss)) {
						$id = $row['id'];
						$title = $row['title'];
						$type = $row['type'];
						$duedate = $row['duedate'];
						$duetime = $row['duetime'];
						$details = $row['details'];
						$status = $row['status'];

$time_passed= time_passed($row['posttime']);
$fduedate = date("d/m/Y",$duedate);

//get time left

getdate($duedate);
$seconds =$duedate - time();
$days = floor($seconds / 86400);
$seconds %= 86400;
$hours = floor($seconds / 3600);
$seconds %= 3600;
$minutes = floor($seconds / 60);
$seconds %= 60;

	if ($minutes >= 1 && $hours < 1 && $days < 1 ){
        $left_time = $minutes == 1 ? $minutes . ' Minute left' : $minutes . ' Minutes left';
		$timelim = '1';
    } else if ($hours >= 1 && $days < 1 ){
        $left_time = '1 Day left';
		$timelim = '2';
    } else if ($days >= 1){
        $left_time = $days == 1 ? $days . ' Day left' : $days . ' Days left';
		$timelim = '3';
    } else if ($days == '-1'){
        $left_time = 'Due today';
		$timelim = '4';
    } else if ($days < '-1'){
        $left_time = '<span class="red">OVERDUE</span>';
		$timelim = '5';
    }
//end time left

if($type == 1){
	$mtype = 'Assignment';
} else if ($type == 2){
	$mtype = 'Appointment';
} else if ($type == 3){
	$mtype = 'Homework';
} else if($type == 4){
	$mtype = 'others';
}
// status
	if($status == 1){
	$sfstatus = 'Not Started';
} else if ($status == 2){
	$sfstatus = 'In progress';
} else if ($status == 3){
	$sfstatus = 'Completed';
} else if($status == 4){
	$sfstatus = 'Cancelled';
}
//email starts here
// assignment
$to = $email;
if ($type == '1'){
if ($timelim == '2'){
	$mailsub = 'is due tomorrow';
} else if ($timelim == '4'){
	$mailsub = 'is due today';
}
 }
// appointment
 if ($type == '2'){
if ($timelim == '2'){
	$mailsub = 'is tomorrow';
} else if ($timelim == '4'){
	$mailsub = 'is today';
}
 }
 //homework
  if ($type == '3'){
if ($timelim == '2'){
	$mailsub = 'is due tomorrow';
} else if ($timelim == '4'){
	$mailsub = 'is due today';
}
 }
//others
 if ($type == '4'){
if ($timelim == '2'){
	$mailsub = 'deadline is tomorrow';
} else if ($timelim == '4'){
	$mailsub = 'deadline is today';
}
 }
//today or tomorrow
if ($timelim == '2' OR $timelim == '4') {
$subject = "Your $mtype ($title) $mailsub.";

$message = "
<!DOCTYPE>
<html>
<head>
<title>FORAR</title>
<style>
h2{
color:white;
padding:5px;
background-color:#009999;
margin:0px;
}
p{
color:white;
padding:5px;
background-color:#404040;
margin:0px;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th{
padding:5px;
text-align:center;
}
td{
text-align:center;
padding:5px;
}
table{
width:100%;
}
</style>
</head>
<body>
<h2>FORAR</h2>
<p>Hello $f_name, Your $mtype $mailsub.</p>
<table>
<tr>
<th>Due Date</th>
<th>Title</th>
<th>Status</th>
</tr>
<tr>
<td>$fduedate</td>
<td>$title</td>
<td>$sfstatus</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: FORAR <>' . "\r\n";

mail($to,$subject,$message,$headers);
}

						}
}
?>