<?php
/*
 * Include connection file.     Eddited { 10/05/2012, 15:50 }
 */
include 'db_connect(obsolete).php';

/*
 * Executes the given query. Dies when error apears. At the end connection is closing.
 * @returns The query's execution result.    
 */
function execute_query( $sql )
{
    global $connection;
    
    $result = mysql_query( $sql, $connection );
    if ( !$result )
    {
        die( 'Error: ' . mysql_error() );
    }
    else 
    {
        return $result;
    }

    mysql_close( $connection );
}
?>
