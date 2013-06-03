<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();
chdir('../');
include( '/bus_functions/material.php' );
/*
 * Fetch all saved materials. Eddited { 9/05/2012, 16:30 }
 * Create a table, which displays dynamic all the materials. 
 */

$materials = fetch_all_materials();

if( !empty($materials) )
{
    $i = 0;
    foreach( $materials as $material )
    {
        $mat = explode( "~", $material );
        
        $id[$i] = $mat[0];
        $name[$i] = $mat[1];
        $type[$i] = $mat[2];
        $price[$i] = $mat[3];
        
        $i++;
    }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Διαχείριση Υλικών</title>
    <link rel="stylesheet" type="text/css" href="../css/material.css" />
	<script type="text/javascript" src="../bus_functions/javascript/material_function.js"></script>
</head>
<body onLoad="reset_data()">
	<div class="mat_table">
			<table>
                <tr id="top">
					<td colspan="5"><h1 class="h_material">Υλικά</h1></td>
                </tr>
                <tr>
                    <td width="20"><h2 class="h_material">Α/Α</h2></td>
                    <td width="50"><h2 class="h_material">Κωδικός</h2></td>
                    <td width="200"><h2 class="h_material">Όνομα</h2></td>
                    <td width="160"><h2 class="h_material">Κατηγορία</h2></td>
                    <td width="100"><h2 class="h_material">Τιμή</h2></td>
					<td width="20"></td>
                </tr>
				<tr><td colspan="5"><hr></td></tr>
            <?php	
            if( !empty( $id ) )
            {	
                $count = 0;
                $material_number = count( $id );
               
                for( $j = 0; $j < $material_number; $j++ )
                { ?>
                <tr>
						<td width="20"><h3 class="h_material"><?php echo $count + 1; ?></h3></td>
						<td width="50"><h3 class="h_material"><label title="Επεξεργασία Υλικού" onclick="update_material('<?php echo $id[$j] ?>','<?php echo $name[$j] ?>','<?php echo $type[$j] ?>','<?php echo $price[$j] ?>')" ><?php echo $id[$j]; ?></label></h3></td>
						<td width="200"><h3 class="h_material"><label title="Επεξεργασία Υλικού" onclick="update_material('<?php echo $id[$j] ?>','<?php echo $name[$j] ?>','<?php echo $type[$j] ?>','<?php echo $price[$j] ?>')" ><?php echo $name[$j]; ?></label></h3></td>
						<td width="160"><h3 class="h_material"><?php 
												switch($type[$j])
												{	
													case 'Cheese':
														$category = "Τυριά";
													break;
													case 'Charcuterie':
														$category = "Αλλαντικά";
													break;
													case 'Ointments':
														$category = "Αλοιφές";
													break;
													case 'Sour_Extras':
														$category = "Αλμυρά Extras";
													break;
													case 'Chocolates':
														$category = "Σοκολάτες";
													break;
													case 'Specials':
														$category = "Σπέσιαλ";
													break;
													case 'Sweet_Extras':
														$category = "Γλυκά Extras";
													break;
													default:
														$category = "Άγνωστο";
												}
												echo $category; ?>
											</h3></td>
						<td width="100"><h3 class="h_material"><?php echo $price[$j]; ?></h3></td>
				</tr>
				<tr><td colspan="5"><hr></td></tr>
            <?php
            $count++;
                } 
            }?>
			
			<div>
				<tr>
					<td colspan="5" id="mat_message"></td>
				</tr>
				<tr>
					<td width="20"> </td>
					<td width="50" id="allError" class="errors" style="visibility:hidden">Σφάλματα: </td>
					<td width="200" id="nameError" class="errors" style="visibility:hidden">*Κενό πεδίο</td>
					<td width="160" id="typeError" class="errors" style="visibility:hidden">*Χωρίς επιλογή</td>
					<td width="100" id="priceError" class="errors" style="visibility:hidden">*Κενό πεδίο</td>
				</tr>
				<tr id="editBar"> 
					<td width="20"><h3 class="h_material"><?php echo $count + 1; ?></h3></td>
					<td width="50"><h3 class="h_material"><input type="text" id="mat_id" name="mat_id" size="4" readonly="readonly"/></h3></td>
					<td width="200"><h3 class="h_material"><input type="text" id="name" name="name" maxlength="29" onkeyup="name_check()"/></h3></td>
					<td width="160"><h3 class="h_material">
						<select id="category" onchange="category_check()">
							<option value="epilogi">Επιλέξτε Κατηγορία</option>
							<option value="Cheese">Τυριά</option>
							<option value="Charcuterie">Αλλαντικά</option>
							<option value="Ointments">Αλοιφές</option>
							<option value="Sour_Extras">Αλμυρά Extras</option>
							<option value="Chocolates">Σοκολάτες</option>
							<option value="Specials">Σπέσιαλ</option>
							<option value="Sweet_Extras">Γλυκά Extras</option>
						</select></h3>
					</td>
					<td width="100"><h3 class="h_material"><input type="text" id="price" name="price" maxlength="10" size="8" onkeyup="price_check()"/></h3></td>
				</tr>
				<tr>
					<td><input type="button" class="buttons" value=" Προσθήκη " id="add" title="Προσθήκη Υλικού" style="visibility:hidden" onclick="add_material()"/></td>
					<td><input type="button" class="buttons" value=" Ακύρωση " id="close" title="Ακύρωση Επεξεργασίας" style="visibility:hidden" onclick="reset_data()"/></td>
					<td><input type="button" class="buttons" value=" Διαγραφή " id="delete" title="Διαγραφή Υλικού" style="visibility:hidden" onclick="delete_material()"/></td>
					<td><input type="button" class="buttons" value=" Αποθήκευση " id="save" title="Αποθήκευση Υλικού" style="visibility:hidden" onclick="save_material()"/></td>
				</tr>
				<tr>
					<td colspan="5"><?php echo '<a href="back_office.php"style="color:#2F2F2F;">Επιστροφή στη Αρχική Σελίδα</a>';?></td>
				</tr>
			</div>
			</table>
	</div>	   
</body>
</html>
