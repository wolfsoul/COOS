<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Διαχείριση Προσωπικού</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css" />
	<!--  jQuery library  -->
	<script type="text/javascript" src="../bus_functions/javascript/jquery-1.7.2.js"></script>
	<!--  jQuery library  -->
	<script type="text/javascript" src="../bus_functions/javascript/jquery-1.7.2.purr.js"></script>
	<!--  Purr-pop functions  -->	
	<script type="text/javascript" src="../bus_functions/javascript/pop_user_management.js"></script>	
	<!--  Purr-pop skin stylesheet  -->
	<link rel="stylesheet" type="text/css" href="../css/purr.css" />
</head>

<body onload="pop();">

    <div id="delete">
        <h2 id="delete">Διαγραφή Χρήστη</h2>
        <?php
            include '../db_functions/database.php'; 
            $connection=Connect();
            $query="select * from users where user_role='employee'";
            $result=mysql_query($query,$connection) or Die (mysql_error());
            echo "<p>Επιλογή Χρήστη : <select id=\"select_box\"></p>";
            while ($row = mysql_fetch_array($result)) 
            {
                echo "<option value=\"".$row['user_id']."\">".$row['user_surname']." ".$row['user_name']."</option>";	
                                        
            }
            echo "</select>";
        ?>        
        <form action="../bus_functions/delete_user.php" id='delete_form'  method="post">
            <input type="hidden" name="user_id" value="0" id="user_id">
        </form>
        <button type="button" onclick=	"document.getElementById('user_id').value= document.getElementById('select_box').value;document.forms['delete_form'].submit();">
        Διαγραφή Χρήστη</button>
    </div><!--end delete-->
    
    <div id="register">
        <h2 id="register">Καταχώρηση Χρήστη</h2>
        <form action="../bus_functions/register_user.php" id='register_form' method="post" >
			Όνομα : <input type="text" name="user_name" maxlength="20"><br/>
       		Επώνυμο : <input type="text" name="user_surname" maxlength="25"><br/>
        	Διεύθυνση : <input type="text" name="user_address" maxlength="40"><br/>
        	E-mail : <input type="text" name="user_email" maxlength="30"><br/>
         	Τηλέφωνο : <input type="text" name="user_phone" maxlength="15"><br/>
         	Username : <input type="text" name="user_username" maxlength="15"><br/>
         	Password : <input type="password" name="user_password" maxlength="5"><br/>
         	Δικαιώματα Χρήστη : <select name="user_role"><br/>
                    <option value="employee">Εmployee</option>
                    <option value="admin">Αdministrator</option>
                    </select><br/><br/>        
            <input type="submit" value="Δημιουργία Χρήστη">
            <input type="reset" value="Καθαρισμός Πεδίων">
        </form>
    </div><!--end register-->   
     
	<script>
		var e_user_name= new Array();
		var e_user_surname= new Array();
		var e_user_address= new Array();
		var e_user_email= new Array();
		var e_user_phone= new Array();
		var e_user_username= new Array();
		var e_user_password= new Array();
		var e_user_role= new Array();
		function autofilldata()
		{	
			document.getElementById('e_user_id').value= document.getElementById('select_box_edit').value;
			var theid= document.getElementById('select_box_edit').value;
			document.getElementById('user_name').value=e_user_name[theid];
			document.getElementById('user_surname').value=e_user_surname[theid];
			document.getElementById('user_address').value=e_user_address[theid];
			document.getElementById('user_email').value=e_user_email[theid];
			document.getElementById('user_phone').value=e_user_phone[theid];
			document.getElementById('user_username').value=e_user_username[theid];
			document.getElementById('user_password').value=e_user_password[theid];
			document.getElementById('user_role').value=e_user_role[theid];
		}
    </script>

    <div id="edit">
        <h2 id="edit">Επεξεργασία Χρήστη</h2>
        <?php
            $query="select * from users where user_role='employee'";
            $result=mysql_query($query,$connection) or Die (mysql_error());
            echo "<p>Επιλογή Χρήστη : <select id=\"select_box_edit\" onchange=\"autofilldata()\"></p>";
			echo "<option >Επιλέξτε εργαζόμενο</option>";
            while ($row = mysql_fetch_array($result)) 
            {
                echo "<option value=\"".$row['user_id']."\">".$row['user_surname']." ".$row['user_name']."</option>";	
                echo "<script>e_user_name[".$row['user_id']."]=\"".$row['user_name']."\";</script>";
				echo "<script>e_user_surname[".$row['user_id']."]=\"".$row['user_surname']."\";</script>";
				echo "<script>e_user_address[".$row['user_id']."]=\"".$row['user_address']."\";</script>";
				echo "<script>e_user_email[".$row['user_id']."]=\"".$row['user_email']."\";</script>";
				echo "<script>e_user_phone[".$row['user_id']."]=\"".$row['user_phone']."\";</script>";
				echo "<script>e_user_username[".$row['user_id']."]=\"".$row['user_username']."\";</script>";
				echo "<script>e_user_password[".$row['user_id']."]=\"".$row['user_password']."\";</script>";
				echo "<script>e_user_role[".$row['user_id']."]=\"".$row['user_role']."\";</script>";                       
            }
            echo "</select>";
        ?>
        
        <form action="../bus_functions/edit_user.php" id='edit_form' method="post">
        	<input type="hidden" name="e_user_id" value="0" id="e_user_id">
                Όνομα : <input type="text" name="user_name" id="user_name" maxlength="20"><br/>
                Επώνυμο : <input type="text" name="user_surname" id="user_surname" maxlength="25"><br/>
                Διεύθυνση : <input type="text" name="user_address" id="user_address" maxlength="40"><br/>
                E-mail : <input type="text" name="user_email" id="user_email" maxlength="30"><br/>
                Τηλέφωνο : <input type="text" name="user_phone" id="user_phone" maxlength="15"><br/>
                Username : <input type="text" name="user_username" id="user_username" maxlength="1"><br/>
                Password : <input type="password" name="user_password" id="user_password" maxlength="5"><br/>
                Δικαιώματα Χρήστη : <select name="user_role" id="user_role">
                <option value="employee">Εmployee</option>
                <option value="admin">Αdministrator</option>
                </select><br/><br/>
            <input type="submit" value="Ολοκλήρωση Αλλαγών"><input type="reset" value="Ακύρωση Αλλαγών">
    	</form>
    </div><!--end delete-->   

	<div id="link">
	<?php echo '<h4><a href="back_office.php"style="color:#2F2F2F;">Επιστροφή στη Αρχική Σελίδα</a></h4>';?>
    </div>
    
</body>
</html>