<!-- Code written by Ludvig Olausson -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailstop - Registera dig</title>
    <link rel="stylesheet" href="css/register_old.css">
    <link rel="stylesheet" href="css/bar.css">
    <script src="js/phone_menu.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
</head>
<body>

<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 
<!-- bar -->
<div class="draw-container">
  <div class="trapezoid-rec"><span>Registrera dig</span></div>
</div>
<!-- bar -->
<div class="reg-wrapper">
  <div class="info_flex"><div class="title">Registrera dig</div>
    </div>
  <div class="contact">
    <div class="select" style="width:200px;">
      <form action"">
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

<div class="mail-reg">
  <div class="newletter_title"><h1>Registera nyhetsbrev.</h1></div>
  <div class="new_regbox">
    <div class="regmailbox"><input type="text" placeholder="E-post"></div>
    <!-- <div class="mailicon">
      <img src="https://fonts.gstatic.com/s/i/materialicons/mail_outline/v4/24px.svg" width="40px">
    </div> -->
  </div>
</div>
<?php include "layout/footer.php";?>
</body>
</html>
