function like_get(postid) {
	$.post('ajax/like_get.php', {postid:postid}, function(data) {
		$('#like_'+postid+'').text(data);
	});
}

function reply_add(postid) {
	document.getElementById('reply'+postid+'').value = "1";
$.post('ajax/replies_add.php',
{postid: $('#postid'+postid+'').val(), reply: $('#reply'+postid+'').val()},
 function(data){
	 $('#reply'+postid+'').val('');
if (data =='success'){
like_get(postid);
} else {
alert(data);
}
$('#like_'+postid+'').css("background-color", "rgba(132, 132, 132, 0.5)");
});

}
//2nd
function reply_add2(postid) {
		document.getElementById('reply2'+postid+'').value = "2";
		
$.post('ajax/replies_add.php',
{postid: $('#postid2'+postid+'').val(), reply: $('#reply2'+postid+'').val()},
 function(data){
	 $('#reply2'+postid+'').val('');
if (data =='success'){
like_get(postid);
} else {
alert(data);
}
$('#like_'+postid+'').css("background-color", "rgba(214, 129, 2, 0.5)");
});
}
//3rd
function reply_add3(postid) {
	document.getElementById('reply3'+postid+'').value = "3";
$.post('ajax/replies_add.php',
{postid: $('#postid3'+postid+'').val(), reply: $('#reply3'+postid+'').val()},
 function(data){
	 $('#reply3'+postid+'').val('');
if (data =='success'){
like_get(postid);
} else {
	
alert(data);
}
$('#like_'+postid+'').css("background-color", "rgba(24, 145, 0, 0.5)");
});
}
//4th
function reply_add4(postid) {
	document.getElementById('reply4'+postid+'').value = "4";
$.post('ajax/replies_add.php',
{postid: $('#postid4'+postid+'').val(), reply: $('#reply4'+postid+'').val()},
 function(data){
	 $('#reply4'+postid+'').val('');
if (data =='success'){
like_get(postid);
} else {
alert(data);
}
$('#like_'+postid+'').css("background-color", "rgba(255, 0, 0, 0.5)");
});
}