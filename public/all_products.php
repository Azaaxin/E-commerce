<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset='utf-8'>
    <title>FYRA - Mobiltelefoner</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/bar.css">
    <link rel="stylesheet" href="css/front-page-products.css">
    <link rel="stylesheet" href="css/category.css">
    <script src="js/phone_menu.js"></script>
    <script src="js/Ajax.call.js"></script>
    <style>#arrow_y{transition: .5s; margin: 0 auto;}</style>
</head>
<body>
<script src="js/phone_menu.js"></script>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 
<div class="draw-container">
  <div class="trapezoid-rec"><span>Alla telefoner</span></div>
</div>
<div class="reco_container">
  <script>all_products();
      $(document).on("click", ".cont" , function() {
      window.location = "product-page.php?id=" + this.id;
  });
</script>
  <div class="more">
      Read More
</div>
</div>

<?php 
    include "layout/footer.php";
?>
    
</body>
</html>