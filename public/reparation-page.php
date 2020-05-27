<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Trailstop | Rocky Mountain Altitude</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/reparation.css'>

</head>
<body>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php"; 
?>

<section class="hero">
  <img src="img/SSC.png" alt="Shimano Service Center">
</section>

<main class="flex-wrapper">
  <section class="form-wrapper">
    <form>
      <h2>Serviceformulär</h2>
      <ul class="flex-form">
        <li>
          <label for="name">Namn</label>
          <input type="text" id="name" placeholder="Skriv ditt fullständiga namn">
        </li>
        <li>
          <label for="phone">Telefonnummer</label>
          <input type="tel" id="phone" placeholder="Inklusive riktnummer">
        </li>
        <li>
          <label for="brand">Märke</label>
          <input type="brand" id="brand" placeholder="Cykelns märke">
        </li>
        <li>
          <label for="model">Modell</label>
          <input type="text" id="model" placeholder="Modell inklusive årsmodell">
        </li>
        <li>
          <label for="message">Ärende</label>
          <textarea rows="6" id="message" placeholder="Beskriv ditt problem här"></textarea>
        </li>
        <li>
          <button type="submit">Skicka</button>
        </li>
      </ul>
    </form>
  </section>

  <aside class="service-partners">
    <h2>Service Partners</h2>
    <img src="img\rockshox.jpg" alt="Rockshox">
    <img src="img\Ohlins_logo.png" alt="Öhlins">
    <img src="img\fox.jpg" alt="Fox Racing Shox">
    <img src="img\1491987590096.jpg" alt="Shimano Service Center">
  </aside>
</main>

<?php 
    include "layout/footer.php";
?>
<script src="js/phone_menu.js"></script>
</body>
</html>