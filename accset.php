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
            </div>
            <?php
                $get_user = "SELECT * from users where user_email='$user'";
                $run_user = mysqli_query($conn,$get_user);
                $row=mysqli_fetch_array($run_user);

                $user_name = $row['user_name'];
                $user_pass = $row['user_pass'];
                $user_email = $row['user_email'];
                $user_country = $row['user_country'];
                $user_gender = $row['user_gender'];
            ?>
            <div class="col-lg-8 col-lg-offset-2" >
              <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">
                      <tr align="center">
                        <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
                      </tr>
                      <tr>
                        <td style="font-weight: bold;">Change Your Username</td>
                        <td>
                        <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_name;?>"/>
                        </td>
                      </tr>


                      <tr>
                        <td style="font-weight: bold;">Email</td>
                        <td>
                        <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_email;?>"></td>
                      </tr>

                      <tr>
                        <td style="font-weight: bold;">Country</td>
                        <td>
                        <select class="form-control" name="u_country">
                          <option><?php echo $user_country;?></option>
                          <option>Bangladesh</option>
                  				<option>Us</option>
                  				<option>India</option>
                  				<option>UK</option>
                  				<option>Australia</option>
                        </select>
                        </td>
                      </tr>

                      <tr>
                        <td style="font-weight: bold;">Gender</td>
                        <td>
                        <select class="form-control" name="u_gender">
                          <option><?php echo $user_gender;?></option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                        </select>
                        </td>
                      </tr>


                      <tr><td></td><td><a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="changepass.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></td></tr>

                      <tr align="center">
                        <td colspan="6">
                        <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Update"/>
                        </td>
                      </tr>
                    </table>
                  </form>
                  <?php

                    if(isset($_POST['update'])){

                    $user_name = htmlentities($_POST['u_name']);
                    $email = htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);


                    $update = "UPDATE users set user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' where user_email='$user'";

                    $run = mysqli_query($con,$update);

                    if($run){
                        echo "<script>window.open('accset.php','_self')</script>";
                    }
                  }

                  ?>
            </div>
            <div class="col-sm-2">
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
