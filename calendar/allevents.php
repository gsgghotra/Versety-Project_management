<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
?>

<style type="text/css">
/* The container <div> - needed to position the dropdown content */
.eo_dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.eo_dropdown-content {
  display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.show{
  display: block;
}
.eo_dropdown span{
    padding: 5px;
    z-index: -20;
  }
/* colors - Dropdown for mobile*/
.dropbtn_red {
    background-color:rgba(255, 0, 0, 0.5);
    color: black;
    padding: 5px;
    font-size: 80%;
    border: 1px solid gray;
    cursor: pointer;
}
.dropbtn_orange {
    background-color:rgba(214, 129, 2, 0.5);
    color: black;
    padding: 5px;
    font-size: 14px;
    border: 1px solid gray;
    cursor: pointer;
}
.dropbtn_green {
    color: black;
    padding: 5px;
    font-size: 12px;
    border: 1px solid gray;
    border-left: 8px solid rgba(24, 145, 0, 0.5);
    cursor: pointer;
}
.dropbtn_gray{
    background-color:rgba(132, 132, 132, 0.5);
    color: black;
    padding:5px;
    font-size: 70%;
    border: 1px solid gray;
    cursor: pointer;
}
</style>

<?php
if(isset($_POST['eFilter'])){
    if($_POST['eFilter']  == 1) {
    $_SESSION['eFilter'] = 'Default';
      } else if($_POST['eFilter']  == 2) {
    $_SESSION['eFilter'] = 'Due Today';
      } else if($_POST['eFilter'] == 3) {
    $_SESSION['eFilter'] = 'Due Tomorrow';
      } else if($_POST['eFilter'] == 4) {
    $_SESSION['eFilter'] = 'Overdue';
      } else if($_POST['eFilter'] == 5) {
    $_SESSION['eFilter'] = 'All';
      }
}
if(isset($_SESSION['eFilter'])){
    } else {
  $_SESSION['eFilter'] = 'Default';
}

  //filter status
if(isset($_POST['eFilter_status'])){
      if($_POST['eFilter_status'] == 1) {
    $_SESSION['eFilter_status'] = 'All';
      } else if($_POST['eFilter_status'] == 2) {
    $_SESSION['eFilter_status'] = 'Not Started';
      } else if($_POST['eFilter_status'] == 3) {
    $_SESSION['eFilter_status'] = 'In progress';
      } else if($_POST['eFilter_status'] == 4) {
    $_SESSION['eFilter_status'] = 'Completed';
      } else if($_POST['eFilter_status'] == 5) {
    $_SESSION['eFilter_status'] = 'Cancelled';
      }
}
 if(isset($_SESSION['eFilter_status'])){
  } else {
      $_SESSION['eFilter_status'] = 'All';
  }
?>
<body>
<main>
<div id="container">
<div id="eventpage">
<div id="eventcontainer">
              <!---  FILTER BOX    -->
      <form action="allevents.php" method="post">
        <div class="ev_filter_box">
          <div class="ev_filter_main">
            <div class="small_ftr_box">
              <div class="ftr_title">
                By Time:
              </div>
              <div class="ftr_option">
                <select name="eFilter">
                  <option value =""><?php echo $_SESSION['eFilter'] ?></option>
                  <option value="1">Default</option>
                  <option value="2">Due Today</option>
                  <option value="3">Due Tomorrow</option>
                  <option value="4">Overdue</option>
                  <option value="5">All</option>
                </select>
              </div>
            </div>

            <div class="small_ftr_box">
              <div class="ftr_title">
                By Status:
              </div>
              <div class="ftr_option">
                <select name="eFilter_status">
                  <option value=""><?php echo $_SESSION['eFilter_status'] ?></option name="eFilter_status">
                  <option value="1">All</option>
                  <option value="2">Not Started</option>
                  <option value="3">In progress</option>
                  <option value="4">Completed</option>
                  <option value="5">Cancelled</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="ev_filter_button">
            Filter <span class="icon-circle-down"></span>
          </button>
        </div>
      </form>
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
            $color = $row['color'];
            date_default_timezone_set('Europe/London');
            $time_passed= time_passed($row['posttime']);
            $fduedate = date("d",$duedate);
            $fduemonth = date("M Y",$duedate);
            $new_duetime = date("H:i",$duedate);

            // colour s
            if($color == 1){
              $color = 'orange_event';
            } else if($color == 2){
              $color = 'pink_event';
            } else if($color == 3){
              $color = 'yellow_event';
            } else if($color == 4){
              $color = 'green_event';
            }  else if($color == 5){
              $color = 'blue_event';
            }  else if($color == 6){
              $color = 'black_event';
            }  else {
              $color = 'black_event';
            }



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
      if($_SESSION['eFilter'] == 'Due Today'){
        $query_days = '-1';
        $query_ends = '-1';
      } else if($_SESSION['eFilter'] == 'Due Tomorrow'){
        $query_days = '0';
        $query_ends = '0';
      } else if($_SESSION['eFilter'] == 'Overdue'){
        $query_days = '-365';
        $query_ends = '-2';
      } else if($_SESSION['eFilter'] == 'All'){
        $query_days = '-9999';
        $query_ends = '999';
      } else if($_SESSION['eFilter'] == 'Default') {
        $query_days = '-2';
        $query_ends = '30';
      }
          

      if ($_SESSION['eFilter_status'] == 'All') {
        $query_status = '0';
        $query_status_end = '4';
      } else if ($_SESSION['eFilter_status'] == 'In progress') {
        $query_status = '1';
        $query_status_end = '2';
      } else if ($_SESSION['eFilter_status'] == 'Not Started') {
        $query_status = '0';
        $query_status_end = '1';
      } else if ($_SESSION['eFilter_status'] == 'Completed') {
        $query_status = '2';
        $query_status_end = '3';
      } else if ($_SESSION['eFilter_status'] == 'Cancelled') {
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

        <div class="eventp_box">
          <div class="event_date" id="<?php echo $color ?>">
                <?php //today or tomorrow
                  if ($todaydate == $fduedate){
                    echo "<div class='eventday'>$fduedate</div><div class='event_month'>$fduemonth</div>";
                  } else if ($fduedate == $ftomorrowdate){
                    echo "<div class='eventday'>$fduedate</div><div class='event_month'>$fduemonth</div>";
                  } else if($duedate < $todaysdate){
                    echo "<div class='eventday'>$fduedate</div><div class='event_month'>$fduemonth</div>";
                  }else if($duedate > $todaysdate){
                    echo "<div class='eventday'>$fduedate</div><div class='event_month'>$fduemonth</div>";
                  } ?>
          </div>
          <div class="event_title">
            <?php echo $title; ?>
          </div>
          <div class="event_duetime">
            <span class="icon-clock"></span><?php echo "  ".$new_duetime; ?>
          </div>
          <div class="event_timeleft">
            <span class="icon-hour-glass"></span><?php echo "  ".$left_time; ?>
          </div>
          <div class="event_emailicon">
            <span class="icon-envelop"></span>
          </div>
          <div class="event_shareicon">
            <span class="icon-users"></span>
          </div>
          <div class="event_statusoption">
            <div class="eo_dropdown">


              <!-- its only button -->
              <button onclick="optionStatus(<?php echo $id ?>)" id='like_<?php echo $id?>'
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



                <div id="eo_Dropdown<?php echo $id ?>" class="eo_dropdown-content">
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
        </div>
          <div class="event_delbtn">
            <span class="icon-bin"></span>
          </div>
          <div class="event_viewbtn">
            <span class="icon-paste"></span>
          </div>
        </div>
        <?php } }}?>
      </div>

    </div>
  </div>
  </main>


<script type="text/javascript">
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function optionStatus(id) {

    document.getElementById('eo_Dropdown'+id+'').classList.toggle("show");


}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {

  if (!event.target.matches('.dropbtn_red,.dropbtn_green,.dropbtn_gray,.dropbtn_orange')) {
    var dropdowns = document.getElementsByClassName("eo_dropdown-content");
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
</body>
<?php
require_once 'aps/footer.php';?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/like.js"></script>