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

  <!-- Header -->


  <!-- Intro Section -->
  <section class="intro">
    <div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div>
						<h1 class="page-header text-center">CATEGORY LIST</h1>
						<div class="row">
							<div class="col-md-12">
								<a href="#addcategory" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Category</a>
							</div>
						</div>
						<div style="margin-top:10px;">
							<table class="table table-striped table-bordered">
								<thead>
									<th>Category Name</th>
									<th>Action</th>
								</thead>
								<tbody>
									<?php
										$sql="select * from category order by categoryid asc";
										$query=$conn->query($sql);
										while($row=$query->fetch_array()){
											?>
											<tr>
												<td><?php echo $row['catname']; ?></td>
												<td>
													<a href="#editcategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deletecategory<?php echo $row['categoryid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
													<?php include('category_modal.php'); ?>
												</td>
											</tr>
											<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<?php include('modal.php'); ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Content 1 -->


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
