<?php
	require('../src/config.php');
	


 

	if (!empty($_POST['key']) && isset($_SESSION['products_shopping'][$_POST['key']])) {

        unset($_SESSION['products_shopping'][$_POST['key']]);
	}

	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>
