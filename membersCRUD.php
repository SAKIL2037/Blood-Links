<?php
        $update= false;
        $name = "";
		$phone = "";
		$age = "";
		$date = "";
		$bloodgroup = "choose.....";
		$division = "choose.....";
		$district = "choose.....";
		$email = "";
		$password = "";
if(isset($_POST['save']))
{
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
	mysqli_query($connection,$query);
	header("location:members.php");
}
if(isset($_GET['delete']))
{
	
    include('connection.php');
	$id = $_GET['delete'];
	mysqli_query($connection, "CALL `deleteMemberInfo`('".$id."')");
	header("location:members.php");
	
}
if(isset($_GET['edit']))
{
	$id = $_GET['edit'];
	include('connection.php');
	$result = mysqli_query($connection, "CALL `editMemberInfo`(".$id.")");
	if(mysqli_num_rows($result) == 1)
	{
$update = true;
$row = mysqli_fetch_assoc($result);
		$name = $row['Name'];
		$phone = $row['Phone'];
		$age = $row['Age'];
		$date = $row['Date'];
		$bloodgroup = $row['BloodGroup'];
		$division = $row['Division'];
		$district = $row['District'];
		$email = $row['Email'];
		$password = $row['Password'];
	}
	
}
if(isset($_POST['update']))
{
	include('connection.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$date = $_POST['date'];
	$bloodgroup = $_POST['bloodgroup'];
	$division = $_POST['division'];
	$district = $_POST['district'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "CALL `updateMemberInfo`('".$id."','".$name."','".$phone."','".$age."','".$date."','".$bloodgroup."','".$division."','".$district."','".$email."','".$password."')";

	mysqli_query($connection,$query);
		header("location:members.php");
}
?>