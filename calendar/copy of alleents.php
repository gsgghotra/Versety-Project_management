<?php
require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
if(isset($_SESSION['eFilter'])){

} else {
$_SESSION['eFilter'] = 'default03';
}
if(isset($_POST['submitToday'])) {
$_SESSION['eFilter'] = 'duetoday399';
  } else if(isset($_POST['submitTomorrow'])) {
$_SESSION['eFilter'] = 'duetomorrow399';
  } else if(isset($_POST['submitOver'])) {
$_SESSION['eFilter'] = 'overdue412';
  } else if(isset($_POST['submitall'])) {
$_SESSION['eFilter'] = 'all909';
  } else if(isset($_POST['default'])) {
$_SESSION['eFilter'] = 'default03';
  }


//filter status
if(isset($_SESSION['eFilter_status'])){

} else {
$_SESSION['eFilter_status'] = 'default09';
}

if(isset($_POST['submitReset'])) {
$_SESSION['eFilter_status'] = 'default09';
  } else if(isset($_POST['submitInp'])) {
$_SESSION['eFilter_status'] = 'Inprogress34';
  } else if(isset($_POST['submitNS'])) {
$_SESSION['eFilter_status'] = 'notstarted07';
  } else if(isset($_POST['submitCOM'])) {
$_SESSION['eFilter_status'] = 'Completed799';
  } else if(isset($_POST['submitCAN'])) {
$_SESSION['eFilter_status'] = 'Cancelled87';
  }

?>
<body>
<main>
<div id="container">
<div id="eventpage">
<div id="eventcontainer">

<div class="filter_box">
  <table class="filter_table_top">
    <tr>
      <td class="field_full">Filter</td>
    </tr>
  </table>
  
  <table class="filter_table">
  <tr>
    <td class="field_twenty">Filter by Time:</td>
        <form action="allevents.php" method="post">
    <button type="submit" class="filter_btn_active" name="default">Reset</button>
  </form>
    <form action="allevents.php" method="post">
    <td class="field_ten"><button type="submit" class=
      <?php if($_SESSION['eFilter'] == 'duetoday399') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
     name="submitToday">Due Today</button></td>
  </form>
   <form action="allevents.php" method="post">

 <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['eFilter'] == 'duetomorrow399') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
  name="submitTomorrow">Due Tomorrow</button></td>
   </form>
   <form action="allevents.php" method="post">
 <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['eFilter'] == 'overdue412') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
  name="submitOver">Overdue</button></td>
</form>
  <form action="allevents.php" method="post">
    <td class="field_ten"><button type="submit" class=
<?php if($_SESSION['eFilter'] == 'all909') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
     name="submitall">All</button></td>
  </form>
    <tr>
    <td class="field_twenty">Filter by Status:</td>
         <form action="allevents.php" method="post">
     <td class="field_ten"><button type="submit" class=
      <?php if($_SESSION['eFilter_status'] == 'default09') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
      name="submitReset">Reset</button></td>
   </form>
     <form action="allevents.php" method="post">
     <td class="field_ten"><button type="submit" class=
 <?php if($_SESSION['eFilter_status'] == 'notstarted07') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
      name="submitNS">Not Started</button></td>
   </form>
    <form action="allevents.php" method="post">
      <td class="field_ten"><button type="submit" class=
 <?php if($_SESSION['eFilter_status'] == 'Inprogress34') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
       name="submitInp">In progress</button></td></form>
      <form action="allevents.php" method="post">
       <td class="field_ten"><button type="submit" class=
 <?php if($_SESSION['eFilter_status'] == 'Completed799') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
        name="submitCOM">Completed</button></td></form>
       <form action="allevents.php" method="post">
        <td class="field_ten"><button type="submit" class=
 <?php if($_SESSION['eFilter_status'] == 'Cancelled87') { echo "filter_btn_active"; } else {echo "filter_btn";}?>
         name="submitCAN">Cancelled</button></td>
      </form>

  </tr>
</table>


</div>
  </div>
