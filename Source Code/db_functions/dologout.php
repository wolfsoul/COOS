<?php
include ('users.php');
include ('database.php');


Connect();

logout();

//$_SESSION['userid']="";
header("Location: ../index.php");

?>