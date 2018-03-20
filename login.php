<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<style>
		#message {
    display:none;
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding: 20px;
    margin-top: 10px;
}
	</style>
</head>
<body>
	<main>
	<div style="margin-left:45%;">
 <a href="index.html"><img src="img/bubble.png" height="5%" width="25%" style="margin-top:10px;"></a>
 </div>
		<div class="buttons login-button-active" data-action="animated">
			<button type="button" class="login-button">
				<span class="log-link login-button-active" data-action="animated">Login</span>
				<span class="login-underline login-button-active" data-action="animated"></span>
			</button>
			<button type="button" class="signup-button">
				<span class="sign-link" data-action="animated">Sign Up</span>
				<span class="signup-underline login-button-active" data-action="animated"></span>
			</button>
		</div>
		<div class="forms">
			<form class="login-form login-button-active" action="j.php" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email and password for login.</legend>
					<label for="login-email">E-mail</label>
					<input id="login-email" type="email" name="email" required>
					<label for="login-password">Password</label>
					<input id="login-password" type="password" name="password" required>
				</fieldset>
				<input type="submit" name="login_btn" value="Login">
			</form>
			<form class="signup-form" action="#" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email, password and password confirmation for sign up.</legend>
					<label for="signup-username">Username</label>
					<input id="signup-username" type="text" name="username" required>
					<label for="signup-email">E-mail</label>
					<input id="signup-email" type="email" name="email" required>
					<label for="signup-password">Password</label>
					<input id="signup-password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
					<label for="signup-confirm-password">Confirm password</label>
					<input id="signup-confirm-password" type="password" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters with same as Password" required>
				</fieldset>
				<input type="submit" name="register_btn" value="Continue">
			</form>
		</div>
	</main>
	<script src="js/script.js" type="text/javascript">
		var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
	</script>
</body>
</html>
<?php
     session_start();
	 if(isset($_POST['register_btn'])){
     ini_set('display_errors', '1');
	 $db = mysqli_connect("localhost","root","root","search");
	      $username = mysqli_real_escape_string($db,$_POST['username']);
	      $email = mysqli_real_escape_string($db,$_POST['email']);
	      $password = mysqli_real_escape_string($db,$_POST['password']);
	      $c_password = mysqli_real_escape_string($db,$_POST['cpassword']);

	 if ($password == $c_password) {
	 	 //create user
       $password = sha1($password);
        $sql = "INSERT INTO login(username, email, password) VALUES ('$username', '$email', '$password')";
        if(mysqli_query($db,$sql)){
        	//write the mail function here.
        	$subject = "Your Complaint has been filed successfully!";
        	$msg = "We have received your complaint!\nWe will be trying to resolve it ASAP,Thank You!";
        	$msg = wordwrap($msg,70);
        	mail($email,$subject,$msg);
		echo "<script>alert('You have registered successfully! Please login now.')</script>";
	}
       // $_SESSION['message'] = "You have successfully logged in!";
        //$_SESSION['username'] = $username;
      else { 
				echo "<script>alert('username already exist')</script>";
				//header("location: login.php"); 
	  }
	  //redirecting user to add his Site URL
	 }else{
	 	//failed
	 	//$_SESSION['message'] = "The two passwords do not match";
		echo "<script>alert('passwords did not match make sure they are equal')</script>";
	 }
}

?>