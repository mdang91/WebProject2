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
	<link rel="stylesheet" type="text/css" href="temp1.css">

</head>
<body>

<div id="logo">
	<img class="logoImg" src="./Pics/don.png">
</div>

<div class="div5">
<div id="tutorial">
	<div id="tutorialContainer">
	<div class="text">
	<h1 id="h11"> How To Play </h1>
	<ol>
		<li>Pick any box from 1-26 where you think it worth $1.000.000.</li>
		<li>Each round, you open the required amount of boxes that you think it has lower amount. The amount will reveal when you open.</li>	
		<li>After 6, 5, 4, 3, 2, 1 boxes opened, the bank offers a deal. You have two options:
		<ul>
			<li>Take the deal: The game is over and you walk out with the deal amount.</li>
			<li>Decline the deal: Continue opening more boxes.</li>
		</ul>
		</li>
			<li>Once only 2 boxes remain (the one you picked and one other box), you have two options:
		<ul>
			<li>Keep the box you chose.</li>
			<li>Change your box for the other box.</li>
		</ul>
		</li>
			</ol>
			</div>
		</div>
	</div>
<div id="leaderboard">
<h1 id="h11"> Leader Board </h1>
<?php
$userlead = file("leaderboard.txt");
foreach($userlead as $var){
	echo $var;
	echo ('<br>');
}
?>
</div>
</div>
<form action="temp11.php" method="post" id="boxContainer">
<?php
$value = array(0.1, 1, 5, 10, 25, 50, 75, 100, 200, 300, 400, 500, 750, 
			1000, 5000, 10000, 25000, 50000, 75000, 100000, 200000, 300000, 400000, 500000, 750000, 1000000);
			
$status = array(0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0, 
				0, 0, 0, 0, 0,0);
				
$rewardleft = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$rewardright = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

shuffle($value);

$_SESSION['Value'] = $value;
$_SESSION['Status'] = $status;
$_SESSION['StatusTemp'] = $status;
$_SESSION['Unique'] = 1;
$_SESSION['Count'] = 0;
$_SESSION['Takeout'] = 0;
$_SESSION['Rewardleft'] = file("rewardleft.txt");
$_SESSION['Rewardright'] = file("rewardright.txt");

for($i = 0; $i <= 25; ++$i){
echo('<div class="box">'.($i+1).'<input name="box'.($i+1).'" type="checkbox" value="'.$value[$i].'"></div>');
}
?>
	<input type="submit" value="Submit">
</form>

</body>
</html>