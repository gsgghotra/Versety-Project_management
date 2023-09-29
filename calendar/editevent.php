<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
?>
<!DOCTYPE HTML>
<html>
<body>
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
	$ev_type = $get['type'];
	$ev_userid = $get['userid'];
	$ev_time = $get['duetime'];
	$ev_date = $get['duedate'];

	$ev_type = $get['type'];
	$ev_details = $get['details'];
	$ev_passed= time_passed($get['posttime']);
$evs_date = date("d/m/Y", strtotime($ev_date));

	if($ev_type == 1){
	$evs_type = 'Assignment';
} else if ($ev_type == 2){
	$evs_type = 'Appointment';
} else if ($ev_type == 3){
	$evs_type = 'Homework';
} else if($ev_type == 4){
	$evs_type = 'others';
}
		if ($ev_userid == $u_id){

		} else {
			echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\">";
		}

//find hashtags
function convertHashtags($text){
	$regex = "/#+([a-zA-Z0-9_]+)/";
	$text = preg_replace($regex, '<a href="find.php?=$1" class="redlink"><b>$0</b></a>', $text);
	return($text);
}
//find usertags
function convertusertags($text){
	$reugex = "/@+([a-zA-Z0-9_]+)/";
	$text = preg_replace($reugex, '<a href="profile.php?u=$1" class="redlink">$0</a>', $text);
	return($text);
}
$post=@$_POST['post'];
$post_title=@$_POST['title'];
$post_time=@$_POST['stime'];
$post_date=@$_POST['sdate'];
$postf_date = strtotime($post_date);

if($post!=""){
	mysqli_query($connection, "UPDATE posts SET details=('$post'),title=('$post_title'),duetime=('$post_time') WHERE id ='$ev_id'");

	echo "<meta http-equiv=\"refresh\" content=\"0; URL=editevent.php?u=$ev_id\">";
	exit();
}}}}
$fduedate = date("d/m/Y",$ev_date);
?>

<aside class="setpage">
<form method="post" action="" autocomplete="off" class="pssdregister" id="update_event">
		<h2> Setting -</h2>
		 <label class="setinfo"  for="bday">Due Date: <a href=""><span class="normal">Change Date</span></a></label>
		<input type="text" disabled="disabled" value="<?php echo $fduedate?>" class="stitle" placeholder="<?php echo $fduedate?>"/>
		<input type="hidden" id="event_id" value="<?php echo $ev_id ?>"/>
		 <label class="setinfo" for="bday">Due Time:</label>
    <input type="time" maxlength="20" name="stime" value="<?php echo $ev_time?>" class="stitle" placeholder="Time"/>
		 <label class="setinfo" for="bday">Title:</label>
<input type="text" maxlength="20" name="title" value="<?php echo $ev_title ?>" class="stitle"/>
		  <label class="setinfo" for="bday">Details:</label>
<textarea name="post" required="required"  id="text_detail" class="stitle" placeholder="Details"/><?php echo $ev_details ?></textarea>
		 <button type="submit" name="formsubmit" class="ssubmit" onclick="myTimer();" value="Update">UPDATE</button>
		 </form>
</aside>
</div>
<script>
var myVar = setInterval(myTimer ,1000);
function myTimer() {
	$('.save_message').text('No changes made');
	alert ("No");
     $.post('ajax/auto_saveevent.php',
				{event_id: $('#event_id').val(), event_detail: $('#text_detail').val()},
					 function(data){
					if (data =='success'){
    			$("#update_event").load(" #update_event > *");
					} else {
				alert('Error passing the values.');
					}
					 });
}
</script>
</body>
</html>
<?php require_once 'aps/footer.php';?>