<?php
	session_start();
	include '../db_functions/database.php';
	$connection=Connect();	

	$user_name = $_POST["user_name"];
	$user_surname = $_POST["user_surname"];
	$user_address = $_POST["user_address"];
	$user_phone = $_POST["user_phone"];
	$user_password = $_POST["user_password"];	
	if(	$_SESSION['role']=="admin")  // the user we are going to mofify is an employee
	{
		$user_id=$_POST['e_user_id'];
		$user_email = $_POST["user_email"];
		$user_role = $_POST["user_role"];
		$user_username = $_POST["user_username"];
		
		$query="UPDATE users SET user_name='".$user_name."', user_surname='".$user_surname."', user_address='".$user_address."',user_email='".$user_email."',user_phone='".$user_phone."',user_username='".$user_username."',user_password='".$user_password."',user_role='".$user_role."' where user_id='".$user_id."'";
	}
	else  // the user we are going to mofify is a customer
	{
		$user_id=$_SESSION['id'];	
		$user_floor=$_POST['user_floor'];

		$query="UPDATE customers SET customer_name='".$user_name."', customer_surname='".$user_surname."',  customer_address='".$user_address."',  customer_floor='".$user_floor."', customer_phone='".$user_phone."', customer_password='".$user_password."' where customer_id='".$user_id."'";
	}

	if (!mysql_query( $query, $connection ))
		die( 'Error: ' . mysql_error() );
	else
	{
		$value="User's&nbsp;modify!";
		setcookie("cookie1",$value,0,'/');
		$value="Your&nbsp;informations&nbsp;has&nbsp;been<p>
succesfuly&nbsp;updated!";
		setcookie("cookie2",$value,0,'/');
		
		setcookie("cookie",1,0,'/');
	}

	if(	$_SESSION['role']=="admin")
		header( 'Location: ../views/user_management.php' ) ;
	else
		header( 'Location: ../views/customer_profile.php' ) ;	
?>