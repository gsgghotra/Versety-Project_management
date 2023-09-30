
<div id="outerpssd">
	<?php
	if(isset($er)){
	echo '<div class="logerror">'.$er.'</div>';
	}
	?>
<div class="pssd">
		<h2>LOGIN</h2>
		<div class="logalert">
	<span class="logclosebtn" onclick="this.parentElement.style.display='none';">&times;</span>
	<span class="authaction"></span>
</div>
<?php echo $username; ?>
		<input type="text" name="username" id="log_u_name" placeholder="Username" maxlength="40" class="email">
		<input type="password" name="password" id="log_u_pass" maxlength="25" placeholder="Password" class="pass">
		<button type="submit" class="submit" onclick="log_auth()" name="submit">Login</button><br>
	<a href="forgetpass.php">Forgotten Details?</a>
</div>
</div>
    <script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript">
function log_auth(){
	if($('#log_u_name').val().length == 0){
		log_u_empty();
	} else if($('#log_u_pass').val().length == 0){
		log_u_empty();
	} else {
		$.post('ajax/login_auth.php',
					{logname: $('#log_u_name').val(), logpass: $('#log_u_pass').val()},
					 function(data){
							 $('#log_u_pass').val('');
					if (data =='success'){
				log_u_pass();
					} else {
				log_u_error();
					}
					});
	}
	}


function log_u_empty() {
	$(".authaction").show();
	$(".logalert").show();
		$('.authaction').text('Please fill in both fields!');
		$('#log_u_name').css("width", "90%");
		$('#log_u_name').css("border-right", "1px solid red");
		$('#log_u_pass').css("border-right", "1px solid red");
		$('#log_u_pass').css("width", "90%");
}
function log_u_pass() {
	$(".authaction").hide();
	$(".logalert").hide();
	 location.href = 'home.php';
}
function log_u_error() {
	$(".logalert").show();
	$(".authaction").show();
		$('.authaction').text('The username or password is incorrect.');
		$('#log_u_name').css("border-right", "1px solid red");
		$('#log_u_pass').css("border-right", "1px solid red");
}
</script>
