<?php
require 'conn.php';


	if(isset($_POST['sign_up'])){

	$name = $_POST['user_name'];
	$pass = $_POST['user_pass'];
	$email = $_POST['user_email'];
	$country = $_POST['user_country'];
	$gender = $_POST['user_gender'];

	if($name == ''){
		echo "<script>alert('We can not verify your name')</script>";
	}

	if(strlen($pass)<8){

	echo "<script>alert('Password should be minimum 8 characters!')</script>";
	exit();
	}

	$check_email = "SELECT * from users where user_email='$email'";
	$run_email = mysqli_query($conn,$check_email);

	$check = mysqli_num_rows($run_email);

	if($check==1){

	echo "<script>alert('Email already exist, please try another!')</script>";
	echo "<script>window.open('reg.php','_self')</script>";
	exit();
	}

	$insert = "INSERT INTO users (user_name, user_pass, user_email, user_country, user_gender) VALUES ('$name','$pass','$email','$country','$gender')";

	$query = mysqli_query($conn, $insert);

	if($query){

	echo "<script>alert('Congratulations $name, your account has been created successfully.')</script>";
	echo "<script>window.open('log.php','_self')</script>";

	}
	else {

	echo "<script>alert('Registration failed, try again!')</script>";
	echo "<script>window.open('reg.php','_self')</script>";
	}
}
?>
