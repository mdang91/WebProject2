<?php session_start(); /* Starts the session */
	
/* Check Login form submitted */	
if(isset($_POST['Submit'])){
	$userlist = file("userlist.txt");
	print_r($userlist);
	$credentials = array();
	
	foreach($userlist as $userlist){
		if(empty($userlist)) continue;

    $userArr = explode(',', $userlist);

    //get username
    $username = explode(',', $userArr[0]);
    $username = array_pop($username);

    //get password
    $password = explode(',', $userArr[1]);
    $password = array_pop($password);
	
    // putting them together
    $credentials[$username] = $password;
	
}

	$logins = $credentials;
		
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		
		/* Check Username and Password existence in defined array */		
		if (isset($logins[$Username]) && $logins[$Username] == $Password){
			/* Success: Set session variables and redirect to Protected page  */
			$_SESSION['UserData']['Username'] = $logins[$Username];
			$userlist1 = file("userlist.txt");
			foreach($userlist1 as $user){
				if(strpos($user, $Username) !== false){
			
			$userArr1 = explode(',', $user);
			
			//get username
			$username1 = explode(',', $userArr1[0]);
			$username1 = array_pop($username1);

			//get password
			$password1 = explode(',', $userArr1[1]);
			$password1 = array_pop($password1);
			
			$nickname1 = explode(',', $userArr1[2]);
			$nickname1 = array_pop($nickname1);
			}
			}
			$_SESSION['Nickname'] = $nickname1;
			header("location:index.php");
			exit;
		} else {

			/*Unsuccessful attempt: Set error message */
			$msg="<span style='color:red'>Invalid Login Details</span>";
		}
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Game4U Login</title>	
<link href="./css/style.css" rel="stylesheet">
<link href="game4u.css" type="text/css" rel="stylesheet" />
<link href="./Pics/heart.png" type="image/gif" rel="shortcut icon" />
</head>
<body>
<div class="div0">
<img src="./Pics/logo.png" alt="image" />

</div>
<form action="" method="post" name="Login_Form">
<table class="table1" width="400" border="0" align="center" cellpadding="5" cellspacing="1">
    <?php if(isset($msg)){?>
    <tr>
		<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
		<td colspan="2" align="center" valign="top"><h3>Login</h3></td>
    </tr>
	
    <tr>
		<td align="right" valign="top">Username:</td>
		<td><input name="Username" type="text" class="Input"></td>
    </tr>
	
    <tr>
		<td align="right">Password:</td>
		<td><input name="Password" type="password" class="Input"></td>
    </tr>
	
    <tr>
		<td colspan="2" align="center" valign="top">
		<input name="Submit" type="submit" value="Login" class="Button3"></td>
    </tr>
	
	<tr>
	<td colspan="2" align="center" valign="top">
		<p style="margin:0; font-size:10pt; padding-top:20px;">(If you don't have an account)</p></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center" valign="top">
		<a href="signup.php">Sign Up</a>
	</tr>
</table>
</form>
</body>
</html>