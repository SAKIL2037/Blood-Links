<?php
	include('connection.php');

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$date = $_POST['date'];
	$bloodgroup = $_POST['bloodgroup'];
	$division = $_POST['division'];
	$district = $_POST['district'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "CALL `insertMemberInfo`('".$name."','".$phone."','".$age."','".$date."','".$bloodgroup."','".$division."','".$district."','".$email."','".$password."')";

	 $result = mysqli_query($connection,$query);

	if($result)
	{

			header("location:header.php");
			
	}
	else
	{
			$message = "registration incomplete.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";

	
	}

	
?>