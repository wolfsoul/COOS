function IsNotEmpty(form)
{
	not_empty=true
   if(document.register_c.user_name.value == "") 
   { 
      alert('Παρακαλώ συμπληρώστε το όνομά σας') 
      form.user_name.focus(); 
      not_empty= false; 
   } 
   if(document.register_c.user_surname.value == "")  
   { 
      alert('Παρακαλώ συμπληρώστε το επώνυμό σας') 
      form.user_surname.focus(); 
      not_empty= false; 
   } 
   if(document.register_c..user_address.value == "")  
   { 
      alert('Παρακαλώ συμπληρώστε τη διεύθυνσή σας') 
      form.user_address.focus(); 
      not_empty= false; 
   } 
   if(document.register_c.user_floor.value == "") 
   { 
      alert('Παρακαλώ συμπληρώστε τον όροφό σας') 
      form.user_floor.focus(); 
      not_empty= false; 
   } 
   if(document.register_c.user_phone.value == "")  
   { 
      alert('Παρακαλώ συμπληρώστε το τηλέφωνό σας') 
      form.user_phone.focus(); 
      not_empty= false; 
   } 
   if(document.register_c.user_username.value == "")  
   { 
      alert('Παρακαλώ συμπληρώστε το Όνομα Χρήστη σας (Username) ') 
      form.user_username.focus(); 
      not_empty= false; 
   } 
    if(document.register_c.user_password.value == "")  
   { 
      alert('Παρακαλώ συμπληρώστε τον Κωδικό Χρήστη σας  (Password) ') 
      form.user_password.focus(); 
      not_empty= false; 
   }  
return not_empty;
 
} 


function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }



function checkform(form)
{
	if(IsNotEmpty(form))
		;
}

function check_email_address($email) {

  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) 
  {
    return false;
  }
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) 
  {
    if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&?'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",$local_array[$i])) 
	{
      return false;
    }
  }
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) 
  {
	$domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2)
	{
        return false;
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) 
	{
      if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|?([A-Za-z0-9]+))$",$domain_array[$i])) 
	  {
        return false;
      }
    }
  }
  return true;
}