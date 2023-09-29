<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
require_once 'aps/save.php';  
if (isset($_GET['m'])) {
	$month = mysqli_real_escape_string($connection, $_GET['m']);
}
if (isset($_GET['y'])) {
	$year = mysqli_real_escape_string($connection, $_GET['y']);
}
if (isset($_GET['d'])) {
	$day = mysqli_real_escape_string($connection, $_GET['d']);
}
$timestamp ='';
$timestamp=(int)$timestamp;
		$current_time=time();
		$date_added=date("d-M-y");
		$time_added=$current_time - $timestamp;
//dateof event
$eventdate =  $day.'/'.$month.'/'.$year;

$dateq = mktime(0,0,0,$month,$day,$year);
$dateevent = date('m/d/Y', $dateq);
$datequery = strtotime($dateevent);
		?>
<!DOCTYPE HTML>
<html>
<body>
<main>
<div id="container">
<?php
$timestamp=(int)$timestamp;
		$current_time=time();
		$date_added=date("d-M-y");
		$time_added=$current_time - $timestamp;
		?>
		<div id="eventpage">
		<div class="setpage">
		<h2> Assignments Due on <?php echo $eventdate ?> </h2>
		<table style="width:100%;">
  <tr>
    <th class="tablenam">Title</th>
    <th class="tablenam_acc">Assessor</th>
    <th class="tablenamstatus">Status</th>
    <th class="tablenam">More</th>
  </tr>
  </table>
  <?php

$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' AND duedate='$datequery'ORDER BY duedate ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) {
            $id = $row['id'];
            $title = $row['title'];
            $type = $row['type'];
            $duedate = $row['duedate'];
            $duetime = $row['duetime'];
            $details = $row['details'];
            $status = $row['status'];
            $accessor = $row['accessor'];

$time_passed= time_passed($row['posttime']);
$fduedate = date("d/m/Y",$duedate);
?>
<table style="width:100%">

  <tr>
    <td class="tablenam"><?php echo $title; ?></td>
    <td class="tablenam_accs"><?php
$getacc = mysqli_query($connection, "SELECT * FROM accessor WHERE accessor_id='$accessor'") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getacc)) {
$accessor = $row['accessor_name'];
echo $accessor;
}


  ?></td>
    <td class="tablenamstatus">
<?php
if($countview == '0'){
    echo "<td>No Events</td>";
}
?>
  <?php
  $setstatus = @$_POST['sstatus'.$id];
  if($status == 1){
  $sfstatus = 'Not Started';
} else if ($status == 2){
  $sfstatus = 'In progress';
} else if ($status == 3){
  $sfstatus = 'Completed';
} else if($status == 4){
  $sfstatus = 'Cancelled';
}
?>

<div class="dropdown">
<button onclick="myFunction(<?php echo $id ?>)" id='like_<?php echo $id?>'
<?php if($status == 1){ ?>
 class="dropbtn_gray"
<?php }else if($status == 2){ ?>
 class="dropbtn_orange"
<?php }else if($status == 3){ ?>
class="dropbtn_green"
<?php }else if($status == 4){ ?>
class="dropbtn_red"
<?php } ?> >

<?php echo $sfstatus ?></button>
  <div id="myDropdown<?php echo $id ?>" class="dropdown-content">
   <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply<?php echo $id?>" name="sstatus<?php echo $id?>" value="1">
<input type="hidden" id="postid<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add(<?php echo $id?>)' class="btn_gray">Not started</button>
 <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply2<?php echo $id?>" name="sstatus<?php echo $id?>" value="2">
<input type="hidden" id="postid2<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add2(<?php echo $id?>)' class="btn_orange">In progress</button>
 <!--- IN DEVELOPMENT S-->
<input type="hidden" id="reply3<?php echo $id?>" name="sstatus<?php echo $id?>" value="3">
<input type="hidden" id="postid3<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add3(<?php echo $id?>)' class="btn_green">Completed</button>
<!--- IN DEVELOPMENT E-->
<input type="hidden" id="reply4<?php echo $id?>" name="sstatus<?php echo $id?>" value="4">
<input type="hidden" id="postid4<?php echo $id?>" value="<?php echo $id;?>">
<button type="submit" name="submit" onclick='reply_add4(<?php echo $id?>)' class="btn_red">Cancelled</button>
  </div>
</div>

</td>

    <td class="tablenam">
  <span class="icon-eye" onclick="location.href='event.php?u=<?php echo $id?>'"></span>
  <span class="icon-pencil" onclick="location.href='editevent.php?u=<?php echo $id?>'"></span>
  <span class="icon-bin"  onclick='return Deleteqry(<?php echo $id ?>);'></span>
  </td>
  </tr>
</table>
<?php }?>

		</div>
		</div>
			<aside class="setpage">
<form method="post" action="" autocomplete="off" class="pssdregister">
		<h2> Set New Event </h2>
		<input type="hidden" name="suserid" value="5"/>
		<input type="hidden" name="stimestamp" value="<?php echo $time_added ?>"/>
		<input type="hidden" name="sdate" value="<?php echo $dateevent ?>" />
		 <label class="setinfo"  for="bday">Due Date:</label>
		<input type="text" disabled="disabled" class="stitle" value="<?php echo $eventdate?>" />
		 <label class="setinfo" for="bday">Due Time:</label>
    <input type="time" maxlength="20" name="stime" class="stitle" placeholder="Time"/>
		 <label class="setinfo" for="bday">Title:</label>
<input type="text" maxlength="20" name="stitle" placeholder="Title" class="stitle"/>
 <label class="setinfo" name="stype" for="bday">Type:</label>
		 <select  name="stype" class="swtype" required="required" >
			<option value="1">Assignment</option>
			<option value="2">Appointment</option>
			<option value="3">Homework</option>
			<option value="4">Others</option>
			</select>
		  <label class="setinfo" for="bday">Details:</label>
<textarea name="post" required="required"  class="stitle" placeholder="Details"/></textarea>
		 <button type="submit" name="formsubmit" class="ssubmit" value="Update">UPDATE</button>
		 </form>
</aside></div>
<script>

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(id) {

    document.getElementById('myDropdown'+id+'').classList.toggle("show");


}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {

  if (!event.target.matches('.dropbtn_red,.dropbtn_green,.dropbtn_gray,.dropbtn_orange')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; ++i) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function Deleteqry(id)
{
  if(confirm("Are you sure you want to delete this Event?")==true)
           window.location="delevent.php?u="+id;
    return false;
}
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/like.js"></script>
</main>
</body>
</html>
<?php
 require_once 'aps/footer.php';?>