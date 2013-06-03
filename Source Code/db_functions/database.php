<?php
function Connect()
{
	
	$dbServer = 'localhost';
	//$dbPort = '3306';   Περιττό / Δεν χρησιμοποιείται
	$dbName = 'creperi';
	$dbUsername = 'root';
	$dbPassword = '';

	
	
	$conn = mysql_connect($dbServer, $dbUsername, $dbPassword);

	if (!$conn) 
	{
    	die('Could not connect to database: ' . mysql_error());
	}	


	$dbSelected = mysql_select_db($dbName, $conn);
	
	if (!$dbSelected) {
    	die('Database error : ' . mysql_error());
	}
	
	mysql_query("SET NAMES utf8"); // Για να εμφανίζονται τα ελληνικά σωστά
	return $conn;   // Επειδή η μεταβλητή $conn είναι local, χάνεται όταν τελιώνει η function και η πληροφορία χάνεται. Οπότε return
}


function Disconnect()
{
	mysql_close();
}

?>
