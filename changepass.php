<!DOCTYPE html>
<?php
require 'conn.php';
session_start();
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dream Skill</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


	<?php
						require 'header2.php';
					 ?>

  <section class="intro">
    <div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2" >
            <?php
                $get_user = "SELECT * from users where user_email='$user'";
                $run_user = mysqli_query($conn,$get_user);
                $row=mysqli_fetch_array($run_user);

                $user_pass = $row['user_pass'];
            ?>
            <div class="col-lg-8 col-lg-offset-2">
              <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">
                      <tr align="center">
                        <td colspan="6" class="active"><h2>Change Password</h2></td>
                      </tr>

                      <tr>
                        <td style="font-weight: bold;">Current Password</td>
                        <td>
                        <input class="form-control" type="password" name="current_pass" id="mypass" required="required" placeholder="Current Password" />
                        </td>
                      </tr>

                      <tr>
                        <td style="font-weight: bold;">New Password</td>
                        <td>
                        <input class="form-control" type="password" name="u_pass1" id="mypass" required="required" placeholder="New Password" />
                        </td>
                      </tr>

                      <tr>
                        <td style="font-weight: bold;">Confirm Password</td>
                        <td>
                        <input class="form-control" type="password" name="u_pass2" id="mypass" required="required" placeholder="Confirm Password" />
                        </td>
                      </tr>

                      <tr align="center">
                        <td colspan="6">
                        <input class="btn btn-info" style="width: 250px;" type="submit" name="change" value="Change"/>
                        </td>
                      </tr>
                    </table>
                  </form>
                  <?php
                    if(isset($_POST['change'])){
                        $c_pass = $_POST['current_pass'];
                        $pass1 = $_POST['u_pass1'];
                        $pass2 = $_POST['u_pass2'];

                        $user = $_SESSION['email'];
                        $get_pass = "SELECT * from users where user_email='$user'";
                        $run_pass = mysqli_query($conn,$get_pass);
                        $row=mysqli_fetch_array($run_pass);

                        $user_password = $row['user_pass'];

                        if($c_pass !== $user_password){
                          echo"
                            <div class='alert alert-danger'>
                              <strong>Your old password didn't match </strong>
                            </div>
                          ";
                        }

                        if($pass1 != $pass2){
                          echo"
                            <div class='alert alert-danger'>
                              <strong>Your new password did't match with each other</strong>
                            </div>
                          ";
                        }
                        if($pass1 < 9 AND $pass2 < 9){
                          echo"
                            <div class='alert alert-danger'>
                              <strong>Use 9 or more than 9 characters</strong>
                            </div>
                          ";
                        }

                        if($pass1 == $pass2 AND $c_pass == $user_password){
                          $update_pass = mysqli_query($conn, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                          echo"
                            <div class='alert alert-danger'>
                              <strong>Your Password is changed</strong>
                            </div>
                          ";
                        }
                    }
                  ?>
                </div>
          </div>
    </div>
  </section>




  <div class="container-fluid">
        <div class="row promo">
        	<a href="programmer.php">
				<div class="col-md-4 promo-item item-1">
					<h3>
						How to be a programmer?
					</h3>
				</div>
            </a>
            <a href="market.php">
				<div class="col-md-4 promo-item item-2">
					<h3>
						What is digital marketing?
					</h3>
				</div>
            </a>

			<a href="graphic.php">
				<div class="col-md-4 promo-item item-3">
					<h3>
						How to be a Graphics designer?
					</h3>
				</div>
            </a>
        </div>
    </div><!-- /.container-fluid -->

	<!-- Content 3 -->
     <section class="content content-3">
        <div class="container">
			<h2 class="section-header"><br> Find freelance services for your business today<br></h2><br><br>
                    <a href="reg.php" class="btn btn-primary btn-lg">Get started</a>
            </div>
        </div>
    </section>

	<!-- Footer -->
    <footer class="page-footer">

    	<!-- Contact Us -->
        <div class="contact">
        	<div class="container">
				<h2 class="section-heading">Contact Us</h2>
				<p><span class="glyphicon glyphicon-envelope"></span><br> shahriyer35-2485@diu.edu.bd<br> nusrat35-2469@diu.edu.bd</p>
        	</div>
        </div>

    </footer>



</body>

</html>
