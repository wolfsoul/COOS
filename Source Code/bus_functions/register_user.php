<?php
	session_start();
	
	include '../db_functions/database.php';
	include '../db_functions/users.php';
	
	$connection=Connect();	
	if(	$_SESSION['role']=="admin")  // the user we are going to mofify is an employee
	{		
		user_create($_POST["user_name"], $_POST["user_surname"], $_POST["user_address"], $_POST["user_email"], $_POST["user_phone"], $_POST["user_username"],$_POST["user_password"],$_POST["user_role"]);
	}
	else  // the user we are going to mofify is a customer
	{
		customer_create($_POST["user_name"], $_POST["user_surname"], $_POST["user_address"],$_POST["user_floor"], $_POST["user_phone"], $_POST["user_username"],$_POST["user_password"]);
	}	

	if(	$_SESSION['role']=="admin")
		header( 'Location: ../views/user_management.php' ) ;
	else
		header( 'Location: ../index.php' ) ;

?>