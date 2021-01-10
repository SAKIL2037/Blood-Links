<?php


        $update= false;
        $name = "";
		$phone = "";
		$bbq =0;
		$address = "";
	

if(isset($_POST['save']))
{
	include('connection.php');

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$bbq = $_POST['bbq'];
	$address = $_POST['address'];
	
    
	$query = "CALL `insertBloodBankInfo`('".$name."','".$phone."',".$bbq.",'".$address."')";

    
	mysqli_query($connection,$query);

	header("location:bloodBank.php");

}


if(isset($_POST['send']))
{
	include('connection.php');


	$frbb = $_POST['frbb'];
	$trbb = $_POST['trbb'];
	$qbb = $_POST['qbb'];
    
	$query = "CALL `updateQuantity`(".$frbb.",".$trbb.",".$qbb.")";

    
	mysqli_query($connection,$query);

	header("location:bloodBank.php");

}

if(isset($_GET['delete']))
{
	
    include('connection.php');
	$id = $_GET['delete'];
	mysqli_query($connection, "CALL `deleteBloodBankInfo`('".$id."')");
	header("location:bloodBank.php");
	
}

if(isset($_GET['edit']))
{
	$id = $_GET['edit'];
	   include('connection.php');
	$result = mysqli_query($connection, "CALL `editBloodBankInfo`(".$id.")");
	if(mysqli_num_rows($result) == 1)
	{
        $update = true;
        $row = mysqli_fetch_assoc($result);
		$name = $row['Name'];
		$phone = $row['Phone'];
		$bbq = $row['BBQ'];
		$address = $row['Address'];
		
	}
	
}

if(isset($_POST['update']))
{
	include('connection.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$bbq = $_POST['bbq'];
	$address = $_POST['address'];


	mysqli_query($connection,"CALL `updateBloodBankInfo`('".$id."','".$name."','".$phone."',".$bbq.",'".$address."')");

		header("location:bloodBank.php");
}


?>