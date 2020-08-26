<!DOCTYPE html>
<?php
session_start();
require "conn.php";
if(!isset($_SESSION['email'])){

	header("location: log.php");

}
else{ ?>
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

	<!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Hi <?php echo"$user_name";?></h1>
                <p>Don't Just Dream, Do. Freelance Services For The Lean Entrepreneur.</p>
                <a href="mysk.php" class="btn btn-primary btn-lg">Start now</a>
            </div>
        </div>
    </header>

	<!-- Intro Section -->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 class="section-heading">Our mission is to change how the world works together.</h2>
                    <p class="text-light">A complete guide that will teach you all you need to know about successfully starting your online business from home and find the flexibility and freedom you desire.</p>
                </div>
            </div>
        </div>
				<div class="container">
            <div class="row">
              <h1 class="page-header text-center">POST</h1>
<ul class="nav nav-tabs">
  <?php
    $sql="select * from category order by categoryid asc limit 1";
    $fquery=$conn->query($sql);
    $frow=$fquery->fetch_array();
    ?>
      <li class="active"><a data-toggle="tab" href="#<?php echo $frow['catname'] ?>"><?php echo $frow['catname'] ?></a></li>
    <?php

    $sql="select * from category order by categoryid asc";
    $nquery=$conn->query($sql);
    $num=$nquery->num_rows-1;

    $sql="select * from category order by categoryid asc limit 1, $num";
    $query=$conn->query($sql);
    while($row=$query->fetch_array()){
      ?>
      <li><a data-toggle="tab" href="#<?php echo $row['catname'] ?>"><?php echo $row['catname'] ?></a></li>
      <?php
    }
  ?>
</ul>

<div class="tab-content">
  <?php
    $sql="select * from category order by categoryid asc limit 1";
    $fquery=$conn->query($sql);
    $ftrow=$fquery->fetch_array();
    ?>
      <div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
        <?php

          $sql="select * from skill where categoryid='".$ftrow['categoryid']."'";
          $sfquery=$conn->query($sql);
          $inc=4;
          while($sfrow=$sfquery->fetch_array()){
            $inc = ($inc == 4) ? 1 : $inc+1;
            if($inc == 1) echo "<div class='row'>";
            ?>
              <div class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <b><?php echo $sfrow['skillname']; ?></b>
                  </div>
                  <div class="panel-body">
                    <img src="<?php if(empty($sfrow['photo'])){echo "upload/noimage.jpg";} else{echo $sfrow['photo'];} ?>" height="225px;" width="100%">
                  </div>
                  <div class="panel-footer text-center">
                    <b><?php echo $sfrow['dis']; ?></b>
                  </div>
                </div>
              </div>
            <?php
            if($inc == 4) echo "</div>";
          }
          if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
          if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
          if($inc == 3) echo "<div class='col-md-3'></div></div>";
        ?>
        </div>
    <?php

    $sql="select * from category order by categoryid asc";
    $tquery=$conn->query($sql);
    $tnum=$tquery->num_rows-1;

    $sql="select * from category order by categoryid asc limit 1, $tnum";
    $cquery=$conn->query($sql);
    while($trow=$cquery->fetch_array()){
      ?>
      <div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">
        <?php

          $sql="select * from skill where categoryid='".$trow['categoryid']."'";
          $pquery=$conn->query($sql);
          $inc=4;
          while($prow=$pquery->fetch_array()){
            $inc = ($inc == 4) ? 1 : $inc+1;
            if($inc == 1) echo "<div class='row'>";
            ?>
              <div class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading text-center">
                    <b><?php echo $srow['skillname']; ?></b>
                  </div>
                  <div class="panel-body">
                    <img src="<?php if($srow['photo']==''){echo "upload/noimage.jpg";} else{echo $srow['photo'];} ?>" height="225px;" width="100%">
                  </div>
                  <div class="panel-footer text-center">
                    &#x20A8; <?php echo number_format($srow['price'], 2); ?>
                  </div>
                </div>
              </div>
            <?php
            if($inc == 4) echo "</div>";
          }
          if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>";
          if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>";
          if($inc == 3) echo "<div class='col-md-3'></div></div>";
        ?>
        </div>
      <?php
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
                    <a href="#" class="btn btn-primary btn-lg">Get started</a>
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
<?php } ?>
