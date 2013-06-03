<?php
/*
 * Include login informations      Eddited { 10/05/2012, 15:53 }
 * Creates the connection link and selects the Database. 
 */
include 'db_login(obsolete).php';

$connection = mysql_connect( $db_host, $db_username, $db_password );
if ( !$connection )
{
    die ( "Couldn't Connect to the Database: <br>".mysql_error() );
}

if ( !mysql_select_db( $db_database, $connection ) )
{
    die ( "Couldn't select db: <br>".mysql_error() );
}

mysql_query("SET NAMES utf8");

?>