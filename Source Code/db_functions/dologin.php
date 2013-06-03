 <?php
//O CONTROLLER AYTOS XRISIMOPOIEITAI GIA THN EDRAIWSH TWN SESSION VARIABLES META APO EPITIXIMENO LOGIN

 	session_start();
    
    include ('users.php');
    include ('database.php');
    
    if ( !isset( $_POST[ 'username' ] ) || !isset( $_POST[ 'password' ] ) ) 
    {
        die();
    }
   
    
    Connect();
    //epistrofi tou user id gia mellontiki xrisi
    //elegxos yparxeis user
    $customerid = AuthenticateUser( $_POST[ 'username' ], $_POST[ 'password' ] );
  	$returned = ReturnInfo($_POST[ 'username' ], $_POST[ 'password' ] );
	$info = explode(",", $returned);

    if ( $customerid !== false ) 
    {
        $_SESSION[ 'id' ] = $customerid;
		$_SESSION['role'] = "customer";
        $_SESSION[ 'name' ] = $info[0];
		$_SESSION[ 'sname' ] = $info[1];
		$_SESSION[ 'address' ] = $info[2];
		$_SESSION[ 'floor' ] = $info[3];
		$_SESSION[ 'phone' ] = $info[4];
		
		$value1="Welcome!";
		setcookie("cookie1",$value1,0,'/');
		$value2="Welcome&nbsp;back&nbsp;to&nbsp;our&nbsp;site";
		setcookie("cookie2",$value2,0,'/');
		
		setcookie("cookie",1,0,'/');

        header('Location: ' . $_SERVER['HTTP_REFERER']);//anakateuthinsi tou xristi sto simeio opou vriskotan
    }

   if( $customerid == false )
	{
	  	header('Location: ' . $_SERVER['HTTP_REFERER'].'?log-err=Username and password mismatch');	
	    die();
	}
	   
	
	
    
    
?>