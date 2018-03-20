<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Form</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/layout2.css">
</head>
<body>
	<main>
	<div style="margin-left:45%;">
 <a href="index.html"><img src="img/bubble.png" height="5%" width="25%" style="margin-top:10px;"></a>
 </div>
		<div class="buttons login-button-active" data-action="animated">
			<button type="button" class="login-button">
				<span class="log-link login-button-active" data-action="animated">Feedback</span>
				<span class="login-underline login-button-active" data-action="animated"></span>
			</button>
			<button type="button" class="signup-button">
				<span class="sign-link" data-action="animated">Complaint</span>
				<span class="signup-underline login-button-active" data-action="animated"></span>
			</button>
		</div>
		<div class="forms">
			<form class="login-form login-button-active" action="#" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email and password for login.</legend>
					<label for="login-email">E-mail</label>
					<input id="login-email" type="email" name="email" required>
					<label for="login-password">Feedback</label>
					<input id="login-password" type="text" name="feedback" required>
				</fieldset>
				<input type="submit" name="feedback_btn" value="Submit">
			</form>
			<form class="signup-form" action="#" method="post" data-action="animated">
				<fieldset>
					<legend>Please, enter your email, password and password confirmation for sign up.</legend>
					<label for="signup-username">URL</label>
					<input id="signup-username" type="text" name="url" placeholder="Optional">
					<label for="signup-email">E-mail</label>
					<input id="signup-email" type="email" name="email" required>
					<label for="signup-password">Description</label>
					<input id="signup-password" type="text" name="description" required>
				</fieldset>
				<input type="submit" name="complaint_btn" value="Submit">
			</form>
		</div>
	</main>
	<script src="js/script.js" type="text/javascript"></script>
</body>
</html>
<?php
     session_start();
	 if(isset($_POST['feedback_btn'])){
     ini_set('display_errors', '1');
	 $db = mysqli_connect("localhost","root","root","search");
	      $feedback = mysqli_real_escape_string($db,$_POST['feedback']);
	      $email = mysqli_real_escape_string($db,$_POST['email']);

        $sql = "INSERT INTO feedback(email, feedback) VALUES('$email', '$feedback')";
        if(mysqli_query($db,$sql))
		echo "<script>alert('Thank you for your valuable feedback')</script>";
      else { 
				echo "<script>alert('error please try again after some time')</script>";
	  }
}
if(isset($_POST['complaint_btn'])){
     ini_set('display_errors', '1');
	 $db = mysqli_connect("localhost","root","root","search");
	      $description = mysqli_real_escape_string($db,$_POST['description']);
	      $email = mysqli_real_escape_string($db,$_POST['email']);
		   $url = mysqli_real_escape_string($db,$_POST['url']);

        $sql = "INSERT INTO complaint(email, description,url) VALUES('$email', '$description','$url')";
        if(mysqli_query($db,$sql))
		echo "<script>alert('Thank you we will get back to you soon!')</script>";
      else { 
				echo "<script>alert('Error please try again after some time!')</script>";
	  }
}
?>