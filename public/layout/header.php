<!--- Header file Written by Ludvig Olausson ----->
<link rel="stylesheet" href="css/header.css">
<div class="container">
    <div class="Logo" onClick="window.location.href='index.php'"></div>
    <div class="Menu">
    <ul>
        <li><a href="category-page.php">Handla</a></li>
        <li><a href="admin/product.php">Admin</a></li>
        <li><a href="contact-page.php">Kontakta oss</a></li>
    </ul>
    </div>  
    <div id="b_m" class="Basket">
    <a href="#loading_cart" onclick="showcrt();"><img src="img/basket.svg" id="basketAnchor" alt="Basket"></a>
    </div>
    <div class="Basket_mobile">
    <a href="cart-page.php"><img src="img/basket.svg" alt="Basket"></a>
    </div>
    <div class="Hamburger">
        <div id="ham_menu" onclick="outside()" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="Line">
        <span></span>
    </div>
    <div class="user_area">
        <a href="register.php">Logga in</a> 
    </div>
</div>
<div class="shipping">
    <div class="midc">
        <img src="img/checkbox.png" alt="checkbox" height="17px" width="17px">
        <p>Gratis frakt över 800kr</p>
    </div>
</div>
<?php include "front-page/cart.php" ?>
<script>shopping_cart();</script>
<!--- Header file ends ----->