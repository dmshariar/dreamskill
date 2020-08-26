
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dream Skill</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>
    <?php
    $user = $_SESSION['email'];

   $get_user = "SELECT * from users where user_email='$user'";
   $run_user = mysqli_query($conn,$get_user);
   $row=mysqli_fetch_array($run_user);

   $user_name = $row['user_name'];
   $now = time();


    if($now > $_SESSION['expire'])
    {
        session_destroy();
        header("Location:index.php");
    }
  	?>
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="new.php">

                 Dream Skill
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="new.php">Home</a>
                    </li>
         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My skill <span class="caret"></span></a>
           <ul class="dropdown-menu" aria-labelledby="about-us">
             <li><a href="category.php">Add Category</a></li>
             <li><a href="mysk.php">Add my work</a></li>
           </ul>
         </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                   <li>
                        <a href="accset.php"><?php echo"$user_name";?></a>
                    </li>
                   <li>
                        <a href="logout.php">log out</a>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</nav>
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>

<!-- Custom Javascript -->
<script src="js/custom.js"></script>
  </body>
</html>
