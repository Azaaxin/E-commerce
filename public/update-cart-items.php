
<?php

    require('../src/config.php');
    


 

    if (!empty($_POST['key']) 
        && !empty($_POST['quantity']) 
        && isset($_SESSION['products_shopping'][$_POST['key']])) {

        $_SESSION['products_shopping'][$_POST['key']]['quantity'] = $_POST['quantity'];
    }

    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>
