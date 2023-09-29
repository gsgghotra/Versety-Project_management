function ans_get() {
	$.post('ajax/ans_get.php', function(data) {
		$(".setpageanswer").show();
		$('.setpageanswer').text(data);
	});
	$("#emailfield").hide();
}

function res_pass(){
	if($('#email').val().length == 0){
		$(".setpageanswer").show();
		$('.setpageanswer').text('Please enter your email address.');
	} else {

	$.post('ajax/resetpass.php',
	{email: $('#email').val(),password: $('#password').val()},
	 function(data){
		 $('#email').val('');
	if (data =='success'){
		ans_get(email);
	} else {

	}
	});
}	}
