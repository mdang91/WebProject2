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
<?php

//Get all user's information
$singles = file("singles.txt");
//Get username for error detecting
$username = $_GET["name"];
$userdetail = '';

//Array to store errors
$errors = array();

//Error checking
if ($username == ''){
    $errors[] = "Name must not be blank.";
}
if (preg_match("/[0-9]/", $username) === 1){
    $errors[] = "Name cannot be digits.";
}
if(strpos($username, ',') !== false ){
    $errors[] = "Name contain illegal characters.";
}
//If user not on the list return user not exist
if ($username != ''){
	for ($i = 0; $i < count($singles); $i++){
		$userdetail = strstr($singles[$i], $username);
		if ($userdetail !== FALSE){
			break;
		}
	}
	if ($userdetail == ''){
		$errors[] = "User not exist.";
	}
}

//If no error then start looking for matches
if (empty($errors)){
for ($i = 0; $i < count($singles); $i++){
	$userdetail = strstr($singles[$i], $username);
    if ($userdetail !== FALSE){
        break;
    }
}

$user_info = explode(",", $userdetail);
$user_name = $user_info[0];
$user_gender = $user_info[1];
$user_age = (int)$user_info[2];
$user_personality = $user_info[3];
$user_os = $user_info[4];
$user_min_age = (int)$user_info[5];
$user_max_age = (int)$user_info[6];
$user_exgender = $user_info[7];


$matches = array();

//Get user's matches
?>
<div>
<?php
$found = TRUE;
//For loop looking for users
for ($i = 0; $i < count($singles); $i++){
    //Get the information
    $other_info = explode(",", $singles[$i]);
	$other_name = $other_info[0];
	$other_gender = $other_info[1];
    $other_gender = $other_info[1];
    $other_age = (int)$other_info[2];
    $other_personality = $other_info[3];
    $other_os = $other_info[4];
    $other_min_age = (int)$other_info[5];
    $other_max_age = (int)$other_info[6];
	$other_seek_gen = $other_info[7];

	if(strcmp($user_name, $other_name) != 0)
	{		
    if(strpos($user_exgender, $other_gender) !== false){

        $user_matches_others = FALSE;
        $other_matches_users = FALSE;
		
		//Check age
		if($user_min_age <= $other_age && $other_age <= $user_max_age)
			$other_matches_users = TRUE;

        if ($other_min_age <= $user_age && $user_age <= $other_max_age)
            $user_matches_others = TRUE;

        //Check OS
        if($user_matches_others && $other_matches_users){
            if (strcmp($user_os, $other_os) === 0){

                //Share at least one personality type in common
                $common = "/[".$user_personality."]/";
                if (preg_match($common, $other_personality) === 1){
                    $matches[] = $singles[$i];
                    if ($found){
?>
<strong>Matches for <?= $_GET["name"] ?></strong>
<br>
<br>
<?php
                        $found = FALSE;
                    }
?>
<div class="match">
<img src="./Pics/user.png" alt="photo"/>
<div>
<ul>
<li><p><?= $other_info[0] ?></p></li>
<li><strong>Gender:</strong> <?= $other_gender ?></li>
<li><strong>Age:</strong> <?= $other_age ?> </li>
<li><strong>Type:</strong> <?= $other_personality ?> </li>
<li><strong>OS:</strong> <?= $other_os ?></li>
</ul>
</div>
</div>
<?php
                }
            }
        }
    }
	}
}
?>
</div>
<?php
if (count($matches) === 0) {

?>
<div class="error">
No match is found.
<br> 
</div>
<?php
}
?>
<?php
}
//If error then print the type of error
else{
?>
<div class="error">
<h1>Error! Invalid data.</h1>
<p> We're sorry. You submitted invalid user information. Please go back and try to fix these issues.</p>
<ul id="ul1">
<?php
	foreach ($errors as $error){
?>
		<li><?= $error ?></li>
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