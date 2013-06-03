<?php 

include '../db_functions/database.php';
$connection=Connect();	
$query="DELETE FROM users WHERE user_id='".$_POST['user_id']."'";
if (!mysql_query( $query, $connection ))
	die( 'Error: ' . mysql_error() );
else
{
	$value="Delete&nbsp;User!";
	setcookie("cookie1",$value,0,'/');
	$value="User&nbsp;has&nbsp;been<p>succesfuly&nbsp;deleted!";
	setcookie("cookie2",$value,0,'/');
	
	setcookie("cookie",1,0,'/');
}	
	
header( 'Location: ../views/user_management.php' ) ;
?>