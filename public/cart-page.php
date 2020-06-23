<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Trailstop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/cart.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
</head>
<body>
    <script src="js/phone_menu.js"></script>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 

<div class="wrapper">

 <div class="content">
    <div class="cart1">
        <h1><u>Din Kundvagn</u></h1>
        <h2>TREK ROSCOE 7</h2>
        <h3>11.200kr</h3>
        <p class="lager">I lager. Leverans 3-5 dagar.</p> 
        <div class="custom-select" style="width:200px;">
      <select>
        <option value="0">Antal:</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
</div>
        <img class="trek" src="img/trek.jpg" height="auto" width="100%">
    </div>
    <div class="cart2">
        <h3>Faktura Address</h3>
          <label for="fname"><i class="fa fa-user"></i> Full Namn</label>
          <input type="text" id="fname" name="firstname" placeholder="Anna Paleologos">
          <label for="email"><i class="fa fa-envelope"></i> Email</label>
          <input type="text" id="email" name="email" placeholder="anna@example.com">
          <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
          <input type="text" id="adr" name="address" placeholder="Märsta">
          <label for="city"><i class="fa fa-institution"></i>Stad</label>
          <input type="text" id="city" name="city" placeholder="Stockholm">
          <label for="state">Ort</label>
          <input type="text" id="state" name="state" placeholder="Sverige">
          <label for="zip">Postadress</label>
          <input type="text" id="zip" name="zip" placeholder="10001">
    </div>
    <div class="cart3">
          <h3>Betalning</h3>
          <label for="ccards">Välj kort:</label>
        <select class="cards">
          <option value="visa">Visa</option>
          <option value="mastercard">Mastercard</option>
          <option value="amex">American Express</option>
        </select>
          <label for="cname">Namn på kort</label>
          <input type="text" id="cname" name="cardname" placeholder="Anna Paleologos">
          <label for="ccnum">Kreditkort nummer</label>
          <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
          <label for="expmonth">Månad</label>
          <input type="text" id="expmonth" name="expmonth" placeholder="September">
          <label for="expyear">År</label>
          <input type="text" id="expyear" name="expyear" placeholder="2020">
          <label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="000">
          <label>
          <input type="checkbox" checked="checked" name="sameadr"> Leverans adress samma som faktura adress
          </label>
          <label>
          <input type="checkbox" checked="checked" name="sameadr"> Jag vill få erbjundande via email
          </label>
          <input type="submit" value="Gå Vidare" class="btn">
          <h1>Total</h1><br>
          <h1>11200kr</h1>
    </div>
 </div>   

<div class="main">
<div class="box">Rekommederat för dig</div>
  <div class="rek">
    <div class="gallery1">
        <img src="img/verktyg.jpg"  width="100%" height="auto">
          <div class="desc">BBB MaxiFold Small multiverktyg<br>
        179 kr</br>
        <a class="cart" href="http://ludvigolausson.se/cart-page.php">Lägg till i kundvagn</a></div>
    </div>
   <div class="gallery2">
       <img src="img/bell.jpg"  width="100%" height="auto">
          <div class="desc">Bell Super Air R</br>
        2 299 kr</br>
       <a class="cart" href="http://ludvigolausson.se/cart-page.php">Lägg till i kundvagn</a></div>
    </div>
   <div class="gallery3">
       <img src="img/ögon.jpg" width="100%" height="auto">
         <div class="desc">Aeroclub Stockholm - High Contrast</br>
        799 kr</br>
       <a class="cart" href="http://ludvigolausson.se/cart-page.php">Lägg till i kundvagn</a></div>
   </div>
   <div class="gallery4">
       <img src="img/skor.jpg"  width="100%" height="auto">
         <div class="desc">Fizik FIZIK Terra X4 Powerstrap Mud/Beige</br>
        1 799 kr</br>
       <a class="cart" href="http://ludvigolausson.se/cart-page.php">Lägg till i kundvagn</a></div>
   </div>
  </div>
</div>


</div>
<?php 
    include "layout/footer.php";
?> 
</body>
</html>