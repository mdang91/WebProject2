<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Sign up form -->
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link href="nerdieluv.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<body>
<!-- Get the common top from common.php -->
<?php include("common.php");
top();
 ?>
<div>
<form action="signup-submit.php" method="post">
<fieldset>

<!-- Name -->
<legend>New User Signup:</legend>
<strong class="column">Name:</strong>
<input maxlength="16" name="name" size="20" type="text">
<br>
<br>

<!-- Gender -->
<strong class="column">Gender:</strong>
<input type="radio" name="gender" value="M" >Male
<input type="radio" name="gender" value="F" checked>Female
<br>
<br>

<!-- Age -->
<strong class="column">Age:</strong>
<input size="6" maxlength="2" type="text" name="age">
<br>
<br>

<!-- Personality -->
<strong class="column">Personality Type:</strong>
<input size="6" maxlength="4" type="text" name="personality">
<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a>
<br>
<br>

<!-- Favorite OS -->
<strong class="column">Favorite OS:</strong>
<select name="os">
	<option value="Windows" selected> Windows</option>
	<option value="Mac OS X" > Mac OS X</option>
	<option value="Linux"> Linux</option>
</select>
<br>
<br>

<!-- Seeking Age -->
<strong class="column">Seeking age:</strong>
<input type="text" name="min_seeking_age" size="6" maxlength="2" placeholder="min"> to
<input type="text" name="max_seeking_age" size="6" maxlength="2" placeholder="max">
<br>
<br>

<!-- Seek Genders -->
<strong class="column">Seek Gender(s):</strong>
<input name="exgender[]" type="checkbox" value="M" checked> Male
<input name="exgender[]" type="checkbox" value="F"> Female
<br>
<br>

<input type="submit" value="Sign Up">
</fieldset>
</form>
</div>

<!-- Get the common bottom from common.php -->
<?php
bottom();
 ?>
</body>
</html>