<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
</head>

<body>
	<header id="banner">
		<?php 
			if($_SESSION['role']=="admin")
			{
				echo '<h3> <a href="../db_functions/dologout.php" style="font-size:35px;">Log Out</a>';
				echo '      Καλωσορίσατε Διαχειριστή</h3>';
			}
			else
				header("location: ../bus_functions/secret_login.php?log-err=not_authorized_access");
		?>
        
   	</header>
    
    
            <div id="user">
                    <a href="../views/user_management.php">
                            <img src="../img/system-users.png" alt="Users" width="250" height="250" />              
                            <h2 id="user">User Management</h2>
                    </a>
            </div>
            
            <div id="materials">
                    <a href="../views/material_management.php">
                            <img src="../img/crepa.jpg" alt="Materials" width="250" height="250" />
                            <h2 id="materials">Materials</h2>
                    </a>
            </div>
            
            <div id="statistics">
                    <a href="../views/statistics.php">
                            <img src="../img/statistics-arrow.png" alt="Statistics" width="250" height="250" />
                            <h2 id="statistics">Statistics</h2>
                    </a>
            </div>
    
</body>
</html>