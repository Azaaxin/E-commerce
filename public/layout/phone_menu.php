<!--- phone menu starts, written by Ludvig Olausson ---->
<link rel="stylesheet" href="css/phone_menu.css">
<a id="toggle" href="#"></a>
<div id="menu" class="phone_menu">
    <div class="menu-user-container">
        <div class="search">
            <input type="text" placeholder="Search">
        </div>
        <div class="ham2">
            <img id="closing" src="img/close.svg" alt="Close" width="35px">
        </div>
        <div class="login_text"><a href="register.php">Logga in</a></div>
        <div class="shopping"><a href="cart-page.php"><img src="img/basket.svg" alt="Basket"></a></div>
    </div>
    <div class="flex-menu-wrapper">
        <div class="box_menu" onclick="window.location.href='index.php'">Hem</div>
        <div class="box_menu" onclick="window.location.href='admin/product.php'">Admin</div>
        <div class="box_menu" onclick="window.location.href='reparation-page.php'">Service</div>
        <div class="box_menu" onclick="window.location.href='contact-page.php'">Kontakt</div>
    </div>
</div>
<!--- phone menu end --->