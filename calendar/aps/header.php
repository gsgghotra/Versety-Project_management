<!DOCTYPE html>
<html>
	<head>
	<!-- Title -->
		<title>Versety Calendar</title>
	<!-- meta tags -->
		<meta charset="UTF-8">
		<meta name="description" content="Help yourself and make your life more organised with Versity. Many advanced features to help you remind important events.">
		<meta name="keywords" content="Versety,Calendar,Project Managemnet, Work Reminder, share events">
		<meta name="author" content="Gurjeet Singh">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Specific meta tags -->

	<!-- CSS LINKS -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/icon/style.css"/>
	</head>
	<style>
.dropbtn {
    background-color: transparent;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    outline: none;

}
.dropbtn span{
	padding-right: 10px;
	padding-left: 5px;
	z-index: -1;	
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    border: 1px solid #025290;
    margin-left: -65px;
    margin-top: 1px;
    background-color: #f1f1f1;
    min-width: 145px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content li {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    min-width: 145px;
    font-size: 12px;
}
.dropdown-content span{
	padding-right: 10px;
	padding-left: 5px;
}
.dropdown li:hover {
	background-color: #ddd;
	font-size: 14px;
}

.show {display:block;}
</style>
<body>
<!-- heading of the body -->
<header>
<!-- Nav of the body -->
<div class="lognav">
	 <h3><span><img src="css/versety.png" class="logoimg" onclick="location.href='../index.php'"/></span></h3>
	<!---<ul>
		<!---<li class="nav_first" onclick="location.href='index.php'"><span class="text_red"><i>VERSETY</i></span></li>
		<li class="nav_normal" onclick="location.href='../index.php'"><span class="icon-home"></span> Home</li>
		<li class="nav_normal" onclick="location.href='index.php'"><span class="icon-home"></span> Profile</li>
		<li class="nav_last" onclick="location.href='logout.php'"> <span class="icon-home"></span> Logout</li>
	</ul>
</div>-->
</div>
</header>
	<!---	<form action="extras/checking.php" method="post" class="nav_search">
    		  <input class="search_bar" type="text" name="name" placeholder="Search here...">
					<button class="search_go">Go</button>
   		</form> -->
<nav>
	<ul>
		<li onclick="location.href='index.php'"><span class="icon-home"></span> Home</li>
		<div class="dropdown">
		<button onclick="myFunction()" class="dropbtn"><span onclick="myFunction()" class="icon-list"></span> Menu</button>
		  <div id="myDropdown" class="dropdown-content">
			<li onclick="location.href='allevents.php'"><span class="icon-list"></span> List</li>
			<li onclick="location.href='projects.php'"><span class="icon-calendar"></span> Projects</li><hr/>
			<li onclick="location.href='allevents.php'"><span class="icon-newspaper"></span> Forum</li>
			<li onclick="location.href='settings.php'"><span class="icon-user"></span> My account</li><hr/>
			<li onclick="location.href='settings.php'"><span class="icon-cog"></span> Help</li>
		    <li onclick="location.href='logout.php'"> <span class="icon-switch"></span> Logout</li>
		  </div>
		</div>
	</ul>
</nav>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
