<!DOCTYPE html>
<?php
session_start();
require 'conn.php';
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


  <!-- Navigation -->
	<?php
	 if(isset($_GET['user_name'])){
	  global $conn;
	  $get_username = $_GET['user_name'];
	  $get_user = "SELECT * FROM users WHERE user_name='$get_username'";
	  $run_user = mysqli_query($conn,$get_user);
	  $row_user = mysqli_fetch_array($run_user);
	  $username = $row_user['user_name'];
	}
	?>

	<?php
						require 'header2.php';
					 ?>


  <!-- Intro Section -->
  <section class="intro">
    <div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <span class="glyphicon glyphicon-apple" style="font-size: 60px"></span>
          <div>
	<h1 class="page-header text-center">Your Skills</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Skills</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Photo</th>
				<th>Skill Name</th>
				<th>Discription</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE skill.categoryid = $catid";
					}
					$sql="select * from skill left join category on category.categoryid=skill.categoryid $where order by skill.categoryid asc, skillname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['skillname']; ?></td>
							<td><?php echo $row['dis']; ?></td>
							<td>
								<a href="#editproduct<?php echo $row['skillid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['skillid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('skill_modal.php'); ?>
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'mysk.php';
			}
			else
			{
				window.location = 'mysk.php?category='+$(this).val();
			}
		});
	});
</script>
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
