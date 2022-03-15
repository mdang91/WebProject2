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
<title>Sign Up</title>
<link href="nerdieluv.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<!-- Get the common top from common.php -->
<?php include("common.php");
top();
 ?>
<?php

//Variables to store the values from user
$username = $_POST['name'];
$usergender = $_POST['gender'];
$userage = $_POST['age'];
$userpersonality = $_POST['personality'];
$useros = $_POST['os'];
$userminseekage = $_POST['min_seeking_age'];
$usermaxseekage = $_POST['max_seeking_age'];

//Array to store user information
$user = array(
    'name' => '',
    'gender' => '',
    'age' => '',
    'personality' => '',
    'favorite_os' => '',
    'min_seeking_age' => '',
    'max_seeking_age' => '',
	'exgender' => ''
);

//Put value into array
if(isset($username)){
    $user['name'] = ($username);
}
if(isset($usergender)){
    $user['gender'] = ($usergender);
}
if(isset($userage)){
    $user['age'] = ($userage);
}
if(isset($userpersonality)){
    $user['personality'] = ($userpersonality);
}
if(isset($useros)){
    $user['favorite_os'] = ($useros);
}
if(isset($userminseekage)){
    $user['min_seeking_age'] = ($userminseekage);
}
if(isset($usermaxseekage)){
    $user['max_seeking_age'] = ($usermaxseekage);
}
if(isset($_POST['exgender'])){
	$user['exgender'] = ($_POST['exgender']);
}

//EXTRA FEATURES: #1 Checking errors
//Store errors into an array
$errors = array();
//Name cannot be digits.
if (preg_match("/[0-9]/", $username) === 1){
    $errors[] = "Name cannot be digits.";
}
//Name cannot be blank.
if ($username == ''){
    $errors[] = "Name must not be blank.";
}
//Name cannot contain comma.
if(strpos($username, ',') !== false ){
    $errors[] = "Name contain illegal characters.";
}

//No user will resubmit data for a name already in the system
$singles = file("singles.txt");
if ($username != ''){
	for ($i = 0; $i < count($singles); $i++){
		$userdetail = strstr($singles[$i], $username);
		if ($userdetail !== FALSE){
			break;
		}
	}
	if ($userdetail != ''){
		$errors[] = "User already in the system try to login instead.";
	}
}
//Check age must be an integer.
if (!is_numeric($user["age"])) {
    $errors[] = "Age must be a number.";
}


//Check personality type must satisfy these types
$personality_array = array("ESTJ", "ISTJ", "ENTJ", "INTJ",
							"ESTP", "ISTP", "ENTP", "INTP",
							"ESFJ", "ISFJ", "ENFJ", "INFJ",
							"ESFP", "ISFP", "ENFP", "INFP");
							
if (!in_array($user["personality"], $personality_array)){
    $errors[] = "Invalid Personality type.";
}

//Check min/max seeking age.
if (!is_numeric($userminseekage)) {
    $errors[] = "Min seeking age must be a number.";
}

if (!is_numeric($usermaxseekage)) {
    $errors[] = "Max seeking age must be a number.";
}
if ($user['exgender'] == ''){
    $errors[] = "Please select atleast one gender.";
}
//If no errors then start to write user into file
if (empty($errors)){
    $user_details = $user;
	//Rewrite exgender
	$exgender_result = implode("", $user_details['exgender']);
	//Implode all user details into string before adding into .txt file
	$user_details['exgender'] = $exgender_result;
	$to_write = implode(",", $user_details);
	//Write to file
	file_put_contents("singles.txt", PHP_EOL.$to_write, FILE_APPEND);
?>
<!-- Succesful sign up -->
<div class="div1" >
<h1>Thank you!</h1>
<p>Welcome to NerdLuv, <?= $user["name"] ?>!</p>
<p>Now <a href="matches.php">log in to see your matches!</a></p>
</div>
<?php
}
else{
?>

<!-- Errors detected when filling form -->
<div class="error">
<h1>Error! Invalid data.</h1>
<p> We're sorry. You submitted invalid user information. Please go back and try to fix these isssues.</p>
<ul id="ul1">
<?php
	foreach($errors as $error){
?>
		<li><?= $error ?> </li>
<?php 
	} 
?>
</ul>
</div>
<?php
}
?>

<!-- Get the common bottom from common.php -->
<?php
bottom();
 ?>
</body>
</html>