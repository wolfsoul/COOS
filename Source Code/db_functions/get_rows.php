<?php
//include connection file
include('db_connect.php');
function get_rows($sql)
{
	$result=mysql_query($sql);
	$get_rows_array=mysql_fetch_array($result);
	$check=implode('',$get_rows_array);
	if (empty($check)) 
		{
			echo "Empty array";
		}
	else
		{
			return $get_rows_array();
		}
}



?>