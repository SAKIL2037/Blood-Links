<?php
	include('connection.php');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM member_info WHERE Email='$email' AND Password='$password'";

	$result = mysqli_query($connection, $query);

	$num_rows = 1;

	if($num_rows == mysqli_num_rows($result))
	{

			header("location:header.php");
			
	}
	else
	{
			header("location:index.php");

	
	}



?>