<?php
$getposts = mysqli_query($connection, "SELECT * FROM posts WHERE userid='$u_id' ORDER BY duedate ASC") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getposts)) 
{
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


            //get time left

            getdate($duedate);
            $seconds =$duedate - time();
            $days = floor($seconds / 86400);
            $seconds %= 86400;
            $hours = floor($seconds / 3600);
            $seconds %= 3600;
            $minutes = floor($seconds / 60);
            $seconds %= 60;
// modify this for time filters
      if($_SESSION['eFilter'] == 'duetoday399'){
        $query_days = '-1';
        $query_ends = '-1';
      } else if($_SESSION['eFilter'] == 'duetomorrow399'){
        $query_days = '0';
        $query_ends = '0';
      } else if($_SESSION['eFilter'] == 'overdue412'){
        $query_days = '-365';
        $query_ends = '-2';
      } else if($_SESSION['eFilter'] == 'all909'){
        $query_days = '-999';
        $query_ends = '999';
      } else if($_SESSION['eFilter'] == 'default03') {
        $query_days = '-2';
        $query_ends = '30';
      }
          

      if ($_SESSION['eFilter_status'] == 'default09') {
        $query_status = '0';
        $query_status_end = '4';
      } else if ($_SESSION['eFilter_status'] == 'Inprogress34') {
        $query_status = '1';
        $query_status_end = '2';
      } else if ($_SESSION['eFilter_status'] == 'notstarted07') {
        $query_status = '0';
        $query_status_end = '1';
      } else if ($_SESSION['eFilter_status'] == 'Completed799') {
        $query_status = '2';
        $query_status_end = '3';
      } else if ($_SESSION['eFilter_status'] == 'Cancelled87') {
        $query_status = '3';
        $query_status_end = '4';
      }


      if (($status > $query_status) && ($status <= $query_status_end)) {
//modified
      if (($days >= $query_days) && ($days <= $query_ends)){
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
      $timestamp ='';
      $timestamp=(int)$timestamp; 
      $current_time=time();
      $todaysdate=$current_time - $timestamp;
      //tomorrow date
        $tomorrowdate = strtotime('+1 day', $todaysdate);
        $ftomorrowdate = date("d/m/Y",$tomorrowdate);

        ?>
      <div id="eventcontainer">
      <div class="eventp_box">
      <form method="post" id="checkboxform" action="ajax/del_event.php">
      <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $id; ?>"></td>
        <?php //today or tomorrow
            if ($todaydate == $fduedate){
            echo '<td class="tablenam"><b>'.$duetime.'</b></td>';
          } else if ($fduedate == $ftomorrowdate){
            echo '<td class="tablenam">Tomorrow</td>';
          } else if($duedate < $todaysdate){
            echo  '<td class="tablenam">' .$fduedate.' </td>';
          }else if($duedate > $todaysdate){
            echo '<td class="tablenam">'.$fduedate.'</td>';
          } ?>

      <div class="eventp_title"><?php echo $title; ?></div>
      <div class="eventp_timeleft"><?php echo $left_time; ?></div>
      <td class="tablenam_status">
      <?php
      if(isset($countview)){
      if($countview == '0'){
          echo "<td>No Events</td>";
      }}
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
      <div onclick="myFunction(<?php echo $id ?>)" id='like_<?php echo $id?>'
      <?php if($status == 1){ ?>
       class="dropbtn_gray"
      <?php }else if($status == 2){ ?>
       class="dropbtn_orange"
      <?php }else if($status == 3){ ?>
      class="dropbtn_green"
      <?php }else if($status == 4){ ?>
      class="dropbtn_red"
      <?php } ?> >

      <?php echo $sfstatus ?></div>
        <div id="myDropdown<?php echo $id ?>" class="dropdown-content">
         <!--- IN DEVELOPMENT S-->
      <input type="hidden" id="reply<?php echo $id?>" name="sstatus<?php echo $id?>" value="1">
      <input type="hidden" id="postid<?php echo $id?>" value="<?php echo $id;?>">
      <div onclick='reply_add(<?php echo $id?>)' class="btn_gray">Not started</div>
       <!--- IN DEVELOPMENT S-->
      <input type="hidden" id="reply2<?php echo $id?>" name="sstatus<?php echo $id?>" value="2">
      <input type="hidden" id="postid2<?php echo $id?>" value="<?php echo $id;?>">
      <div onclick='reply_add2(<?php echo $id?>)' class="btn_orange">In progress</div>
       <!--- IN DEVELOPMENT S-->
      <input type="hidden" id="reply3<?php echo $id?>" name="sstatus<?php echo $id?>" value="3">
      <input type="hidden" id="postid3<?php echo $id?>" value="<?php echo $id;?>">
      <div onclick='reply_add3(<?php echo $id?>)' class="btn_green">Completed</div>
      <!--- IN DEVELOPMENT E-->
      <input type="hidden" id="reply4<?php echo $id?>" name="sstatus<?php echo $id?>" value="4">
      <input type="hidden" id="postid4<?php echo $id?>" value="<?php echo $id;?>">
      <div  onclick='reply_add4(<?php echo $id?>)' class="btn_red">Cancelled</div>
        </div>
      </div>
      <span class="icon-eye" onclick="location.href='event.php?u=<?php echo $id?>'"></span>
      <span class="icon-bin"  onclick='return Deleteqry(<?php echo $id ?>);'></span>
      </td>

</div>

<?php
}
}
 }
?>
</div>



<button type="submit" class="delete_event_btn"  name="submit_delete">Delete Selected</button>
</form>
</div>
  </div>
  </main>
</body>
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



function Deleteqry(id)
{
  if(confirm("Are you sure you want to delete this Event?")==true)
           window.location="delevent.php?u="+id;
    return false;
}
</script>
<?php require_once 'aps/footer.php';?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/like.js"></script>
