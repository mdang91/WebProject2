<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Welcome page -->
<meta charset="UTF-8">
<title>Welcome</title>
<link href="nerdieluv.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<body>
<div>
<div>
<img src="./Pics/logo.png" alt="image" />
</div>
<h1>Welcome back <?= $_SESSION['Username']?>!</h1>
<div class="div1">
<ul>
<li><a href="signup.php"><img class="img1" src="./Pics/signup1.png" alt="icon" />
Sign up for a new account</a>
</li>
<li><a href="matches.php"><img class="img1" src="./Pics/heartbig1.png" alt="icon" />
Check your matches</a>
</li>
</ul>
</div>
</div>
<p id="p1"> <a href="logout.php"> <img class="img1" src="./Pics/out.png" alt="icon" /> Click here</a> to Logout.</p>
</body>
</html>