<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Trailstop</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src="js/phone_menu.js"></script>
</head>
<body>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 
<div class="regwrapper">
  <div class="contact">
  <h1>Registrera dig hos oss</h1>
      <div class="select">
        <form method="POST" action"#">
      <select required>
        <option value="">Välj land</option>
        <option value="1">Sverige</option>
        <option value="2">Danmark</option>
        <option value="3">Finland</option>
        <option value="4">Storbritannien</option>
        <option value="5">Norge</option>
      </select>
        <input type="text" required  placeholder="Förnamn">
        <input type="text" required  placeholder="Efternamn">
        <input type="text" required placeholder="E-post">
        <input type="text" required placeholder="Adress">
        <input type="text" required placeholder="Stad">
        <input class="butn" type="submit" value="Registrera">
        </form>
    </div>
    </div>
  </div>
  <?php include "layout/footer.php";?>
</body>
</html>