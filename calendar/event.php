<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php'; 
?>
<!DOCTYPE HTML>
<html>
<body>
<main>
	<div id="container">
<?php
if (isset($_GET['u'])) {
	$ev_id = mysqli_real_escape_string($connection, $_GET['u']);
	if (ctype_alnum($ev_id)) {
 	//check user exists

		$check = mysqli_query($connection, "SELECT * FROM posts WHERE id='$ev_id'");
	if (mysqli_num_rows($check)===1) {
	$get = mysqli_fetch_assoc($check);
	$ev_id = $get['id'];
	$ev_title = $get['title'];
	$ev_userid = $get['userid'];
	$ev_time = $get['duetime'];
	$ev_date = $get['duedate'];
	$ev_details = $get['details'];
	$status = $get['status'];
	$ev_accessor = $get['accessor'];
	$ev_passed= time_passed($get['posttime']);
$evs_date = date("d/m/Y", $ev_date);

if($status == 1){
	$sfstatus = 'Not Started';
} else if ($status == 2){
	$sfstatus = 'In progress';
} else if ($status == 3){
	$sfstatus = 'Completed';
} else if($status == 4){
	$sfstatus = 'Cancelled';
}
		if ($ev_userid == $u_id){
			
		} else {
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
		}
		
// The Regular Expression filter
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
// The Text you want to filter for urls
$text = $ev_details;
// Check if there is a url in the text
if(preg_match($reg_exUrl, $text, $url)) {
       // make the urls hyper links
       $text = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank" class="redlink" rel="nofollow">'.$url[0].'</a>', $text);
} else {
       // if no urls in the text just return the text
       $text = $text;
}
}
$getacc = mysqli_query($connection, "SELECT * FROM accessor WHERE accessor_id='$ev_accessor'") or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($getacc)) {
$accessor_name = $row['accessor_name'];
}
		?>
		
<aside class="setpage">
<form method="" action="" autocomplete="off" class="pssdregister">
		<h2> Event - <?php echo $ev_title?> </h2>
		 <label class="setinfo" for="bday">Due Date: </label>
		<input type="text" disabled="disabled" value="<?php echo $evs_date?>" class="stitle"/>
		 <label class="setinfo" for="bday">Due Time:</label>
    <input type="text"  disabled="disabled" name="stime" value="<?php echo $ev_time?>" class="stitle" placeholder="Time"/>
		 <label class="setinfo" for="bday">Title:</label>
<input type="text"  disabled="disabled" value="<?php echo $ev_title ?>" class="stitle"/>
<label class="setinfo" for="bday">Status:</label>
<input type="text"  name="title" disabled="disabled" value="<?php echo $sfstatus ?>" class="stitle"/>
		  <label class="setinfo" for="bday">Details:</label>
<textarea name="post"  class="stitle" disabled="disabled" placeholder="Details"/><?php echo $ev_details ?></textarea>
		 </form>
		 
<a href='editevent.php?u=<?php echo $ev_id ?>'><button class="ssubmit">Edit</button></a>
</aside>
		
		<?php

		
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
	exit();
	}
	}


?>
<script>
function Deleteqry(id)
{ 
  if(confirm("Are you sure you want to delete this Event?")==true)
           window.location="delevent.php?u="+id;
    return false;
}
</script>
</div>
</main>
</body>
</html>
<?php require_once 'aps/footer.php';?>