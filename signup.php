<!DOCTYPE html>
<html lang="en">
<!-- Sign up form -->
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link href="g4.css" type="text/css" rel="stylesheet" />
<link href="./Pics/icon.png" type="image/gif" rel="shortcut icon" />
</head>
<body>
<div class="div0">

<img src="./Pics/logo.png" alt="image" />

</div>

<div class="div2">
<form action="signup-submit.php" method="post" class="form1">
<fieldset>
<!-- Title -->
<legend>New User Sign Up</legend>
<br>

<!-- Name -->
<strong class="column">Username:</strong>
<input maxlength="23" name="name" size="20" type="text">
<br>
<br>


<!-- Password -->
<strong class="column">Password:</strong>
<input maxlength="23" name="password" size="20" type="text">
<br>
<br>

<!-- Nickname -->
<strong class="column">Nickname:</strong>
<input maxlength="23" name="nickname" size="20" type="text">
<br>
<br>

<input type="submit" value="Sign Up" class="signup">
</fieldset>
</form>
</div>

</body>
</html>