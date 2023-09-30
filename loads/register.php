<div id="outerrssd">
<div class="rssd">
		<h2>REGISTER WITH VERSETY</h2>
		<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <span class="reg_authaction"></span>
</div>
		<input type="text" name="reg_email" id="reg_u_email" placeholder="Email" maxlength="40" class="email" value="">
		<input type="text" name="reg_username" id="reg_u_user" placeholder="Username" maxlength="40" class="email" value="">
		<input type="password" name="reg_pass" id="reg_u_pass" placeholder="Password" maxlength="40" class="email" value="">
		<input type="password" name="reg_repass" id="reg_u_repass" maxlength="20" placeholder="Repeat Password" class="pass" value="">
		<button type="submit" class="submit" onclick="reg_auth()" id="regsubmit" name="regsubmit" value="">REGISTER</button><br>
</div></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function reg_auth(){
if($('#reg_u_email').val().length == 0){
reg_u_empty();
} else if($('#reg_u_user').val().length == 0){
reg_u_empty();
} else if($('#reg_u_pass').val().length == 0){
reg_u_empty();
} else if($('#reg_u_repass').val().length == 0){
reg_u_empty();
} else {
$.post('calendar/ajax/reg_auth.php',
			{regname: $('#reg_u_user').val(), regemail: $('#reg_u_email').val(), regpass: $('#reg_u_pass').val(), regrepass: $('#reg_u_repass').val()},
			 function(data){
			if (data =='success'){
		reg_u_pass();
	} else if (data =='username'){
			reg_u_useral();
		} else if (data =='password'){
			reg_u_passsim();
			} else if (data =='email'){
				reg_u_email();
			} else if (data =='in_email'){
				reg_u_invalidemail();
			} else if (data =='smallpass'){
				reg_u_smallpass();
			} else if (data =='longpass'){
				reg_u_longpass();
			} else if (data =='notpass'){
				reg_u_notpass();
			}else if (data =='smallname'){
				reg_u_smallname();
			}else if (data =='longname'){
				reg_u_longname();
			} else if (data =='spacename'){
				reg_u_spacename();
			}
			else
			{
				reg_u_error();
			}
			});
}
}

//Empty fields
function reg_u_empty() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Please complete all required fields.');
$('#reg_u_user').css("border-right", "1px solid red");
$('#reg_u_pass').css("border-right", "1px solid red");
$('#reg_u_email').css("border-right", "1px solid red");
$('#reg_u_repass').css("border-right", "1px solid red");
}

// Everything is okh
function reg_u_pass() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Account successfully registered. Try login now.');
$('#reg_u_user').css("border-right", "0px solid");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
$('.reg_authaction').css("color", "#404040");
$('.reg_authaction').css("font-size", "120%");
//hide
$('#reg_u_user').hide();
$('#reg_u_pass').hide();
$('#reg_u_email').hide();
$('#reg_u_repass').hide();
$('#regsubmit').hide();
}

//Username error
function reg_u_useral() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Username already exist. Please choose another username.');
$('#reg_u_user').css("border-right", "1px solid red");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}

// Email errors
function reg_u_email() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('This email is already associated with another account.');
$('#reg_u_user').css("border-right", "0px solid");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "1px solid red");
$('#reg_u_repass').css("border-right", "0px solid ");
}
function reg_u_invalidemail() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Please enter correct email address.');
$('#reg_u_user').css("border-right", "0px solid");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "1px solid red");
$('#reg_u_repass').css("border-right", "0px solid ");
}
//username
function reg_u_smallname() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Username is too short');
$('#reg_u_user').css("border-right", "1px solid red");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
function reg_u_longname() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Username is too long');
$('#reg_u_user').css("border-right", "1px solid red");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
function reg_u_spacename() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Username must only include numbers and letters.');
$('#reg_u_user').css("border-right", "1px solid red");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}

//Password errors
function reg_u_passsim() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Password do not match');
$('#reg_u_user').css("border-right", "0px solid red");
$('#reg_u_pass').css("border-right", "1px solid red");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "1px solid red");
}
function reg_u_smallpass() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Password is too short');
$('#reg_u_user').css("border-right", "0px solid red");
$('#reg_u_pass').css("border-right", "1px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
function reg_u_longpass() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Password is too long');
$('#reg_u_user').css("border-right", "0px solid red");
$('#reg_u_pass').css("border-right", "1px solid red");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
function reg_u_notpass() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Password must conatin a letter and a number.');
$('#reg_u_user').css("border-right", "0px solid red");
$('#reg_u_pass').css("border-right", "1px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
//Default error
function reg_u_error() {
$(".alert").show();
$(".reg_authaction").show();
$('.reg_authaction').text('Something went wrong. Please try again.');
$('#reg_u_user').css("border-right", "0px solid red");
$('#reg_u_pass').css("border-right", "0px solid ");
$('#reg_u_email').css("border-right", "0px solid ");
$('#reg_u_repass').css("border-right", "0px solid ");
}
</script>
