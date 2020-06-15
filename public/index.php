
<?php
require('../src/config.php');
require(SRC_PATH . 'dbconnect.php');
include('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset='utf-8'>
    <title>Trailstop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/bar.css">
    <link rel="stylesheet" href="css/front-page-products.css">
    <link rel="stylesheet" href="css/recommended.css">
    <script src="js/phone_menu.js"></script>
    <script src="js/Ajax.call.js"></script>
    <style>#arrow_y{transition: .5s; margin: 0 auto;}</style>
</head>
<body>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
    include "layout/front-page/slider.php";
    include "layout/front-page/bar.php";
    include "layout/front-page/front-page-products.php";
    //echo writeProd($dbconnect, "`id`, `title`, `description`, `price`, `img_url`", "`products`", "1");
    include "layout/front-page/bar-rec.php";
    include "layout/front-page/recommended.php";
    include "layout/footer.php";
    
?>
    <script src="js/slider.js"></script>
    <script src="js/arrow_position.js"></script>
</body>
</html> 