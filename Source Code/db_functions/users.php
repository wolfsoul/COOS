<?php
/* functions gia ontotites users , customers */

//Elegxos iparksis xristi

function CheckUserExist( $username )
{
	$checkUser = "SELECT user_name FROM users WHERE user_name = '$user_name' LIMIT 1";
	$result = mysql_query( $checkUser );
	$exist = ( mysql_num_rows( $result ) == 1);
	return $exist;
}


// Dimiourgia xristi ( ipallilou )
function user_create($user_name, $user_surname, $user_address,$user_email, $user_phone,$user_username,$user_password,$user_role)
{            
               
	$userCreate = "INSERT INTO users( user_name, user_surname, user_address,user_email, user_phone,user_username,user_password,user_role) 
	VALUES ('$user_name', '$user_surname', '$user_address','$user_email', '$user_phone','$user_username','$user_password','$user_role')";
    $result = mysql_query( $userCreate );
	if ( !$result )
        die ( 'Database error : ' . mysql_error() );
	else
	{
		$value1="Welcome!";
		setcookie("cookie1",$value1,0,'/');
		$value2="Your&nbsp;Registration&nbsp;has&nbsp;been<p>succesfuly&nbsp;completed!";
		setcookie("cookie2",$value2,0,'/');
		
		setcookie("cookie",1,0,'/');
	}
      
    
    return $result;
}
// Dimiourgia xristi ( pelati )
function customer_create($customer_name, $customer_surname, $customer_address,$customer_floor, $customer_phone,$customer_username,$customer_password)
{            
               
	$customerCreate = "INSERT INTO customers( customer_name, customer_surname, customer_address,customer_floor, customer_phone,customer_username,customer_password,customer_confirmed)
	VALUES ('".$customer_name."', '".$customer_surname."', '".$customer_address."', '".$customer_floor."','".$customer_phone."','".$customer_username."','".$customer_password."','No')";
    $result = mysql_query( $customerCreate );
	if ( !$result )
        die ( 'Database error : ' . mysql_error() );
	else
	{
		$value="Welcome!";
		setcookie("cookie1",$value,0,'/');
		$value="Your&nbsp;registration&nbsp;has&nbsp;been<p>succesful!&nbspGood&nbsp;Appetite!";
		setcookie("cookie2",$value,0,'/');
		
		setcookie("cookie",1,0,'/');
	}
    return $result;
}

// επιβεβαίωση ότι υπάρχει χρήστης με αυτό το username και password
function verify_Username_and_Pass($un, $pwd, $conn)
{	
	$query = "SELECT * FROM customers WHERE customers_username = ? AND customers_password = ? LIMIT 1";
					
	if($result = $conn->prepare($query)) 
	{
		$result->bind_param('ss', $un, $pwd);
		$result->execute();
		if($result->fetch()) 
		{
			$result->close();
			$row = mysql_fetch_array($result);
			return $row;
		}
		else
		{
			header("Location: http://www.example3.com/");
			return "";
		}
	}	
}

/* 	h synarthsh auth einai ypeythynh gia thn pragmatopoihsh ths diadikasias login
	arithmos orismatwn: 2
	typos orismatwn: user_name, password
	epistrefomenh timh: to user_id, false ean to password kai to username einai lathos
*/

function AuthenticateUser( $username, $password )
{
	 
$authentication = "SELECT customer_id, customer_password FROM customers WHERE customer_username = '$username' AND customer_password = '$password'";
$result = mysql_query( $authentication );
        
$check =  mysql_num_rows( $result );

if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima
	
{
	$user = mysql_fetch_array( $result, MYSQL_ASSOC );
	return $user[ 'customer_id' ];
}
        
return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false
}

function ReturnInfo($username, $password )
{
	$authentication = "SELECT * FROM customers WHERE customer_username = '$username' AND customer_password = '$password'";
	$result = mysql_query( $authentication );
			
	$check =  mysql_num_rows( $result );
	
	if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima
		
	{
		$user = mysql_fetch_array( $result, MYSQL_ASSOC );
		return $user[ 'customer_name' ].",".$user[ 'customer_surname' ].",".$user[ 'customer_address'].",".$user[ 'customer_floor'].",".$user[ 'customer_phone'];
	}
			
	return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false
}

function ReturnInfobyID($id )
{
	$authentication = "SELECT * FROM customers WHERE customer_id = '$id'";
	$result = mysql_query( $authentication );
			
	$check =  mysql_num_rows($result);
	
	if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima	
	{
		$user = mysql_fetch_array( $result, MYSQL_ASSOC );
		return $user;
	}		
	return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false
}

function ReturnIDbyInfo($name,$sname,$street,$floor,$phone)
{
	$authentication = "SELECT customer_id 
						FROM customers 
						WHERE customer_surname = '$sname' AND customer_name = '$name' 
								AND	customer_address = '$street' AND	customer_floor = '$floor' 
								AND customer_phone = '$phone'";
	echo $authentication."<br/>";
	$result = mysql_query( $authentication );
			
	$check =  mysql_num_rows($result);
	if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima	
	{
		$userid = mysql_fetch_array( $result, MYSQL_ASSOC );		
		return $userid['customer_id'];
	}		
	else
		return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false
}

function execute_order_query($id)
{
	$authentication = "SELECT * FROM orders WHERE order_customer_id = '$id'";
	$result = mysql_query( $authentication );
			
	$check =  mysql_num_rows($result);
	
	if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima	
	{
		$order = mysql_fetch_array( $result, MYSQL_ASSOC );
		return $order;
	}		
	return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false	
}

function EmployeeRole( $username, $password )
{
	$authentication = "SELECT user_role FROM users WHERE user_username = '$username' AND user_password = '$password'";
	$result = mysql_query( $authentication );		
	$check =  mysql_num_rows( $result );
	if ( $check == 1 ) //ean exei epistrafei ena record apo to proigoumeno erwtima	
	{
		$user = mysql_fetch_array( $result, MYSQL_ASSOC );
		return $user[ 'user_role' ];
	}       
	return false; //ean to proigoumeno erwtima den epestrepse kati, epestrepse false
}

function logout() {
	session_start();
	session_unset();
	session_destroy();
    
}


// I sinartisi epistrefei ton arithmo pelatwn
function FetchCustomersSum()
{
	$fetchCustomersSumQuery = "SELECT count(*) as sum_pelaton from customers";
	$result = mysql_query ( $fetchCustomersSumQuery );
	    
    return $result;
}
//I sinartisi epistrefei ton arithmo paraggeliwn
function FetchOrdersSum()
{
	$fetchOrdersSumQuery = "select count(*) as sum_paraggelion from orders";
	$result = mysql_query ( $fetchOrdersSumQuery );
	    
    return $result;
}
//I sinartisi epistrefei tis paraggelies
function FetchOrderDes()
{
	$fetchOrderDesQuery = "select order_description as order_des ,order_datetime as order_time , order_status as order_stat from orders";
	$result = mysql_query ( $fetchOrderDesQuery );
	    
    return $result;
}

//I sinartisi epistrefei ta esoda
function FetchIncome()
{
	$fetchOrderDesQuery = "SELECT SUM(order_total) as sum FROM orders";
	$result = mysql_query ( $fetchOrderDesQuery );
	    
    return $result;
}
?>