// συνάρτηση για την αύξηση της ποσότητας των υλικών κατά ένα με μέγιστη επιλογή το 3
function increaseValue(name)
{
	var newValue = document.getElementById(name).value;
	newValue++;
	if (newValue>3)
		newValue=3;
	document.getElementById(name).value=newValue;
}
//-----------------------------------------------------------------------------------

// συνάρτηση για την μείωση της ποσότητας των υλικών κατά ένα με ελάχιστη επιλογή το 0
function decreaseValue(name)
{
	var newValue = document.getElementById(name).value;
	newValue--;
	if (newValue<0)
		newValue=0;
	document.getElementById(name).value=newValue;
}
//-----------------------------------------------------------------------------------
	
// συνάρτηση για την προσθήκη κρέπας στη παραγγελία του χρήστη
var grand_total=0;	
function addCrepe()
{	
	var row;
	var cell_materials;
	var cell_price;
	var quantity;
	var test;
	var total=1.0;		
	var rounded;
	var crepe_materials="Ζύμη Κρέπας (1€), ";
		
	// εύρεση των υλικών που επιλέχθηκαν από το χρήστη
	for(var i=0;i<myMats.length;i++)
	{	
		test=document.getElementById(myMats[i]).value;
		if (test>0)
		{
			quantity=document.getElementById(myMats[i]).value;
			crepe_materials+=myNames[i]+" x "+quantity+", ";
        	rounded=myPrices[i]*quantity;
        	rounded= Math.round(rounded*Math.pow(10,2))/Math.pow(10,2);
			total+=rounded;
		}
	}
	//προσθήκη της κρέπας στον πίνακα παραγγελιών
	crepe_materials=crepe_materials.substring(0,crepe_materials.length-2);
	row=document.getElementById("con_table").insertRow(1);
	cell_materials=row.insertCell(0);
	cell_price=row.insertCell(1);
	cell_materials.innerHTML=crepe_materials;
	cell_price.innerHTML=Math.round(total*Math.pow(10,2))/Math.pow(10,2)+"€";
	grand_total+=total;
	grand_total=Math.round(grand_total*Math.pow(10,2))/Math.pow(10,2);
	document.getElementById("price_total").innerHTML=grand_total+"€";
		
	//εκαθάριση των πεδίων στη φόρμα 
	clearFields()
}
//-----------------------------------------------------------------------------------
	
// συνάρτηση για την εκαθάριση των επιλογών του χρήστη 
function clearFields()
{
	for(var i=0;i<myMats.length;i++)
	{	
		test=document.getElementById(myMats[i]).value;
		if (test>0)
		{
			document.getElementById(myMats[i]).value=0;
		}
	}
}
//-----------------------------------------------------------------------------------

// συνάρτηση για την αποστολή της παραγγελίας του χρήστη
function sendOrder()
{		
	var orders="";
	var row;
	var i;
	document.getElementById('total').value=grand_total;
	for (i = 1; i < document.getElementById('con_table').rows.length-1; i ++) 
	{
   		row = document.getElementById('con_table').rows[i];
 		orders = orders+row.cells[0].innerHTML+"|";	
    }
	orders=orders.substring(0,orders.length-1);
	document.getElementById("order_description").value=orders;
	document.forms["frm_order"].submit();	
}
//-----------------------------------------------------------------------------------
	
// συνάρτηση για την ακύρωση της παραγγελίας του χρήστη
function cancelOrder()
{
	var table = document.getElementById("con_table");
	for(var i = table.rows.length - 2; i > 0; i--)
	{
		table.deleteRow(i);
	}
	document.getElementById("price_total").innerHTML= 0 + "€";
	grand_total=0;
}
//-----------------------------------------------------------------------------------

// συνάρτηση για την εμφάνιση του πεδίου Login
function position() {
    var d = document.getElementById('login');
    d.style.visibility = 'visible';
    d.style.left = event.screenX + 'px';
    d.style.top = event.screenY + 'px';
  }
//-----------------------------------------------------------------------------------  
  
 // συνάρτηση για την απόκριψη του πεδίου Login
 function hide(id) {
    document.getElementById(id).style.visibility = 'hidden';
	//document.frm_login.u_name.value="";
	//document.frm_login.pass.value="";
 }
//-----------------------------------------------------------------------------------
  
// συνάρτηση για την είσοδο χρήστη
function loginUser()
{
	document.forms["frm_login"].submit();	
}
//-----------------------------------------------------------------------------------

// συνάρτηση για την είσοδο administrator
function loginAdmin(){
	window.open('bus_functions/secret_login.php','Είσοδος Διαχειριστή','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
  }
//-----------------------------------------------------------------------------------

// συνάρτηση για την εγγραφή χρήστη
function registerUser(){	
	window.open('views/customer_registration.php','Εγγραφή Χρήστη','width=400,height=200,toolbar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes,resizable=yes');
	hide();
 }
//-----------------------------------------------------------------------------------

// συνάρτηση για την εμφάνιση
function show(id) {
        var color = document.getElementById(id).style.color;
            if (color == 'black') 
			{
                document.getElementById(id).style.color='#90796f';
			}
			else
				{document.getElementById(id).style.color='black';}
 }
//-----------------------------------------------------------------------------------

