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

$nickname = trim($_SESSION['Nickname']);
$status = $_SESSION['Status'];
$status1 = $_SESSION['StatusTemp'];
if($_SESSION['Unique'] == 1){
	for($i = 0; $i <= 25; ++$i){
		$check = isset($_POST['box'.($i+1).'']) ? "checked" : "unchecked";
		if(strcmp($check, "checked") == 0){
			$status[$i] = 2;
			$status1[$i] = 2;
			$_SESSION['Unique'] += 1;
		}
	}
}
for($i = 0; $i <= 25; ++$i){
	$check = isset($_POST['box'.($i+1).'']) ? "checked" : "unchecked";
	if((strcmp($check, "checked") == 0) && ($status[$i] == 0)){
		$status[$i] = 1;
		$status1[$i] = 1;
		$_SESSION['Count'] += 1;
	}
}

$_SESSION['Status'] = $status;
$value = $_SESSION['Value'];
$count = $_SESSION['Count'];

if($count == 24)
{
?>
	<div id="lastDeal">
	<div id="lastDealContent">
		<div class="wintext"><h2>Do you want to change your box?</h2></div>
		<form action="" method="post">
			<button id="keepBox" class="buttons" type="submit" style="cursor:pointer;" name="actionkeep" value="keep">Keep It!</button>
			<button id="changeBox" class="buttons" type="submit" style="cursor:pointer;" name="actionchange" value="change">Change It!</button>
		</form>
		</div>
	</div>
<?php
}
if(isset($_POST['actionkeep']))
{
	for($i = 0; $i <= 25; ++$i){
		if($status[$i] == 2){
			$endgame = $value[$i];
		}	
	}
	$userscore = array($endgame, $nickname);
	$to_write = implode("-", $userscore);
	//Write to file
	file_put_contents("leaderboard.txt", PHP_EOL.$to_write, FILE_APPEND);
?>
	<div id="finished">
		<div id="finishedContent">
			<div class="wintext">Congratulations!!!, You won:</div>
			<div id="winnings">$<?=$endgame?></div>
			<h2><a href="don.php">Exit</a></h2>
		</div>
	</div>
<?php
}
if(isset($_POST['actionchange']))
{
	for($i = 0; $i <= 25; ++$i){
		if($status[$i] == 0){
			$endgame = $value[$i];
		}	
	}
	
	$userscore = array($endgame, $nickname);
	$to_write = implode("-", $userscore);
	//Write to file
	file_put_contents("leaderboard.txt", PHP_EOL.$to_write, FILE_APPEND);
?>
	<div id="finished">
		<div id="finishedContent">
			<div class="wintext">Congratulations!!! <?=$nickname?>, you won</div>
			<div id="winnings">$<?=$endgame?></div>
			<h2><a href="don.php">Exit</a></h2>
		</div>
	</div>
<?php
}
?>
<div id="logo">
	<img class="logoImg" src="./Pics/don.png">
</div>
<form action="playdon.php" method="post" id="boxContainer">
<?php
$clearvalue = 0;
for($i = 0; $i <= 25; ++$i){
	//not open box
	if($status[$i] == 0){
		echo('<div class="box"><button name="box'.($i+1).'" type="submit" value="'.$value[$i].'">'.($i+1).'</button></div>');
	}
	//picked box
	elseif($status[$i] == 2){
		echo('<div class="boxpick"><button name="box'.($i+1).'" type="submit" value="'.$value[$i].'" disabled>'.($i+1).'</button></div>');
	}
	//opened boxes
	else{
		echo('<div class="boxopened">$'.$value[$i].'</div>');
	}
}
for($i = 0; $i <= 25; ++$i){
	if($status1[$i] == 1){
		$clearvalue = $value[$i];
	}
}
//$_SESSION['Takeout'] +=  $clearvalue;

if($count == 25)
{
	echo ('<h1 id="h11">You won the amount: $'.$clearvalue.'</h1>');
	echo ('<h2><a href="don.php">Exit</a></h2>');
	$userscore = array($clearvalue, $nickname);
	$to_write = implode("-", $userscore);
	//Write to file
	file_put_contents("leaderboard.txt", PHP_EOL.$to_write, FILE_APPEND);
}
?>
</form>
<div id="smallMoneys" class="moneys">
<?php
$rewardLeft = $_SESSION['Rewardleft'];
//$leftfile = file("rewardleft.txt");
for($i = 0; $i <= 12; ++$i){
	if((($clearvalue <= 750) && ($rewardLeft[$i] == $clearvalue)) || $rewardLeft[$i] == 0){
		$rewardLeft[$i] = 0;
		echo ('<div class="moneyleft"></div>');
	}
	else{
		echo ('<div class="moneyleft"><h3> $'.$rewardLeft[$i].'</h3></div>');
	}
}
$_SESSION['Rewardleft'] = $rewardLeft;

?>
</div>

<div id="bigMoneys" class="moneys">
<?php

$rewardRight = $_SESSION['Rewardright'];
//$rightfile = file("rewardright.txt");
for($i = 0; $i <= 12; ++$i){
	if((($clearvalue >= 1000) && ($rewardRight[$i] == $clearvalue)) || $rewardRight[$i] == 0){
		$rewardRight[$i] = 0;
		echo ('<div class="moneyright"></div>');
		
	}
	else{
		echo ('<div class="moneyright"><h3> $'.$rewardRight[$i].'</h3></div>');
	}
}
$_SESSION['Rewardright'] = $rewardRight;

?>
</div>
<?php
//bank
function bankoffer(){
	$sum = 0;
	$tmp = 0;
	$avg = 0;
	global $status;
	global $value;
	for($i = 0; $i <= 25; ++$i){
		if($status[$i] == 0){
			$sum += $value[$i];
			$tmp += 1;
		}
	}
	$avg = ($sum/$tmp) * 0.5;
	return round($avg,2);
}
if($count == 6 || $count == 11 || $count == 15 || $count == 18 || $count == 21)
{
?>
	<div id="bank">
		<div id="bankContent">
			<img class="bankLogo" src="./Pics/bank.png">
			<div class="bankTitle">The bank offers you:</div>
			<div class="bankOffer">$<?=bankoffer()?></div>
			<form action="" method="post">
			<button id="yesDeal" class="buttons" type="submit" style="cursor:pointer;" name="actiondeal" value="deal">Deal</button>
			<button id="noDeal" class="buttons" type="submit" style="cursor:pointer;" name="actionnodeal" value="nodeal">No Deal</button>
			</form>
		</div>
	</div>
<?php
}
if(isset($_POST['actiondeal']))
{

	$userscore = array(bankoffer(), $nickname);
	$to_write = implode("-", $userscore);
	//Write to file
	file_put_contents("leaderboard.txt", PHP_EOL.$to_write, FILE_APPEND);
?>	
	<div id="finished">
		<div id="finishedContent">
			<div class="wintext">Congratulations!!!, You won:</div>
			<div id="winnings">$<?=bankoffer()?></div>
			<h2><a href="don.php">Exit</a></h2>
		</div>
	</div>
<?php
}
if(isset($_POST['actionnodeal'])){
	$offer = bankoffer();
	file_put_contents("offer.txt", PHP_EOL.$offer, FILE_APPEND);
	echo '<style type="text/css">
        #bank {
            display: none;
        }
        </style>';
}

?>

</body>
</html>