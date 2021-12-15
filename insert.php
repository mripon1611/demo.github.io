<?php
	include 'dbconnection.php';
	$userId=$_POST['userId'];
	$title=$_POST['title'];
	$body=$_POST['body'];
	$sql = "INSERT INTO `userpost`( `id`, `userId`, `title`, `body`) 
	VALUES ('',$userId,'$title','$body')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>