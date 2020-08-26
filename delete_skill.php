<?php
	include('conn.php');

	$id = $_GET['skill'];

	$sql="delete from skill where skillid='$id'";
	$conn->query($sql);

	header('location:mysk.php');
?>
