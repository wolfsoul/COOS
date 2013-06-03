<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Creperie Online Delivery</title>
	<!--  Site skin stylesheet  -->	
	<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
	<!--  Button skin stylesheet  -->	
	<link rel="stylesheet" type="text/css" href="css/button.css" />
	<!--  Table skin stylesheet  -->	
	<link rel="stylesheet" type="text/css" href="css/tables.css" />
	<!--  jCarousel skin stylesheet  -->
	<link rel="stylesheet" type="text/css" href="css/skin.css" />
    <!--  Interface functions  -->
	<script type="text/javascript" src="bus_functions/javascript/indexFunctions.js"></script>		
	<!--  jQuery library  -->
	<script type="text/javascript" src="bus_functions/javascript/jquery-1.7.2.js"></script>
	<!--  jCarousel library  -->
	<script type="text/javascript" src="bus_functions/javascript/jquery.jcarousel.min.js"></script>
	<!--  jCarousel functions  -->
	<script type="text/javascript" src="bus_functions/javascript/carousel.js"></script>
	<!--  jQuery library  -->
	<script type="text/javascript" src="bus_functions/javascript/jquery-1.7.2.purr.js"></script>
	<!--  Purr-pop functions  -->	
	<script type="text/javascript" src="bus_functions/javascript/pop.js"></script>	
	<!--  Purr-pop skin stylesheet  -->
	<link rel="stylesheet" type="text/css" href="css/purr.css" />
</head>

<body onload="pop();" onscroll="hide('login');">

	<header id="banner">
		<?php if(isset($_SESSION['name']))
				{
					echo "<h3 id=\"uid\">Καλωσορίσατε "; 
					echo $_SESSION['name']." ".$_SESSION['sname']."! <br/>"; 
					echo '<a href="views/customer_profile.php">Profile</a>';
					echo '<a href="db_functions/dologout.php">Log Out</a></h3>';
				}
				else
				{
					echo '<img id="imglog" src="img/Login.png" align="left" alt="Login Button" onclick="position();"/>';
					echo '<h3 id="uid">Hello Guest!</h3> '; 
                }
		?>
   	</header>
    
    <div id="login">
    	<h3> Σύνδεση / Εγγραφή Χρήστη </h3>
    	<?php include 'bus_functions/loginform.php'; ?>	
     </div>
        <br><br><br><br><br><br><br><br>
             
		<?php include 'bus_functions/carousel.php'; ?>		
    
	<div id="make_crepes">
      	<h3> Φτιάξε την δική σου Κρέπα </h3>
        <?php include 'bus_functions/fetchmaterials.php'; ?>
	</div>
    
	</br></br></br></br>
    <div id="order_info">
        <h3> Ολοκλήρωση Παραγγελίας </h3>
 		<?php include 'bus_functions/finalorder.php'; ?>       
	</div>

	<footer>
		<a href="../Source Code/views/faq.html"> Συχνές Ερωτήσεις & Απαντήσεις </a></br>
		<ul class="foot">
			<li><a href="../Source Code/views/copyright.html">Copyright</a></li>
			<li><a href="mailto:team@tl2.com">Στείλτε μας E-Mail</a></li>
			<li><a href="../Source Code/views/privacy.html">Πολιτική Απορρήτου</a></li>
			<li><a href="../Source Code/views/team.html">Designed by the Team</a></li>
		</ul>	
	</footer>	
	
	<a href="#" id="admin_login" onmouseover="show('admin_login');" onClick="loginAdmin();">Admin</a>
</body>
</html>