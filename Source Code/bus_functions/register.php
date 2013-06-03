<?php
require_once 'db_functions/db_connect.php';
session_start();

if ($_POST["register_type"] == "user") {
//echo "user";
$user_name = $_POST["user_name"];
$user_surname = $_POST["user_surname"];
$user_address = $_POST["user_address"];
$user_email = $_POST["user_email"];
$user_phone = $_POST["user_phone"];
$user_username = $_POST["user_username"];
$user_password = $_POST["user_password"];
$user_role = $_POST["user_role"];

$info_array = array("$user_name","$user_surname","$user_address","$user_email","$user_phone","$user_username","$user_password","$user_role");

user_create($info_array);//function pou pairnei san parametro ena array kai 
						   //kanei insert sti vasi ta stoixeia new user

$_SESSION['user_username']=$user_username; 
}
else if ($_POST["register_type"] == "customer") {
//echo "customer";
$customer_name = $_POST["customer_name"];
$customer_surname = $_POST["customer_surname"];
$customer_address = $_POST["customer_address"];
$customer_floor = $_POST["customer_floor"];
$customer_phone = $_POST["customer_phone"];
$customer_username = $_POST["customer_username"];
$customer_password = $_POST["customer_password"];

$info_array = array("$customer_name","$customer_surname","$customer_address","$customer_floor","$customer_phone","$customer_username","$customer_password");

customer_create($info_array);//function pou pairnei san parametro ena array kai 
							   //kanei insert sti vasi ta stoixeia new customer

$_SESSION['customer_username']=$customer_username;



}
else { echo "error"; }


//-------------------------------------------------------------
/*$sql="INSERT INTO customers (customer_surname, customer_name, customer_address, customer_floor, customer_phone, customer_username, customer_password, customer_confirmed)
VALUES
('$customer_surname', '$customer_name', '$customer_address', '$customer_floor', '$customer_phone','$customer_username','$customer_password','No')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
*/  //grammes sql pou xrisimopoihsa gia na testarw tin eisagwgi new customer
//-------------------------------------------------------------
mysql_close($connection);//kleinei tin sindesi me tin vasi
header('Location: user_profile.php');//mas metaferei stin selida user_profile.php













?>