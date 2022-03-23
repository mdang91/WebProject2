<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Welcome -->
<meta charset="UTF-8">
<title>Welcome</title>
<link href="g4.css" type="text/css" rel="stylesheet" />
<link href="./Pics/icon.png" type="image/gif" rel="shortcut icon" />
</head>

<body style="margin:0px;">
<div>
<div>
<header class="banner app">
<div class="div2">
	<img src="./Pics/logo.png" alt="image" />
</div>

<!-- Navigation bar -->
<div id="bannertext">
	<ul class="ul1">
		<li class="li1"><a href="#" class="a1">Home</a></li>
		<li class="li1"><a href="g4.html" class="a1">About Us</a></li>
		<li class="li1"><a href="logout.php">Log Out</a></li>
	</ul>
	
<div class="div3">
	<h1 id="h13">Welcome back <?=trim($_SESSION['Nickname'])?>!</h1><img class="img1" src="./Pics/user.png" alt="icon">
</div>
</div>
<!-- End navigation bar -->

</header>
</div>
</div>

<!-- Gamelist -->
<div class="div4">
<h1 id="h12"> Game List </h1>
<ul class="ul2">
	<li class="li2"><a href="don.php">Deal or No Deal</a></li>
	<li class="li2"><a href="#">...</a></li>
	<li class="li2"><a href="#">...</a></li>
	<li class="li2"><a href="#">...</a></li>
</ul>
</div>


</body>
</html>