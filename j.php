<?php
session_start();
$connect= new mysqli("localhost", "root","root" ,"search");
if($connect->connect_error){
	die("connection failed");
}
$email=$_POST["email"];
$_SESSION['email'] = $email;
$password=$_POST["password"];
$password = sha1($password);
$sql="SELECT * FROM login WHERE email='$email' AND password='$password'";
$result=$connect->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		   header("Location: addSite.php");
	}
}
		else
			 header("Location: login.php");
?>


