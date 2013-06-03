<?php
if (!empty($_SESSION['customerid']))
    {
	?>
    <div class="after-login">
	Hello, <a href="user.php"><?php echo $_SESSION['username']; ?></a>
	<br>
	<a href="db_functions/dologout.php">Logout</a>
	</div>
<?php
    }
    else
    {
    ?>
				<div class="login-class" id="login-stretch">
								<form action="db_functions/dologin.php" method="POST">
									Username:<input type="text" name="username" id="username"  maxlength="15" />
									<br>
									Password:<input type="password" name="password" id="password" maxlength="5" />
									<br>
									<input type="submit" name="Submit" value="Login" />	
									<a href="./register.php">Register</a>
								</form>
				</div>
    <?php
    }
    ?>			