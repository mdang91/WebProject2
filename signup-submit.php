<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link href="g4.css" type="text/css" rel="stylesheet" />
<link href="./Pics/icon.png" type="image/gif" rel="shortcut icon" />
</head>

<?php

//Variables to store the values from user
$username = $_POST['name'];
$userpass = $_POST['password'];
$nickname = $_POST['nickname'];

//Array to store user information
$user = array(
    'name' => '',
    'password' => '',
    'nickname' => ''
);

//Put value into array
if(isset($username)){
    $user['name'] = ($username);
}
if(isset($userpass)){
    $user['password'] = ($userpass);
}
if(isset($nickname)){
    $user['nickname'] = ($nickname);
}

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

//Nickname cannot be blank.
if ($nickname == ''){
    $errors[] = "Nickname must not be blank.";
}

//F5 page will resubmit data, function check if a name already in the system
$userlist = file("userlist.txt");
if ($username != ''){
	for ($i = 0; $i < count($userlist); $i++){
		$userdetail = strstr($userlist[$i], $username);
		if ($userdetail !== FALSE){
			break;
		}
	}
	if ($userdetail != ''){
		$errors[] = "User already in the system try to login instead.";
	}
}

						
//If no errors then start to write user into file
if (empty($errors)){
    $user_details = $user;
	$to_write = implode(",", $user_details);
	//Write to file
	file_put_contents("userlist.txt", PHP_EOL.$to_write, FILE_APPEND);
?>
<!-- Succesful sign up -->
<div class="div0">

<img src="./Pics/logo.png" alt="image" />

</div>
<div class="div1" >
<h1>Sign Up Succesful!</h1>
<br>
<p>Welcome to Group4, <?= $user["name"] ?>!</p>
<br>
<p>Now <a href="login.php">log in to start playing!</a></p>
</div>
<?php
}
else{
?>

<!-- Errors detected when filling form -->
<div class="div0">

<img src="./Pics/logo.png" alt="image" />

</div>
<div class="error">
<h1 id="h11">Error! Invalid data</h1>
<br>
<p id="p1">We're sorry. You submitted invalid user information. Please go back and try to fix these isssues:</p>
<br>
<ul id="ul1">
<?php
	foreach($errors as $error){
?>
		<li><?= $error ?> </li>
<?php 
	} 
?>
</ul>
<br>
<p id="p2"><a href="login.php">Login</a> <a href="signup.php">Sign Up</a> </p>
</div>
<?php
}
?>

</body>
</html>