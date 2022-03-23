<!DOCTYPE html>
<html lang="en">

<head>
<!-- Welcome page -->
<meta charset="UTF-8">
<title>Welcome</title>
<link href="g4.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<?php
//Banner area
function top()
{
?>
<div>
<div>
<header class="banner app">
<div class="div2">
	<img src="./Pics/logo.png" alt="image" />
</div>

<!-- Navigation bar -->
<div id="bannertext">
	<ul class="ul1">
		<li class="li1"><a href="index.php" class="a1">Home</a></li>
		<li class="li1"><a href="g4.html" class="a1">About Us</a></li>
		<li class="li1"><a href="logout.php"> Log Out</a></li>
	</ul>
	
<div class="div3">
	<h1>Welcome back <?=trim($_SESSION['Nickname'])?>!</h1><img class="img1" src="./Pics/user.png" alt="icon">
</div>
</div>
<!-- End navigation bar -->

</header>
</div>
</div>
<?php
}
?>


<?php
//Bottom area
function bottom()
{
?>
<?php
}
?>