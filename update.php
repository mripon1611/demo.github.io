<?php
	include 'dbconnection.php';
	$id=$_POST['id'];
	$title=$_POST['title'];
	$body=$_POST['body'];
	$sql = "UPDATE `userpost` SET title='$title', body='$body' WHERE id = $id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>