<form name="frm_login" action="db_functions/dologin.php" method="POST">    
<table>
	<tbody>
		<tr> 
			<th align="right"><label for="username">Username</label></th> 
			<td><input type="text" name="username" id="username"  maxlength="15" /</td>
		</tr>
		<tr> 
			<th align="right"><label for="password">Password</label></th> 
			<td><input type="password" name="password" id="password" maxlength="5" /></td>
		</tr>
	</tbody>
	<tfoot>
		<tr> <td align="left" colspan=2>
	    	<table>
    	    	<col width="140" />
               	<col width="140" />
                <col width="140" />
        	    <tr>
            		<td>	
                    	<a href="#" class="button" onclick="loginUser();"> 
                    		<span class="confirm"> Είσοδος </span>
                    	</a>
                	</td>
                    <td>			
                        <a href="#" class="button" onclick="hide('login');">
                       		<span class="cancel"> Ακύρωση </span>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="button" onclick="registerUser();">
                    	    <span class="register"> Εγγραφή </span>
                        </a>
                    </td>
                </tr>
             </table>
		</td></tr>
	</tfoot>	
</table>
</form>