<?php 

include '/db_functions/execute_query.php';
include 'checks.php';

/*
 * Add Material  { Eddited 15/05/2012, 21:34 } 
 * Adding a new material. 
 * @param name. The material's name.
 * @param type. The material's type.
 * @param price. The material's price.
 * @returns '2': Name already exists in DB.
 *          '3': Adding a material fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Adding a new material successed.
 */
function add_material( $name, $type, $price ) 
{
    
    if( !( string_size_check( $name, 30 ) ) || !( string_size_check( $price, 10 ) ) )
    {
        return 4;
    }
    else if( !( is_numeric( $price ) ) ) 
    {
        return 5;
    }
            
    $fetched_name = fetch_material_by_name( $name );
    
    if( $fetched_name == 3 ) 
    {
        return 3;
    }
	else if( $fetched_name == 4 )
	{
		return 4;
	}
    else if( $fetched_name != null ) 
    {
        return 2;
    }
    
    $name = mysql_real_escape_string( $name );
    $type = mysql_real_escape_string( $type );
    $price = mysql_real_escape_string( $price );
    
    $query = "INSERT INTO materials ( material_name, material_type, material_price ) VALUES ('{$name}', '{$type}', '{$price}')";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
    return 1;
}

/*
 * Delete a Material.  Eddited { 22/04/2012, 21:11 }
 * Deletes the material, which id is given.
 * @param material_id. The material's id we want to delete.
 * @returns '3': Deleting a material fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Deleting a material successed.
 */
function delete_material( $material_id ) 
{  
    
    if( !( string_size_check( $material_id, 2 ) ) ) 
    {
        return 4;
    }
    else if( !( is_numeric( $material_id ) ) )
    {
        return 5;
    }
    
    $material_id = mysql_real_escape_string( $material_id );
    
    $query = "DELETE FROM materials WHERE material_id = '{$material_id}'";
    $result = execute_query( $query );
    
    if( $result == FALSE )
    {
        return 3;
    }
    
    return 1;
}

/*
 * Updates a Material.  Eddited { 23/05/2012, 11:06 }
 * Updates the material, which id is given.
 * @param name. The material's name.
 * @param type. The material's type.
 * @param price. The material's price.
 * @param material_id. The material's id we want to update.
 * @returns '3': Updating a material fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Updating a material successed.

 */
function update_material( $name, $type, $price, $material_id ) 
{

    if( ! ( string_size_check( $material_id, 2 ) ) || !( string_size_check( $name, 30 ) ) || !( string_size_check( $price, 10 ) ) ) 
    {
        return 4;
    }
    else if( !( is_numeric( $material_id ) ) || !( is_numeric( $price ) ) ) 
    {
        return 5;
    }
    
	$fetched_name = fetch_material_by_name( $name );
    
    if( $fetched_name == 3 ) 
    {
        return 3;
    }
	else if( $fetched_name == 4 )
	{
		return 4;
	}
    else if( $fetched_name != null ) 
    {
		foreach( $fetched_name as $material )
		{
			$mat = explode( "~", $material );
			if( $mat[0] != $material_id )
			{
				return 2;
			}
		}
    }
	
    $material_id = mysql_real_escape_string( $material_id );
    $name = mysql_real_escape_string( $name );
    $type = mysql_real_escape_string( $type );
    $price = mysql_real_escape_string( $price );
    
    $query = "UPDATE materials SET material_name = '{$name}', material_type = {$type}, material_price = '{$price}' WHERE material_id = '{$material_id}'";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
    
    return 1;
}

/*
 * Fetches from DataBase all the materials from a specific category ( by type ). Eddited { 24/02/2012, 21:09 }
 * @param type. The type whos materials we want to fetch.
 * @returns The fetched materials. If fetching fails error '3' ( MySql Error ). 
 */
function get_materials_per_type( $type ) 
{
    
    $type = mysql_real_escape_string( $type );
    
    $query = "SELECT * FROM materials WHERE material_type = '{$type}'";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
    else
	{
		$i=0;
		while($get_rows_array[] = mysql_fetch_array( $result, MYSQL_NUM ))
		{
			$record[$i] = implode( '~', $get_rows_array[$i] );
			$i++;
		}  
		if( !( empty( $record ) ) )
		{
			return $record;
		}
		else
		{
			return null;
		}
	}
}

/*
 * Fetches from DataBase the material with the given name. Eddited { 17/05/2012, 12:13 }
 * @param name. The material's name we want to fetch.
 * @returns The fetched material. If fetching fails error '3' ( MySql Error ). 
 */
function fetch_material_by_name( $name )
{   
    
    if( !( string_size_check( $name, 30 ) ) ) 
    {
        return 4;
    }
    
    $name = mysql_real_escape_string( $name );
    
    $query = "SELECT * FROM materials WHERE material_name='{$name}'";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
	else
	{
		$i=0;
		while($get_rows_array[] = mysql_fetch_array( $result, MYSQL_NUM ))
		{
			$record[$i] = implode( '~', $get_rows_array[$i] );
			$i++;
		}  
		if( !( empty( $record ) ) )
		{
			return $record;
		}
		else
		{
			return null;
		}
	}
}

/*
 * Fetches from DataBase all the materials. Eddited { 17/05/2012, 12:30 }
 * @returns The fetched materials. If fetching fails error '3' ( MySql Error ).
 */
function fetch_all_materials()
{
    $query = "SELECT * FROM materials";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
	else
	{
		$i=0;
		while($get_rows_array[] = mysql_fetch_array( $result, MYSQL_NUM ))
		{
			$record[$i] = implode( '~', $get_rows_array[$i] );
			$i++;
		}  
		if( !( empty( $record ) ) )
		{
			return $record;
		}
		else
		{
			return null;
		}
	}
}

?>