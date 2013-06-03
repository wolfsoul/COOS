<?php
session_start();
chdir('../');
include 'material.php';

$_SESSION['material_error']=delete_material($_GET['id']);

echo('<meta http-equiv="Refresh" content="0;url=../views/material_management.php">');

?>