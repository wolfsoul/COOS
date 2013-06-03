<?php

// επιλογή Βάσης Δεδομένων και συγγραφή του ερωτήματος sql
include("./db_functions/database.php");
$connection=Connect();
$query="select material_id,material_name,material_price,material_type from materials";
//----------------------------------------------------

// αρχικοποίηση μεταβλητών
$count_materials="";
$count_names="";
$count_prices="";
//----------------------------------------------------

// για τα τυριά
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Τυριά </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Cheese")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";

//-------------------------------------------------------------------------------------------------------------------

// για τα αλλαντικά
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
			<col width=\"20\" />
			<col width=\"200\" />
			<col width=\"100\" />
			<col width=\"130\" />
			<thead>
				<tr> <th align=\"Center\" colspan=4> Αλλαντικά </th> </tr>
				<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
			</thead>
			<tbody>";
				$counter=0;
				while ($row = mysql_fetch_array($result)) 
				{
					if ($row['material_type']=="Charcuterie")
					{
						$count_materials.="\"m".$row['material_id']."\",";
						$count_names.="\"".$row['material_name']."\",";
						$count_prices.="\"".$row['material_price']."\",";
						echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
						echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
							<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
							<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
							</td> 
						</tr>	";	
					}
				}
				echo "</tbody></table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

// για τις αλοιφές
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Αλοιφές </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Ointments")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

// για τα αλμυρά extras
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Αλμυρά Extras </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Sour_Extras")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

// για τις Πραλίνες
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Πραλίνες </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Chocolates")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

// για τα Specials
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Specials </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Specials")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

// για τα γλυκά Extras
$result=mysql_query($query,$connection) or Die (mysql_error());
echo "<div class=\"mat\">";
	echo "<table 	border=\"1\" id=\"inner\">
					<col width=\"20\" />
					<col width=\"200\" />
					<col width=\"100\" />
					<col width=\"130\" />
					<thead>
						<tr> <th align=\"Center\" colspan=4> Γλυκά Extras </th> </tr>
						<tr> <td>No.</td> <td>Υλικό</td> <td>Τιμή</td> <td>Ποσότητα</td> </tr>
					</thead>
					<tbody>";
						$counter=0;
						while ($row = mysql_fetch_array($result)) 
						{
							if ($row['material_type']=="Sweet_Extras")
							{
							$count_materials.="\"m".$row['material_id']."\",";
							$count_names.="\"".$row['material_name']."\",";
							$count_prices.="\"".$row['material_price']."\",";
							echo "<tr id=\"row_highlight\"><td>".++$counter."</td><td>".$row['material_name']."<td>".$row['material_price']."</td>";
							echo "<td><input id=\"m".$row['material_id']."\" type=\"text\" id=\"no\" size=\"1\" maxlength=\"2\" value=\"0\"/>
												<input type=\"button\" value=\"+\" onclick=\"increaseValue('m".$row['material_id']."')\"/>
												<input type=\"button\" value=\"-\" onclick=\"decreaseValue('m".$row['material_id']."')\">
														</td> 
													</tr>	";	
							}
						}
					echo "
					</tbody>
				</table>";
echo "</div>";
//-------------------------------------------------------------------------------------------------------------------

$count_materials=substr($count_materials,0,-1);
$count_names=substr($count_names,0,-1);
$count_prices=substr($count_prices,0,-1);

// Επιστροφή global μεταβλητών
	echo "<script>
		var myMats= new Array(".$count_materials.");
		var myNames= new Array(".$count_names.");
		var myPrices= new Array(".$count_prices.");
	</script>";
//----------------------------------------------------

// αποσύνδεση από τη Βάση Δεδομένων
Disconnect();
//----------------------------------------------------
echo"<br/><br/>
</tbody>
            <br> 
			<tfoot>
				<tr> <th align=\"right\" colspan=4>
				<table>
					<col width=\"280\" />
					<col width=\"10\" />
					<col width=\"240\" />
					<tr>
						<td>
							<a href=\"#\" class=\"button\" onclick=\"addCrepe();return false;\">
								<span class=\"confirm\" > Καταχώρηση Κρέπας! </span>
							</a>
						</td>
						<td></td>
						<td>			
							<a href=\"#\" class=\"button\" onclick=\"clearFields();return false;\">
								<span class=\"cancel\"> Ακύρωση Κρέπας </span>
							</a>
						</td>
					</tr>
				</table>
				</tr>
			</tfoot>
		</table>";
?>

