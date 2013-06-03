<?php
if (!empty($_SESSION['userid'] ) )
    {
	?>
    <div class="after-login">
	Hello, <a href="user.php"><?php echo $_SESSION['username']; ?></a>
	<div class="friend-requests">
	<u><b>Friend Requests</u></b>
	<form action="something.php" method="POST">
		<input type="submit" name="acceptf" id="acceptbut"  value="Yes"/><input type="submit" name="denyf" id="denybut" value="No"/>
	</form>
	</div>
	<a href="dologout.php">Logout</a>
	</div>
<?php
	}
 ?>