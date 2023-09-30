<?php require_once 'init.php'; ?>
<div id="outerrssd">
<div class="rssd">
		<h2>Latest Reviews</h2>
		<div id="show">
			<div class="loader"></div>
		</div>

</div>

</div>

<div id="outerpssd">
<div class="pssd">
	<h2>Review</h2>
		<div class="authaction"></div>
		<input type="text" name="regusername" placeholder="Name" id="review_u_name"  maxlength="40" class="email" value="">
		<input type="text" name="regusermail" id="review_u_pass" placeholder="Email" maxlength="40" class="email" value="">
		<textarea class="review" rows="4" id="review_area" placeholder="Type your review here"></textarea>
		<button type="submit" class="submit" onclick="review_auth()" name="submit" value="">Submit</button><br>
</div>
</div>
<script type="text/javascript">
function review_auth(){
	var emailreview = $('#review_area');
	var email_user = $('#review_u_pass').val();
	if($('#review_u_name').val().length == 0){
		review_u_empty();
	} else if($('#review_u_name').val().length <= 1){
		review_u_error();
	} else if($('#review_u_pass').val().length == 0){
		review_e_empty();
	} else if($('#review_area').val().length == 0){
		review_a_empty();
	} else {
		$(".authaction").hide();
		$.post('ajax/reviewsubmit.php',
					{reviewname: $('#review_u_name').val(), reviewpass: $('#review_u_pass').val()},
					 function(data){
						 $('#review_u_name').val('');
					if (data =='success'){
				review_u_pass();
					} else {
				review_u_error();
					}
					});
	}
	}


function review_u_empty() {
	$(".authaction").show();
		$('.authaction').text('Please fill all the fields! name');
		$('#review_u_name').css("border-right", "1px solid red");
		$('#review_u_pass').css("border-right", "1px solid red");
}
function review_a_empty() {
	$(".authaction").show();
		$('.authaction').text('Please fill all the fields review!');
		$('#review_u_name').css("border-right", "1px solid red");
		$('#review_u_pass').css("border-right", "1px solid red");
}
function review_e_empty() {
	$(".authaction").show();
		$('.authaction').text('Please fill all the fields email!');
		$('#review_u_name').css("border-right", "1px solid red");
		$('#review_u_pass').css("border-right", "1px solid red");
}
function review_u_error() {
	$(".authaction").show();
		$('.authaction').text('Please enter valid name');
		$('#review_u_name').css("border-right", "1px solid red");
}
function log_email_error() {
	$(".authaction").show();
		$('.authaction').text('Please enter correct email.');
		$('#review_u_name').css("border-right", "1px solid red");
		$('#review_u_pass').css("border-right", "5px solid red");
}
</script>
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('aps/reviewdata.php')
			}, 3000);
		});
	</script>
