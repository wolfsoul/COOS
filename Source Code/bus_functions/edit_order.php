<?php
	include '../db_functions/database.php';
	
	$connection=Connect();	

	if (strstr($_POST['status'],"ordered"))
	{
		$orderid=substr($_POST['status'], 7);
		$query = "UPDATE orders 
					SET order_status=\"for delivery\"
					WHERE order_id=$orderid";
	
	}
	else	 //status = "for delivery"
	{
		$orderid=substr($_POST['status'], 8);
		$query = "UPDATE orders 
					SET order_status=\"delivered\"
					WHERE order_id=$orderid";
	}
	
	if (!mysql_query( $query, $connection ))
		die( 'Error: ' . mysql_error() );

	header( 'Location: ../views/orders_management.php' ) ;
?>