<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Creperie Administrator Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
</head>

<body>
<div id="login">
	<form method="post" action="../db_functions/do_admin_login.php">
		<h2>Administrator Login</h2>
        <p>
        	<label for="name">Username: </label>
            <input type="text" name="username" id="username" />
        </p>
        
        <p>
        	<label for="pwd">Password: </label>
            <input type="password" name="password" id="password" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Login" name="submit" />
        </p>
    </form>
</div><!--end login-->
</body>
</html>