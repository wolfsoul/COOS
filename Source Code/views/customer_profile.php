<?php 

include '../db_functions/users.php';
include '../db_functions/database.php';
session_start();
if(isset($_SESSION['id'])){
	$customer_id = $_SESSION['id'];
}
else { echo "error: there is no active session"; }
$connection=Connect();
$customer_info=ReturnInfobyID($_SESSION['id']);

$orders_result=execute_order_query($customer_id);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Profile Page </title>
    <link rel="stylesheet" type="text/css" href="../css/customer.css" />
	<!--  Table skin stylesheet  -->	
	<link rel="stylesheet" type="text/css" href="css/tables.css" />
</head>

<body>
	<header id="banner">
		<?php 
			echo "<h3 id=\"uid\">Καλωσορίσατε "; 
			echo $_SESSION['name']." ".$_SESSION['sname']." !<br/>"; 
			echo '<a href="../index.php">Επιστροφή στη Αρχική Σελίδα</a>';
		?>
    </header>
     
    <div id="info">
        <h2 id="info">Προφίλ Χρήστη</h2>
        <form action="../bus_functions/edit_user.php" id='edit_form' method="post">
           Όνομα : <input type="text" name="user_name" id="user_name"  VALUE="<?php echo $customer_info['customer_name']?>" maxlength="20"><br/>
           Επώνυμο : <input type="text" name="user_surname" id="user_surname"  VALUE="<?php echo $customer_info['customer_surname']?>" maxlength="25"><br/>
           Διεύθυνση : <input type="text" name="user_address" id="user_address" VALUE="<?php echo $customer_info['customer_address']?>" maxlength="40"><br/>
           Όροφος : <input type="text" name="user_floor" id="user_floor" VALUE="<?php echo $customer_info['customer_floor']?>" maxlength="3"><br/>
           Τηλέφωνο : <input type="text" name="user_phone" id="user_phone" VALUE="<?php echo $customer_info['customer_phone']?>" maxlength="15"><br/>
           Username : <input type="text" name="user_username" id="user_username" VALUE="<?php echo $customer_info['customer_username']?>" disabled="disabled" maxlength="15"><br/>
           Password : <input type="password" name="user_password" id="user_password" VALUE="<?php echo $customer_info['customer_password']?>" maxlength="5"><br/>
            <input type="submit" value="Αποθήκευση Αλλαγών">
        </form>
    </div>

    <div id="orders">
        <h2 id="orders">Καταχωρημένες Παραγγελίες</h2>
        <?php
			$i=0;
            $query="select * from orders where order_customer_id=". $_SESSION['id'];
            $result=mysql_query($query,$connection) or Die (mysql_error());
            echo"<form name=\"new_order\" action=\"../bus_functions/edit_order.php\" method=\"post\">
			<table id=\"t_order\">
				<colgroup>
					<col width=\"1\" />
					<col width=\"20\" />
					<col width=\"100\" />
					<col width=\"405\" />
					<col width=\"20\" />
					<col width=\"20\" />
				</colgroup>
			<th >
				<td id=\"head\">No.</td>
				<td id=\"head\">Ημέρα/ Ώρα</td>
				<td id=\"head\">Περιγραφή</td>
				<td id=\"head\">Κόστος</td>
				<td id=\"head\">Κατάσταση</td>
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
				echo"</td>
					<td id=\"withline\">".$row['order_total']."</td>
					<td id=\"withline\">".$row['order_status']."</td>
				</tr></form>";                                        
            }
			echo "</table>";
			?>
    <br />
	</div>

<?php mysql_close($connection);//kleinei tin sindesi me tin vasi ?>
</bosy>
</html>