<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Trailstop | Rocky Mountain Altitude</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/product.css'>
</head>
<body>
<?php 
    include "functions.php";
    include "layout/header.php";
    include "layout/phone_menu.php"; 
?>
<div class="grid-container">
  <div class="shop">
    <div class="title"></div>
    <div class="image"></div>
    <div class="buy">
      <div class="buyButton"></div>
      <div class="count"></div>
      <div class="price"></div>
      <div class="buy_misc"></div>
      <div class="buyButton_misc"></div>
    </div>
    <div class="desc"></div>
    <div class="optional_area"></div>
  </div>
  <div class="sidebar_left"></div>
  <div class="sidebar_right"></div>
</div>
<?php 
    include "layout/footer.php";
?>
<script src="js/Ajax.call.js"></script>
<?php
echo "<script>productPage(". $_GET['id'] .");</script>";
?>
<script src="js/phone_menu.js"></script>
</html>

