<?php

//include( '/db_functions/execute_query.php' );
//include( 'checks.php' );

/*
 * Add Order  { Eddited 25/4/2012, 16:54 } 
 * Adding a new order. 
 * @param total. The order's total.
 * @param status. The order's status.
 * @param deliveryman. The order's delivery man.
 * @param employee. The order's employee.
 * @param order_customers_id. The order's customer id.
 * @param order_material_id. The order's material id.
 * @returns '3': Adding an order fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Adding a new order successed.
 */
function add_order( $total, $status, $deliveryman, $employee, $order_customers_id, $order_material_id ) 
{  
    
    if( !( string_size_check( $total, 10 ) ) || !( string_size_check( $deliveryman, 30 ) ) || !( string_size_check( $employee, 30 ) ) || !( string_size_check( $order_customers_id, 5 ) ) || !( string_size_check( $order_matelias_id, 5 ) ) ) 
    {
        return 4;
    }
    else if( !( is_numeric( $total ) ) || !( is_numeric( $order_customers_id ) ) || !( is_numeric( $order_material_id ) ) ) 
    {
        return 5;
    }
    
    $total = mysql_real_escape_string( $total );
    $status = mysql_real_escape_string( $status );
    $deliveryman = mysql_real_escape_string( $deliveryman );
    $employee = mysql_real_escape_string( $employee );
    $order_customers_id = mysql_real_escape_string( $order_customers_id );
    $order_material_id = mysql_real_escape_string( $order_material_id );
    
    $query = "INSERT INTO orders ( order_total, order_status, order_customers_id, order_deliveryman, order_employee, order_material_id ) VALUES ('{$total}', '{$status}', '{$order_customers_id}', '{$deliveryman}', '{$employee}', '{$order_matelias_id}')";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
    
    return 1;
}

/*
 * Delete an Order.  Eddited { 25/04/2012, 17:16 }
 * Deletes the order, which id is given.
 * @param order_id. The order's id we want to delete.
 * @returns '3': Deleting an order fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Deleting an order successed.
 */
function delete_order( $order_id ) 
{
    
    if( !( string_size_check( $order_id, 5 ) ) ) 
    {
        return 4;
    }
    else if( !( is_numeric( $order_id ) ) )
    {
        return 5;
    }
    
    $order_id = mysql_real_escape_string( $order_id );
    
    $query = "DELETE FROM orders WHERE order_id = '{$order_id}'";
    $result = execute_query( $query );
    
    if( $result == FALSE ) 
    {
        return 3;
    }
    
    return 1;
}

/*
 * Updates an order.  Eddited { 25/04/2012, 17:30 }
 * Updates the order, which id is given.
 * @param total. The order's total.
 * @param status. The order's status.
 * @param deliveryman. The order's delivery man.
 * @param employee. The order's employee.
 * @param order_customers_id. The order's customer id.
 * @param order_matelias_id. The order's material id.
 * @param order_id. The order's id we want to update.
 * @returns '3': Updating an order fails. ( MySql Error )
 *          '4': Size of given values is huge.
 *          '5': Given value is not numeric.
 *          '1': Updating an order successed.

 */
function update_order( $total, $status, $deliveryman, $employee, $order_customers_id, $order_matelias_id, $order_id ) {

    if( !( string_size_check( $order_id, 5 ) ) || !( string_size_check( $total, 10 ) ) || !( string_size_check( $deliveryman, 30 ) ) || !( string_size_check( $employee, 30 ) ) || !( string_size_check( $order_customers_id, 5 ) ) || !( string_size_check( $order_matelias_id, 5 ) ) ) 
    {
        return 4;
    }
    else if( !( is_numeric( $order_id ) ) || !( is_numeric( $total ) ) || !( is_numeric( $order_customers_id ) ) || !( is_numeric( $order_matelias_id ) ) ) 
    {
        return 5;
    }
    
    $order_id = mysql_real_escape_string( $order_id );
    $total = mysql_real_escape_string( $total );
    $status = mysql_real_escape_string( $status );
    $deliveryman = mysql_real_escape_string( $deliveryman );
    $employee = mysql_real_escape_string( $employee );
    $order_customers_id = mysql_real_escape_string( $order_customers_id );
    $order_matelias_id = mysql_real_escape_string( $order_matelias_id );
    
    $query = "UPDATE orders SET order_total = '{$total}', order_status = {$status}, order_customers_id = '{$order_customers_id}', order_deliveryman = '{$deliveryman}', order_employee = '{$employee }', order_matelias_id = '{$order_matelias_id }' WHERE order_id = '{$order_id}'";
    $result = execute_query( $query );
   
    if( $result == FALSE ) {
        return 3;
    }
    
    return 1;
}

/*
 * Fetches from DataBase all the orders with a specific status. Eddited { 25/02/2012, 17:50 }
 * @param status. The status, for which we want to fetch its orders.
 * @returns The fetched orders. If fetching fails error '3' ( MySql Error ). 
 */
function fetch_order_by_status( $status ) {
    
    $status = mysql_real_escape_string( $status );
    
    $query = "SELECT * FROM orders WHERE order_status = '{$status}'";
    $result = execute_query( $query );
    
    if( $result == FALSE ) {
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

function calculate_material_cost( $price, $quantity ) {
    
    if( string_size_check( $price, 10 ) || string_size_check( $quantity, 1 ) ) {
        
    }
}


function procceed($item)
		{ 
	echo"d";
		}
		
function send($item)
{ 
	echo"			alert(item);";
			
} 
	
?>