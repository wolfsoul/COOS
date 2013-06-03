<?php 

session_start();
include '../db_functions/database.php';
$connection=Connect();

if (isset($_SESSION['id']))
{
	$query="INSERT INTO orders (order_customer_id, order_status, order_description,order_total)
			VALUES (".$_SESSION['id'].", 'ordered', '".$_POST['order_description']."', ".$_POST['total'].")";
	if (!mysql_query( $query, $connection ))
		die( 'Error: ' . mysql_error() );
	else
	{
		$value1="Order!";
		setcookie("cookie1",$value1,0,'/');
		$value2="Your&nbsp;order&nbsp;has&nbsp;been&nbsp;succesfuly&nbsp;recorded!&nbsp;Good&nbsp;Appetite!";
		setcookie("cookie2",$value2,0,'/');
		
		setcookie("cookie",1,0,'/');
	}
}
else
{
	//if(isset(b))
	{
		//first create a ghost user with the given info
		include '../db_functions/users.php';	
		customer_create($_POST["name"], $_POST["sname"], $_POST["street"],$_POST["floor"], $_POST["phone"],"","");
		$id=ReturnIDbyInfo($_POST["name"], $_POST["sname"], $_POST["street"],$_POST["floor"], $_POST["phone"]);
		// then send the order
		echo $id;
		$query="INSERT INTO orders (order_customer_id, order_status, order_description,order_total)
		VALUES ('".$id."', 'ordered', '".$_POST['order_description']."', ".$_POST['total'].")";
		
		if (!mysql_query( $query, $connection ))
			die( 'Error: ' . mysql_error() );	
		else
		{
			$value1="Order!";
			setcookie("cookie1",$value1,0,'/');
			$value2="Your&nbsp;order&nbsp;has&nbsp;been&nbsp;succesfuly&nbsp;recorded!&nbsp;Good&nbsp;Appetite!";
			setcookie("cookie2",$value2,0,'/');
			
			setcookie("cookie",1,0,'/');
		}
	}
	//else
		//sds
}

$connection=Disconnect();
header( 'Location: ../index.php' ) ;
?>