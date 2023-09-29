function new_pass(){
	if($('#new_pass').val().length == 0){
		newpassempty();
	} else {
		if($('#con_pass').val().length == 0){
			newpassempty();
		} else {
	if ($('#new_pass').val().length >= 5) {
		if ($("#new_pass").val() != $("#con_pass").val()) {
		newpassdm();
 	      } else {
					$.post('ajax/newpass.php',
					{newpass: $('#new_pass').val(), conpass: $('#con_pass').val(), uemail: $('#user_email').val(), pcode: $('#passcode').val()},
					 function(data){
						 $('#npass').val('');
					if (data =='success'){
				ans_newpass();
					} else {
				alert(data);
					}
					});
				}
	} else {
		newpassln()
	}
}}
}
	function ans_newpass() {
	$.post('ajax/newpass.php', function(data) {
				$('#emailfield').css("display", "none");
					$('.setpageanswer').text('Password successfully changed');
	});
}

function newpassdm() {
	$(".setpageanswer").show();
		$('.setpageanswer').text('Password do not match.');
		$('#new_pass').css("border-right", "5px solid red");
		$('#con_pass').css("border-right", "5px solid red");
}
function newpassempty() {
	$(".setpageanswer").show();
		$('.setpageanswer').text('Please fill in both fields!');
		$('#new_pass').css("border-right", "5px solid red");
		$('#con_pass').css("border-right", "5px solid red");
}
function newpassln() {
	$(".setpageanswer").show();
		$('.setpageanswer').text('Password must be 5 characters long. ');
		$('#new_pass').css("border-right", "1px solid red");
		$('#con_pass').css("border-right", "1px solid red");
}
