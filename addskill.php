<?php
require 'conn.php';

	$sname=$_POST['sname'];
	$dis=$_POST['dis'];
	$category=$_POST['category'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}

	$sql="insert into skill (skillname, categoryid, dis, photo) values ('$sname', '$category', '$dis', '$location')";
	$conn->query($sql);

	header('location:mysk.php');

?>
