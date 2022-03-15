<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Check your matches</title>
<link href="nerdieluv.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<body>
<!-- Get the common top from common.php -->
<?php include("common.php");
top();
 ?>
 
<!-- Get the user's name to check for matches -->
<div>
<form action="matches-submit.php" method="get">
<fieldset>
<legend>Returning User: </legend>
<strong class="column">Name: </strong>
<input type="text" name="name" maxlength="25"><br><br>
<input type="submit" value="View My Matches">
</fieldset>
</form>
</div>

<!-- Get the common bottom from common.php -->
<?php
bottom();
 ?>
</body>
</html>