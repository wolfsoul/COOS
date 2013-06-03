<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>User Registration Page </title>
    <link rel="stylesheet" type="text/css" href="../css/customer.css" />
	<script type="text/javascript" src="../bus_functions/javascript/check_inputs.js"></script>
</head>

<body>
    <div id="c_reg">
    	<h2>Εγγραφή Χρήστη</h2>
        <form name="register_c" Action="../bus_functions/register_user.php" method="post" onsubmit="checkform(this);">
        <table>
        	<tr><td>Όνομα : <input type="text" name="user_name" id="user_name" size=70 maxlength="20"></td></tr>
	        <tr><td>Επώνυμο : <input type="text" name="user_surname" id="user_surname" size=70 maxlength="25"></td></tr>
            <tr><td>Διεύθυνση : <input type="text" name="user_address" id="user_address" size=70 maxlength="40"></td></tr>
            <tr><td>Όροφος : <input type="text" name="user_floor" id="user_floor" size=70 maxlength="3"></td></tr>
            <tr><td>Τηλέφωνο : <input type="text" name="user_phone" id="user_phone" size=70 maxlength="15"></td></tr>
            <tr><td>Username : <input type="text" name="user_username" id="user_username" size=70 maxlength="15"></td></tr>
            <tr><td>Password : <input type="password" name="user_password" id="user_password" size=70 maxlength="5"></td></tr>
            <tr style="display:none"><td>Δικαιώματα Χρήστη<input type="text" name="role" id="role" value="customer"></td></tr>
            <tr><td><input type="submit" value="Ολοκλήρωση Αλλαγών">
            <input type="reset" value="Ακύρωση Αλλαγών"></td></tr>
    	</form>
        </table>
	</div>
</body>
</html>