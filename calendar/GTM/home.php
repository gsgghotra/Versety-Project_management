<?php require_once '../aps/init.php';
protect_page();
?>
<!doctype html>
<html>
  <head>
    <title>G4agenda</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link type="text/css" rel="stylesheet" href="../css/icon/style.css"/>
    <script src="popup.js"></script>
  </head>
  <body>
  <div id="container">
  <header>
    <img src="icon.png" class="logoimg"/>
		</header>
    <nav>
    	<ul>
    		<li onclick="location.href='home.php'"><span class="icon-clipboard"></span></li>
    		<li onclick="location.href='logout.php'"><span class="icon-switch"></span></li>
    	</ul>
    </nav>
        <table id="t01">
  <tr>
    <th>Date</th>
    <th>Title</th>
    <th>More</th>
  </tr>
  <tr>
    <?php //today or tomorrow
    $getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' ORDER BY duedate ASC") or die(mysqli_error($connection));
    while ($row = mysqli_fetch_assoc($getposts)) {
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
            $left_time = 'Due tomorrow';
        } else if ($hours >= 1 && $days < 1 ){
            $left_time = 'Due tomorrow';
        } else if ($days >= 1){
            $left_time = $days == 1 ? $days . ' Day left' : $days . ' Days left';
        } else if ($days == '-1'){
            $left_time = 'Due today';
        } else if ($days < '-1'){
            $left_time = '<span class="red">OVERDUE</span>';
        }
    //end time left
    //test for todays date
    $todaydate = date("d/m/Y");
    $todaysdate=$current_time - $timestamp;
    //tomorrow date
      $tomorrowdate = strtotime('+1 day', $todaysdate);
      $ftomorrowdate = date("d/m/Y",$tomorrowdate);

	if ($todaydate == $fduedate){
	echo '<td class="tablenam"><b>'.$duetime.'</b></td>';
} else if ($fduedate == $ftomorrowdate){
	echo '<td class="tablenam">Tomorrow</td>';
} else if($duedate < $todaysdate){
	echo  '<td class="tablenam">' .$fduedate.' </td>';
}else if($duedate > $todaysdate){
	echo '<td class="tablenam">'.$fduedate.'</td>';
}
	?>
    <td><?php echo $title; ?></td>
    <td><a target="_blank" href="../event.php?u=<?php echo $id?>"><span class="icon-eye"></span></a></td>
  </tr>
<?php } ?>
</table>
</div></body></html>
