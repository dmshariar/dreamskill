<?php
session_start();

require "conn.php";

	if(isset($_POST['sign_in'])){

	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$select_user = "SELECT * FROM users WHERE user_email ='$email' AND user_pass ='$pass'";

	$query = mysqli_query($conn,$select_user);

	$check_user = mysqli_num_rows($query);


	if($check_user==1){

	$_SESSION['email']=$email;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (1 * 120) ; 


	$user = $_SESSION['email'];
	$get_user = "SELECT * FROM users WHERE user_email='$user'";
	$run_user = mysqli_query($conn,$get_user);
	$row=mysqli_fetch_array($run_user);

	$user_name = $row['user_name'];

	echo "<script>window.open('new.php?user_name=$user_name','_self')</script>";

}else if($email==0){
		echo "<div class='alert alert-danger'>
		  <strong>Check your email!</strong>
		</div>";
	}
	else if($pass==0) {
	echo "<div class='alert alert-danger'>
	  <strong>Check your password!</strong>
	</div>";
}else{
	echo "<div class='alert alert-danger'>
	  <strong>You don't have an account!</strong>
	</div>";
}

	}


?>
