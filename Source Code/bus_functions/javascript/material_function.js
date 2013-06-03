/*
 * Eddited { 15/05/2012, 20:05 }
 * Clear all data, users inserted. 
 * Allow only add & save button to display. 
 */
function reset_data()
{
	document.getElementById('mat_message').innerHTML='<h2 class="h_material">Προσθήκη νέου υλικού</h2>';
	document.getElementById('mat_id').value="";
	document.getElementById('name').value="";
	document.getElementById('price').value="";
	document.getElementById('category').selectedIndex=0;
	document.getElementById('add').style.visibility="visible";
	document.getElementById('delete').style.visibility="hidden";
	document.getElementById('save').style.visibility="hidden";
	document.getElementById('close').style.visibility="visible";
	document.getElementById('allError').style.visibility="hidden";
	document.getElementById('typeError').style.visibility="hidden";
	document.getElementById('nameError').style.visibility="hidden";
	document.getElementById('priceError').style.visibility="hidden";
	window.location.href = window.location.protocol + "//" + window.location.host + 
                       window.location.pathname + window.location.search + "#top";
}


/*
 * Eddited { 23/05/2012, 11:05 }
 * Delete and save buttons display. Disable add button.
 * The selected material's informations inserted into edit boxes. 
 */
function update_material( material_id, name, category, price )
{
	document.getElementById('mat_message').innerHTML='<h2 class="h_material">Επεξεργασία υλικού</h2>';
	document.getElementById('add').style.visibility="hidden";
	document.getElementById('save').style.visibility="visible";
	document.getElementById('delete').style.visibility="visible";
	document.getElementById('close').style.visibility="visible";
	
	document.getElementById('mat_id').value=material_id;
	document.getElementById('name').value=name;
	document.getElementById('price').value=price;
	
	switch(category)
	{
		case "Cheese":
			document.getElementById('category').selectedIndex=1;
			break;
		case "Charcuterie":
			document.getElementById('category').selectedIndex=2;
			break;
		case "Ointments":
			document.getElementById('category').selectedIndex=3;
			break;
		case "Sour_Extras":
			document.getElementById('category').selectedIndex=4;
			break;
		case "Chocolates":
			document.getElementById('category').selectedIndex=5;
			break;
		case "Specials":
			document.getElementById('category').selectedIndex=6;
			break;
		case "Sweet_Extras":
			document.getElementById('category').selectedIndex=7;
			break;
		default:
			document.getElementById('category').selectedIndex=0;
	}
	window.location.href = window.location.protocol + "//" + window.location.host + 
                       window.location.pathname + window.location.search + "#editBar";
}

/*
 * Eddited { 23/05/2012, 11:05 }
 * Adds a new material.
 */
function add_material()
{	
	document.getElementById('allError').style.visibility="hidden";
	document.getElementById('typeError').style.visibility="hidden";
	document.getElementById('nameError').style.visibility="hidden";
	document.getElementById('priceError').style.visibility="hidden";
	
	var name=document.getElementById('name').value;
	var price=document.getElementById('price').value;
	var category=document.getElementById('category').selectedIndex;
	var flag=1;
	
	switch(category)
	{	
		case 1:
			category == "Cheese";
			break;
		case 2:
			category == "Charcuterie";
			break;
		case 3:
			category == "Ointments";
			break;
		case 4:
			category == "Sour_Extras";
			break;
		case 5:
			category == "Chocolates";
			break;
		case 6:
			category == "Specials";
			break;
		case 7:
			category == "Sweet_Extras";
			break;
		default:
			flag=0;
			document.getElementById('allError').style.visibility="visible";
			document.getElementById('typeError').style.visibility="visible";
	}
	
	if(name=="")
	{
	flag=0;
	document.getElementById('allError').style.visibility="visible";
	document.getElementById('nameError').style.visibility="visible";
	}
	
	if( !IsNumeric( price ) )
	{
	flag=0;
	document.getElementById('allError').style.visibility="visible";
	document.getElementById('priceError').style.visibility="visible";
	}
	
	if(flag)
	{
		var url='../bus_functions/add_material.php?name='+name+'&type='+category+'&price='+price+'' ;
		location.href=url;
	}
}

/*
 * Eddited { 19/05/2012, 21:10 }
 * Deletes a material.
 */
function delete_material()
{
	var id=document.getElementById('mat_id').value;
	
	var url='../bus_functions/delete_material.php?id='+id+'' ;
	location.href=url;
}

/*
 * Eddited { 23/05/2012, 11:00 }
 * Saves an eddited material.
 */
function save_material()
{	
	document.getElementById('allError').style.visibility="hidden";
	document.getElementById('typeError').style.visibility="hidden";
	document.getElementById('nameError').style.visibility="hidden";
	document.getElementById('priceError').style.visibility="hidden";
	
	var name=document.getElementById('name').value;
	var price=document.getElementById('price').value;
	var category=document.getElementById('category').selectedIndex;
	var id=document.getElementById('mat_id').value;
	var flag=1;
	
	switch(category)
	{
		case 1:
			category == "Cheese";
			break;
		case 2:
			category == "Charcuterie";
			break;
		case 3:
			category == "Ointments";
			break;
		case 4:
			category == "Sour_Extras";
			break;
		case 5:
			category == "Chocolates";
			break;
		case 6:
			category == "Specials";
			break;
		case 7:
			category == "Sweet_Extras";
			break;
		default:
			flag=0;
			document.getElementById('allError').style.visibility="visible";
			document.getElementById('typeError').style.visibility="visible";
	}
	
	if(name=="")
	{
	flag=0;
	document.getElementById('allError').style.visibility="visible";
	document.getElementById('nameError').style.visibility="visible";
	}
	
	if( !IsNumeric( price ) )
	{
	flag=0;
	document.getElementById('allError').style.visibility="visible";
	document.getElementById('priceError').style.visibility="visible";
	}

	if(flag)
	{
		var url='../bus_functions/save_material.php?name='+name+'&type='+category+'&price='+price+'&id='+id+'' ;
		location.href=url;
	}
}

function name_check()
{
	if( document.getElementById('name').value=="" )
	{
		document.getElementById('nameError').style.visibility="visible";
	}
	else
	{
		document.getElementById('nameError').style.visibility="hidden";
	}
}

function price_check()
{
	if( document.getElementById('price').value=="" )
	{
		document.getElementById('priceError').style.visibility="visible";
	}
	else
	{
		document.getElementById('priceError').style.visibility="hidden";
	}
}

function category_check()
{
	if(document.getElementById('category').selectedIndex==0)
	{
		document.getElementById('typeError').style.visibility="visible";
	}
	else
	{
		document.getElementById('typeError').style.visibility="hidden";
	}
}

function IsNumeric(input){
    var RE = /^-{0,1}\d*\.{0,1}\d+$/;
    return (RE.test(input));
}