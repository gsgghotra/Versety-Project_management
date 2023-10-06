<div id="outerpssd">
	<?php
	// Check if the variable $er is set (likely used for error messages)
	if(isset($er)){
		// Display an error message div if $er is set
		echo '<div class="logerror">'.$er.'</div>';
	}
	?>
	<div class="pssd">
		<h2>LOGIN</h2>
		<div class="logalert">
			<!-- Close button for the alert -->
			<span class="logclosebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			<span class="authaction"></span>
		</div>
		<!-- Display the username variable (assuming it's meant for debugging or display) -->
		<?php echo $username; ?>
		<!-- Input fields for username and password -->
		<input type="text" name="username" id="log_u_name" placeholder="Username" maxlength="40" class="email">
		<input type="password" name="password" id="log_u_pass" maxlength="25" placeholder="Password" class="pass">
		<!-- Login button -->
		<button type="submit" class="submit" onclick="log_auth()" name="submit">Login</button><br>
		<!-- Forgotten Details link -->
		<a href="forgetpass.php">Forgotten Details?</a>
	</div>
</div>

<!-- Include the jQuery library -->
<script type="text/javascript" src="javascript/jquery.js"></script>

<!-- JavaScript functions for form validation and authentication -->
<script type="text/javascript">
function log_auth(){
	if($('#log_u_name').val().length == 0){
		log_u_empty();
	} else if($('#log_u_pass').val().length == 0){
		log_u_empty();
	} else {
		// Send a POST request to 'ajax/login_auth.php' with username and password
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
	// Display an alert for empty fields
	$(".authaction").show();
	$(".logalert").show();
	$('.authaction').text('Please fill in both fields!');
	$('#log_u_name').css("width", "90%");
	$('#log_u_name').css("border-right", "1px solid red");
	$('#log_u_pass').css("border-right", "1px solid red");
	$('#log_u_pass').css("width", "90%");
}

function log_u_pass() {
	// Hide the alert and redirect to 'home.php'
	$(".authaction").hide();
	$(".logalert").hide();
	location.href = 'home.php';
}

function log_u_error() {
	// Display an error alert for incorrect username or password
	$(".logalert").show();
	$(".authaction").show();
	$('.authaction').text('The username or password is incorrect.');
	$('#log_u_name').css("border-right", "1px solid red");
	$('#log_u_pass').css("border-right", "1px solid red");
}
</script>
