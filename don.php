<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deal or No Deal</title>
	<link rel="stylesheet" type="text/css" href="don.css">
	<link href="./Pics/icon.png" type="image/gif" rel="shortcut icon" />

</head>
<body>
<?php
include("common.php");
top();
?>

<div id="logo">
	<img class="logoImg" src="./Pics/don.png">
</div>

<div class="div5">
<div id="tutorial">
	<div id="tutorialContainer">
	<div class="text">
	<h1 id="h11"> How To Play </h1>
	<ol>
		<li>There are 26 boxes and you pick one box that you think it worth $1.000.000.</li>
		<li>Each round, you will open boxes that you think they have lower amount.</li>	
		<li>After 6, 5, 4, 3, 2, 1 boxes opened, the bank will offer a deal. You have two options:
		<ul>
			<li>Accept the deal: The game is over and you walk out with the deal amount.</li>
			<li>Decline the deal: Continue opening more boxes.</li>
		</ul>
		</li>
			<li>Once only 2 boxes remain (the one you picked and one other box), you have two options:
		<ul>
			<li>Keep your box.</li>
			<li>Change your box for the other box.</li>
		</ul>
		</li>
			</ol>
			</div>
		</div>
	</div>
	
<!--Leader board-->
<div id="leaderboard">
<h1 id="h11"> Leader Board </h1>
<?php
$userlead = file("leaderboard.txt");
foreach($userlead as $var){
	echo ('<ul><li>'.$var.'</li></ul>');
}
?>
</div>
</div>
<form action="playdon.php" method="post" id="boxContainer">
<?php
//reward value
$value = array(0.1, 1, 5, 10, 25, 50, 75, 100, 200, 300, 400, 500, 750, 
			1000, 5000, 10000, 25000, 50000, 75000, 100000, 200000, 300000, 400000, 500000, 750000, 1000000);

//check box's status			
$status = array(0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0,0);

//display reward on the left
$rewardleft = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

//display reward on the right
$rewardright = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

//shuffle value each time start new game
shuffle($value);

//Save the session reward value
$_SESSION['Value'] = $value;

//Save the session box's status
$_SESSION['Status'] = $status;

//Temporary status for modifying function
$_SESSION['StatusTemp'] = $status;
$_SESSION['Unique'] = 1;
$_SESSION['Count'] = 0;
$_SESSION['Takeout'] = 0;
$_SESSION['Rewardleft'] = file("rewardleft.txt");
$_SESSION['Rewardright'] = file("rewardright.txt");

//Display boxes
for($i = 0; $i <= 25; ++$i){
echo('<div class="box"><button name="box'.($i+1).'" type="submit" value="'.$value[$i].'">'.($i+1).'</button></div>');
}
?>
</form>

</body>
</html>