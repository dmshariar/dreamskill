<?php
	include('conn.php');

	$id=$_GET['skill'];

	$sname=$_POST['sname'];
	$category=$_POST['category'];
	$dis=$_POST['dis'];

	$sql="select * from skill where skillid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}

	$sql="update skill set skillname='$sname', categoryid='$category', dis='$dis', photo='$location' where skillid='$id'";
	$conn->query($sql);

	header('location:mysk.php');
?>
