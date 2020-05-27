<!-- Code by Ludvig -->
<div id="min-ca" class="mini-cart">
<div class="product_decor"></div>
<div class="cart_wrapper">
    <div class="cart_title">Kundvagn:</div>
    <div onclick="showcrt('c')" class="cart_img"><img src="img/cancel.svg" alt="Cancel" width="16px"></div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
        <div class="product_img_cart"><img src="img/mtn_bike_scott.jpg" width="32px" alt="product_image"></div>
        <div class="product_title">Mtb Scott</div>
        <div class="product_price">67332kr</div>
    </div>
    <div class="product_flex">
    <div class="sum_cart">Totalt: ‭403.992‬kr</div>
    <div class="checkout_knapp"><button class="button_cart" onClick="window.location.href='cart-page.php'">Till kassan</button></div>
    </div>
    
</div>
</div>

<script>
    function showcrt(minca){
        if(minca=="c"){
            close();
        }else{
            document.getElementById("min-ca").style.display = "block";
        }
    }
    window.addEventListener('click', function(e){
        if (document.getElementById('min-ca').contains(e.target) || document.getElementById('b_m').contains(e.target)){
            document.getElementById("min-ca").style.display = "block";
        }
        else{
            close();
        }
    });
    function close(){
        document.getElementById("min-ca").style.display = "none";
    }
</script>