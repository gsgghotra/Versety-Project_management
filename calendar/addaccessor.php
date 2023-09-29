<?php require_once 'aps/init.php';
protect_page();
require_once 'aps/header.php';
?>
<!DOCTYPE HTML>
<html>
<body>
<main>
	<div id="container">

<aside class="setpage">
	<?php
			$post_lname=@$_POST['lname'];

			if($post_lname!=""){
				mysqli_query($connection, "INSERT INTO `accessor` (`user_id`, `accessor_name`) VALUES ('$u_id', '$post_lname')");
				echo "<meta http-equiv=\"refresh\" content=\"0; URL=addaccessor.php\">";
				exit();
			}
			?>
		<form method="post" action="" autocomplete="off" class="pssdregister">
				<h2> Add New Accessor</h2>
				  <label class="setinfo" for="bday">Accessor Name:</label>
					    <input type="text" maxlength="20" name="lname" class="stitle" value="<?php echo $l_name?>" placeholder="Full name"/>
				 <button type="submit" name="formsubmit" class="submit" value="Update">UPDATE</button>
				 </form>
			 <hr/>
		 <h2> Accessor List </h2>
		 <?php
		 $getposts = mysqli_query($connection, "SELECT * FROM accessor WHERE user_id='$u_id'") or die(mysqli_error($connection));
		 while ($row = mysqli_fetch_assoc($getposts)) {
			 $user_id = $row['user_id'];
			 $accessor_id = $row['accessor_id'];
				$ac_name = $row['accessor_name'];
				echo "<div class='ac_name'>".$ac_name."<span class='remove_b' onclick='return Deleteqry($accessor_id);'>Remove</span></div>";
			}
			$accessor_total= "SELECT * FROM accessor where user_id='$u_id'";
												$resultaccessor = mysqli_query($connection, $accessor_total);
												$countall = $resultaccessor->num_rows;
												if ($countall == '0'){
													echo "<div class='ac_name'>No Records</div>";
												}?>
	 </aside>

	</div>
	</main>
</body>
</html>
<script>
function Deleteqry(id)
{
  if(confirm("Are you sure you want to delete ("+id+") this Event?")==true)
           window.location="delaccessor.php?u="+id;
    return false;
}
</script>
<?php
 require_once 'aps/footer.php';?>
