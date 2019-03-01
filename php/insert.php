<?php
	
	require_once('dbconfig.php');

	$_POST = json_decode(file_get_contents('php://input'), true);

	if (empty($_POST['name']))
		echo 'name empty';
		$name = $_POST['name'];
  
	if (empty($_POST['email']))
		echo 'email empty';
  		$email = $_POST['email'];

	if (empty($_POST['mblno']))
		echo 'contact empty';
		$mblno = $_POST['mblno'];	
	if (empty($_POST['sub_name']))
		echo 'subject name empty';
		$sub_name = $_POST['sub_name'];	
	

	$query = "INSERT into stuinfo_detail (name,email,mblno,sub_name) VALUES ('{$name}','{$email}','{$mblno}','{$sub_name}')";
	$result = mysqli_query($con,$query);
    $rows = mysqli_affected_rows($con);

	echo $json_response = json_encode($rows);
?>