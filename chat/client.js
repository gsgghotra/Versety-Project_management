var pollServer = function(){
	$.get('chathome.php', function(result){
		if(!result.success){
			console.log("Error polling server for new message!");
			return;
		}
		$.each(result.messages, function(idx){
			var chatBubble;

			if(this.sent_by == 'self'){
				chatBubble = $('<div class="row bubble-sent pull-right">' + this.message + '</div><div class="clearfix"></div>');

			} else {
				chatBubble = $('<div class="row bubble-recv">' + this.message + '</div><div class="clearfix"></div>');
			}

			$('#chatPanel').append(chatBubble);
		});

		setTimeout(pollServer, 1000);
	});

}

$(document).on('ready', function(){
	pollServer();

	$('button').click(function(){
		$(this).toggleClass('active');
	});
});

$('#sendMessageBtn').on('click', function(event){
	event.preventDefault();

	var message = $('#chatMessage').val();

	$.post('chathome.php',{
		'message': message 
	}, function(result){
		$('#sendMessageBtn').toggleClass('active');

		if(!result.success){
			alert("There was an error sending your message");
		} else {
			console.log("message sent!");
			$('#chatMessage').val('');
	}
	});
});
