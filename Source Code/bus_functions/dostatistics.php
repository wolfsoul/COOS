<?php
include ('../db_functions/users.php');
include ('../db_functions/database.php');

Connect();
echo "<div id=\"customer-class\">";
echo "<h2 id=\"customer-class\"> Πλήθος Πελατών</h2>";
$result = FetchCustomersSum();	  	
while ( $row = mysql_fetch_array( $result ) ) 	
{              	
    echo "Ο αριθμός πελατών είναι : $row[sum_pelaton]" ; 	
}	
echo "<br/><br/></div>";

echo "<div id=\"orders-class\">";
echo "<h2 id=\"orders-class\"> Πλήθος Παραγγελιών</h2>";
$result1 = FetchOrdersSum();	  	
while ( $row = mysql_fetch_array( $result1 ) ) 	
{             	
    echo "Ο αριθμός παραγγελιών είναι : $row[sum_paraggelion] " ;   	
}
echo "<br/><br/></div>";	
?>

<?php
echo "<div id=\"details-class\">";
echo "<h2 id=\"details-class\"> Πίνακας ενεργών Παραγγελιών</h2>";
$result2 = FetchOrderDes();	  	
echo "<table border=1><tr align=\"center\"><td colspan=\"3\"><u><b>Παραγγελίες</b></u></td></tr>";
echo "<tr align=\"center\"><td><b>Ώρα Παραγγελίας</b></td><td><b>Περιγραφή</b></td><td><b>Κατάσταση</b></td></tr>";
while ( $row = mysql_fetch_array( $result2 ) ) 	
{
	echo "<tr align=\"center\"><td>$row[order_time]</td>";
	echo "<td>$row[order_des]</td>" ;
	echo "<td>$row[order_stat]</td></tr>";
    
}
echo "</table>";
echo "<br/></div>";
?>

<?php
echo "<div id=\"money-class\">";
echo "<h2 id=\"money-class\"> Πίνακας Εσόδων</h2>";
$result3 = FetchIncome();	  	
while ( $row = mysql_fetch_array( $result3 ) ) 	
{             	
    $total="$row[sum]";
	echo "Τα έσοδα είναι : ".round($total,2)."€ !";   	
}
echo "</table>";
echo "<br/><br/></div>";
?>