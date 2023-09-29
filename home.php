<?php require_once "extras/head.php";
protect_page();
?>
<!DOCTYPE html>
<html>
<?php require_once "extras/header.php";?>

	<body>
		<main>
		<div id="container">

			<div class="latest">
			<div class="banner_latest">
				<div class="header">Latest Articles</div>
				</div>
				<div class="banner_latest_workarea">

					<script type="text/javascript">
					var auto_refresh = setInterval( function() { $('#loadarticles').load('loads/loadhomearticles.php').fadeIn("slow"); }, 3000); // refreshing after every 3000 milliseconds </script>
					 <div id="loadarticles">
						 	<div id="loader"></div>
							Loading...
					 </div>


				</div>
		</div>






			<div class="banner_middle">
				<div class="header">Calender</div>
				<div class="middle_article">
						<div class="middle_title">
							This page will be available soon
						</div>
						<div class="middle_main">
							No posts available yet. Development of this site is still in progress and we hope to update it soon. 

						</div>
			</div>
		</div>
			<div class="banner_right">
				<div class="header">Notifications</div>
			</div>
		</div>
		</main>

</body>
<script type="text/javascript">
function Redirect(){
  window.location.href = ("Calendar/index.php");
}
document.write("Please wait you will be redirected in 10sec");
setTimeout('Redirect(), 10000');
</script>
</html>
