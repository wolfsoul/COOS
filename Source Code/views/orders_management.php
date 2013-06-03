<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	session_start(); 
	$i=0; 
	$j=0; 
	include '../db_functions/database.php'; 
    $connection=Connect();	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Επεξεργασία Παραγγελιών</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
    <script type="text/javascript">
		function submitform_new()
		{
			document.forms["new_order"].submit();
		}
		function submitform_ready()
		{
			document.forms["send_orders"].submit();
		}
	</script>
</head>

<body>
	<header id="banner">
		<?php echo '<h3><a href="../db_functions/dologout.php">Log Out</a></h3>'; ?>
   	</header>
    
    <div id="neworders">
           <h2 id="neworders">Νέες Παραγγελίες</h2>
           <?php
            $query="select * from orders where order_status='ordered'";
            $result=mysql_query($query,$connection) or Die (mysql_error());
            echo"<form name=\"new_order\" action=\"../bus_functions/edit_order.php\" method=\"post\">
			<table id=\"t_order\">
				<colgroup>
					<col width=\"1\" />
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"500\" />
					<col width=\"20\" />
				</colgroup>
			<th >
				<td id=\"head\">No.</td>
				<td id=\"head\">Ημέρα/ Ώρα</td>
				<td id=\"head\">Περιγραφή</td>
				<td id=\"head\">Ολοκληρώθηκε</td>
			</th>";
            while ($row = mysql_fetch_array($result)) 
            {
				$i++;
                echo "<tr>
						<td id=\"withline\"></td>
						<td id=\"withline\">".$i."</td>
						<td id=\"withline\">".$row['order_datetime']."</td><td id=\"withline\">";
				if (strstr($row['order_description'], '|') !== false) 
				{ 
				   // the order has many crepes
				   $k=0;
				   $crepes = explode("|",$row['order_description']);
				   echo "<table>";
				   for($k=0;$k<count($crepes);$k++)
				   		echo"<tr>".++$k." : ".$crepes[--$k]."<br/></tr>"; 
				   echo "</table>";
				} 
				else 
				{ 
				   // the order has only one crepe 
					echo $row['order_description'];
				}
				echo"</td><td id=\"withline\">
				<input type=\"checkbox\" name=\"status\" value=\"ordered".$row['order_id']."\"onclick=\"submitform_new()\"/></td>
					  </tr></form>";                                        
            }
			echo "</table>";
			?>
    <br />
    </div>
    
    <div id="ready" onclick="">
           <h2 id="ready">Έτοιμες Παραγγελίες</h2> 
           <?php
            $query="select order_id, customers.* from orders,customers 
					where order_status='for delivery' AND order_customer_id=customer_id;";
            $result=mysql_query($query,$connection) or Die (mysql_error());
            echo"<form id=\"send_orders\" action=\"../bus_functions/edit_order.php\" method=\"post\">
			<table id=\"t_order\">
				<colgroup>
					<col width=\"1\" />
					<col width=\"20\" />
					<col width=\"400\" />
					<col width=\"400\" />
					<col width=\"20\" />
				</colgroup>
			<th>
				<td  id=\"head\">No.</td>
				<td  id=\"head\">Πελάτης</td>
				<td  id=\"head\">Διεύθυνση</td>
				<td  id=\"head\">Στάλθηκε</td>
			</th>";
            while ($row = mysql_fetch_array($result)) 
            {
				$j++;
                echo "<tr>
						<td id=\"withline\"></td>
						<td id=\"withline\">".$j."</td>
						<td id=\"withline\">".$row['customer_name']." ".$row['customer_surname']."</td>
						<td id=\"withline\">".$row['customer_address']." Όροφος : ".$row['customer_floor']."</td>
						<td id=\"withline\">
						<input type=\"checkbox\" name=\"status\" value=\"delivery".$row['order_id']."\"onclick=\"submitform_ready()\"/></td>
					  </tr></form>";                                        
            }
			echo "</table></form>";
			?>
    <br />
    </div>
</body>
</html>
