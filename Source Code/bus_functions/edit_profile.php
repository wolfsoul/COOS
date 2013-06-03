<?php
require_once 'db_functions/db_connect.php';
session_start();
if(isset($_SESSION['customer_username'])){
	$customer_username = $_SESSION['customer_username'];
}
else { echo "error:there is no active session"; }

$customer_name = $_POST["customer_name"];
$customer_surname = $_POST["customer_surname"];
$customer_address = $_POST["customer_address"];
$customer_floor = $_POST["customer_floor"];
$customer_phone = $_POST["customer_phone"];
$customer_username = $_POST["customer_username"];
$customer_password = $_POST["customer_password"];

$info_array = array("$customer_name","$customer_surname","$customer_address","$customer_floor","$customer_phone","$customer_username","$customer_password");

customer_update($info_array);//function poy dexetai san parametro ena array 
							 //kai pairnei ta stoixeia kai kanei update 
							 //ta antistoixa pedia stin vasi

							 
							 
							 
							 
mysql_close($connection);//kleinei tin sindesi me tin vasi
header('Location: user_profile.php');