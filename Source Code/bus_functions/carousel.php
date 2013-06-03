<script>
function manipulateDiv(crepe)
{
var html="";
document.getElementById('crepe').style.display='block';
switch(crepe)
{
case 1:
  html="<h3>Choco Dream</h3>  \n    <table>\n        <tr>\n            <th><h4><u>Περιγραφή : </u></h4> </th>\n            <td><p>Κλασσικός και αγαπημένος συνδυασμός, Merenda ή Nutella με τριμμένα Cookies σοκολάτας!</p></td>\n         </tr>\n     </table>\n  <a href=\"#\" class=\"button\" onclick=\"addCarousel(1);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n   <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'crepe\').style.display=\'none\';\">\n	<span class=\"exit\"> X </span>	\n	 </a>";
  document.getElementById('crepe').innerHTML=html;
  break;
case 2:
  html="<h3>Mimosa</h3>\n    <table>\n        <tr>\n			<th><h4><u>Περιγραφή : </u></h4> </th>\n			<td><p>Εξαιρετική πραλίνα φουντουκιού, ολόφρεσκες φράουλες και λεπτοτριμμένο μπισκότο και ιδοκάρυδο!</p></td>\n         </tr>\n     </table>\n   <a href=\"#\" class=\"button\" onclick=\"addCarousel(2);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n  <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'crepe\').style.display=\'none\';location.href=\'#mycarousel\'\">\n		<span class=\"exit\"> X </span>\n	 </a>";
  document.getElementById('crepe').innerHTML=html;
  break;
case 3:
  html="<h3>Winder Edition</h3>\n    <table>\n        <tr>\n            <th><h4><u>Περιγραφή : </u></h4> </th>\n            <td><p>Μυρωδάτες ροδέλες μπανάνας βουτηγμένες σε πραλίνα μαύρης σοκολάτας</p></td>\n         </tr>\n     </table>\n  <a href=\"#\" class=\"button\" onclick=\"addCarousel(3);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n   <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'crepe\').style.display=\'none\';location.href=\'#mycarousel\'\">\n		<span class=\"exit\"> X </span>\n	 </a>";
  document.getElementById('crepe').innerHTML=html;
  break;
case 4:
  html="<h3>Dark Forest</h3>\n    <table>\n        <tr>\n			<th><h4><u>Περιγραφή : </u></h4> </th>\n			<td><p>Φρέσκα φρούτα του δάσους βουτηγμένα σε λευκή σοκολάτα και συνδυασμένα με απολαυστικούς ξηρούς καρπούς!</p></td>\n         </tr>\n     </table>\n   <a href=\"#\" class=\"button\" onclick=\"addCarousel(4);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n  <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'vatomoura\').style.display=\'none\';location.href=\'#mycarousel\'\">\n		<span class=\"exit\"> X </span>\n	</a>";
  document.getElementById('crepe').innerHTML=html;  
  break;
case 5:
  html="<h3>Village</h3>\n    <table>\n        <tr>\n			<th><h4><u>Περιγραφή : </u></h4> </th>\n			<td><p>Gouda, σαλάμι αέρος, φέτα και μανιτάρια συνδυάζονται για να ικανοποιήσουν και τους πιο απαιτητικούς!</p></td>\n         </tr>\n     </table>\n	<a href=\"#\" class=\"button\" onclick=\"addCarousel(5);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'manitaria\').style.display=\'none\';location.href=\'#mycarousel\'\">\n		<span class=\"exit\"> X </span>\n	 </a>";
  document.getElementById('crepe').innerHTML=html;
  break;
case 6:
  html="<h3>Smokey</h3>\n    <table>\n        <tr>\n			<th><h4><u>Περιγραφή : </u></h4> </th>\n			<td><p>Καπνιστό τυρί, καπνιστό μπέϊκον, ντομάτα, μανιτάρια και μαγιονέζα για επιλεκτικούς γευσιγνώστες!<p></td>\n         </tr>\n     </table>\n  <a href=\"#\" class=\"button\" onclick=\"addCarousel(6);return false;\">\n<span class=\"confirm\" > Προσθήκη στην παραγγελία </span>\n</a>\n   <a href=\"#\" class=\"button\" onClick=\"document.getElementById(\'allantikon\').style.display=\'none\';location.href=\'#mycarousel\'\">\n		<span class=\"exit\"> X </span>\n	 </a>";
  document.getElementById('crepe').innerHTML=html;
  break;
default:
  document.getElementById('crepe').style.display='none';
  break;
}
}

function addCarousel(crepe)
{
	switch (crepe)
	{
		case 1:
		var crepe_materials="Ζύμη Κρέπας (1€), Πραλίνα x 1, Μπισκότο x 1";
		total=2.2;
		break;
		case 2:
		var crepe_materials="Ζύμη Κρέπας (1€), Πραλίνα x 1, Μπισκότο x 1, Φράουλες x 1";
		total=2.7;
		break;
		case 3:
		var crepe_materials="Ζύμη Κρέπας (1€), Πραλίνα x 1, Μπανάνα x 1";
		total=2.2;
		break;
		case 4:
		var crepe_materials="Ζύμη Κρέπας (1€), Φουντούκι x 1, Φράουλες x 1, Μπανάνα x 1";
		total=2.5;
		break;
		case 5:
		var crepe_materials="Ζύμη Κρέπας (1€), Gouda x 1, Μπέικον x 1, Μανιτάρια x 1";
		total=3.0;
		break;
		case 6:
		var crepe_materials="Ζύμη Κρέπας (1€), Κασέρι x 1, Μπέικον x 1, Ουγγαρεζα x 1, Μανιτάρια x 1";
		total=3.3;
		break;	
	}
	row=document.getElementById("con_table").insertRow(1);
	cell_materials=row.insertCell(0);
	cell_price=row.insertCell(1);
	cell_materials.innerHTML=crepe_materials;
	cell_price.innerHTML=total+"€";
	grand_total+=total;
	grand_total=Math.round(grand_total*Math.pow(10,2))/Math.pow(10,2);
	document.getElementById("price_total").innerHTML=grand_total+"€";
	
}
</script>
<div id="wrap">
	<h3> Εμπνευστείτε από τις δικές μας προτάσεις! </h3>
        
	<ul id="mycarousel" class="jcarousel-skin-tango">
		<li><a href="#crepe" onClick="manipulateDiv(1);"><img src="./img/sokolata.jpg" width="300" height="300" alt="Choco Dream" /></a></li>
		<li><a href="#crepe" onClick="manipulateDiv(2);"><img src="./img/fraoula.jpg" width="300" height="300" alt="Mimosa" /></a></li>
		<li><a href="#crepe" onClick="manipulateDiv(3);"><img src="./img/mpanana.jpg" width="300" height="300" alt="Winder Edition" /></a></li>
		<li><a href="#crepe" onClick="manipulateDiv(4);"><img src="./img/vatomoura.jpg" width="300" height="300" alt="Dark Forest" /></a></li>
		<li><a href="#crepe" onClick="manipulateDiv(5);"><img src="./img/manitaria.jpg" width="300" height="300" alt="Village" /></a></li>
		<li><a href="#crepe" onClick="manipulateDiv(6);"><img src="./img/allantikon.jpg" width="300" height="300" alt="Smokey" /></a></li>
	</ul>
    
	</br>
    <div id="crepe" style="display:none; border:0;"></div>

</div>
</br>



</br></br>
