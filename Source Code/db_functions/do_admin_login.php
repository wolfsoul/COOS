 <?php
 	session_start();
    
    include ('users.php');
    include ('database.php');
    
    if ( !isset( $_POST[ 'username' ] ) || !isset( $_POST[ 'password' ] ) ) 
        die();
    
    Connect();
    //epistrofi tou user id gia mellontiki xrisi
    //elegxos yparxeis user
	
    $user = EmployeeRole( $_POST[ 'username' ], $_POST[ 'password' ] );
    if ( $user !== false ) 
    {
        $_SESSION[ 'role' ] = $user;
        if($user=="admin")
			header("location: ../views/back_office.php");
		else
			header("location: ../views/orders_management.php");
    }
	else
	{
	  	header('Location: ' . $_SERVER['HTTP_REFERER'].'?log-err=Username and password mismatch');	
	    die();
	}
?>