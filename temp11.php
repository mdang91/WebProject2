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
<?php

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
?>

<?php
//bank
if($count == 6 || $count == 11 || $count == 15 || $count == 18 || $count == 21)
{
	echo ('<h1 id="h11">Bank has offer</h1>');
?>
<div id="bank">
	<div id="bankContent">
		<div class="bankTitle">The bank offers you:</div>
		<div class="bankOffer"></div>
		<button id="yesDeal" class="buttons">Deal</button>
		<button id="noDeal" class="buttons">No Deal</button>
		<div id="prevOffers">Previous Offers: none</div>
	</div>
</div>
<?php
}
if($count == 24)
{
	echo ('<h1 id="h11">Do you want to change the box?</h1>');
	for($i = 0; $i <= 25; ++$i){
		if($status[$i] == 2){
			$status[$i] = 0;
		}
	}
}
$_SESSION['Status'] = $status;
function bankoffer(){
  
}
?>
<div id="logo">
	<img class="logoImg" src="./Pics/don.png">
</div>
<form action="" method="post" id="boxContainer">
<?php
$clearvalue = 0;
for($i = 0; $i <= 25; ++$i){
	//not open box
	if($status[$i] == 0){
		echo('<div class="box">'.($i+1).'<input name="box'.($i+1).'" type="checkbox" value="'.$value[$i].'"></div>');
	}
	//picked box
	elseif($status[$i] == 2){
		echo('<div class="boxpick">'.($i+1).'<input name="box'.($i+1).'" type="checkbox" value="'.$value[$i].'" disabled></div>');
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
	$nickname = $_SESSION['Nickname'];
	$userscore = array($nickname, $clearvalue);
	$to_write = implode(",", $userscore);
	print_r($to_write);
	//Write to file
	file_put_contents("leaderboard.txt", PHP_EOL.$to_write, FILE_APPEND);
}
?>
	<input type="submit" value="Submit">
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

	<div id="bank">
		<div id="bankContent">
			<img class="bankLogo"src="https://i.ibb.co/s9HN0Xn/bankimg.png">
			<div class="bankTitle">The bank offers you:</div>
			<div class="bankOffer"></div>
			<button id="yesDeal" class="buttons">Deal</button>
			<button id="noDeal" class="buttons">No Deal</button>
			<div id="prevOffers">Previous Offers: none</div>
		</div>
	</div>
	<div id="finished">
		<div id="finishedContent">
			<div class="modalText">Congratulations, you won:</div>
			<div id="winnings"></div>
		</div>
	</div>
	<div id="lastDeal">
		<div id="lastDealContent">
			<div class="modalText">Do you want to keep you box, or change it for the one remaining box?</div>
			<button id="keepBox" class="buttons">Keep It!</button>
			<button id="changeBox" class="buttons">Change It!</button>
		</div>
	</div>
	
	</div>
</body>
</html>