<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TrailStop</title>
  <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='css/contact.css'>
</head>
<body>
<!-- Header -->
<script src="js/phone_menu.js"></script>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?>

  <div class="container-form">
    <div class="wrapper">
      <div class="company-info">
        <ul>
          <li>Åsögatan 117</li><br>
          <li>08-123-4567</li><br>
          <li>Trailstop@cmeducations.se</li>
        </ul>
        <p class="openings">Våra öppettider är:<br> Mån-Sön 9.00 - 15.00</p>
      </div>
      <div class="contact">
        <h3>Mejla oss</h3>
        <form>
          <p>
            <label>Namn</label>
            <input type="text" name="name">
          </p>
          <p>
            <label>Epostadress</label>
            <input type="email" name="email">
          </p>
          <p>
            <label>Telefon nummer</label>
            <input type="text" name="phone">
          </p>
          <p>
            <label>Ärende</label>
            <input text="text" name="matter">
          </p>
          <p class="full">
            <label>Meddelande</label>
            <textarea name="message" rows="5"></textarea>
          </p>
          <p class="full">
            <button>Skicka</button>
          </p>
        </form>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php 
    include "layout/footer.php";
  ?>

</body>
</html>