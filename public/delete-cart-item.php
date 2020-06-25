<?php  
	session_start();

	require('../src/dbconnect.php');

	echo "<pre>";
	print_r($_SESSION["products_shopping"]);
	echo "<pre>";

//header('location: ' . $_SERVER['HTTP_REFERER']);
//exit;
?>