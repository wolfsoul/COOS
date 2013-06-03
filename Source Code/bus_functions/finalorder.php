<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body onscroll="hide('login');">
	<table align="Top" >
    	<col width="1100">
        <col width="400">
        <form name="frm_order" action="bus_functions/submit_order.php" method="post">
        	<input type="hidden" name="order_description" value="tobechanged" id="order_description">
        	<input type="hidden" name="total" value="0" id="total">

        	<tbody>
                <td id="order" valign=top>
                    <h5>Στοιχεία παραγγελίας: </h5>
                    <table 	id="con_table" border="1">
                        <col width="1200"/>
                        <col width="100"/>
                        <thead>
                            <tr> <th>Υλικά</th> <th>Τιμή</th> </tr>
                        </thead>
                        <tfoot>
                            <tr id="order_footer"> <td >Συνολικό Ποσό :</td> <td id="price_total">0€</td> </tr>
                        </tfoot>
                    </table>
                </td>
                <td valign=top> 	
                    <h5>Στοιχεία Πελάτη: </h5>	
                    <table id="info">			
                        <tr> 
                            <th><label for="name">Όνομα</label></th> 
                            <td><input type="text" id="name" name="name" size="30" maxlength="20" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '';?>"/></td>
                        </tr>
                        <tr> 
                            <th><label for="sname">Επώνυμο</label></th>
                            <td><input type="text" id="sname"  name="sname" size="30" maxlength="20" value="<?php echo isset($_SESSION['sname']) ? $_SESSION['sname'] : '';?>"/></td>
                        </tr>
                        <tr>
                            <th><label for="street">Οδός</label></th>
                            <td><input type="text" id="street"  name="street" size="30" maxlength="20" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : '';?>"/></td>
                        </tr>
                        <tr>
                            <th><label for="floor">Όροφος</label></th>
                            <td><input type="text" id="floor"  name="floor"size="30" maxlength="2" value="<?php echo isset($_SESSION['floor']) ? $_SESSION['floor'] : '';?>"/></td>
                        </tr>
                        <tr>
                            <th><label for="phone">Τηλέφωνο</label></th>
                            <td><input type="text" id="phone"  name="phone"size="30" maxlength="13" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '';?>"/></td>
                        </tr> 
                    </table>
                    </br>
                </td>
            </tbody>
            <tfoot>
                <table>
                    <tr>
                        <td>
                            <a href="#" class="button" onclick="sendOrder();return false;">
                                <span class="confirm" > Αποστολή Παραγγελίας </span>
                            </a>						
                        </td>
                        <td></td>
                        <td>
                            <a href="#" class="button"  onclick="cancelOrder();return false;">
                                <span class="cancel" > Ακύρωση Παραγγελίας </span>
                            </a>
                        </td>					
                    </tr>
                </table>
            </tfoot>
        </form>
	</table>
</body>
</html>