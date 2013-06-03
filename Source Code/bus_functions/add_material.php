<?php
session_start();
chdir('../');
include 'material.php';

$_SESSION['material_error']=add_material($_GET['name'],$_GET['type'],$_GET['price']);

echo('<meta http-equiv="Refresh" content="0;url=../views/material_management.php">');

?>