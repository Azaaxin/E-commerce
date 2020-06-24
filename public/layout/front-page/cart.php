<!-- Code by Ludvig -->
<div id="min-ca" class="mini-cart">
<div class="product_decor"></div>
<div class="cart_wrapper">
    <div class="cart_title">Kundvagn:</div>
    <div onclick="showcrt('c')" class="cart_img"><img src="img/cancel.svg" alt="Cancel" width="16px"></div>
    <div class="product_list">Kundvagnen är tom</div>
    <div class="product_flex">
    <div class="sum_cart">Totalt: ‭403.992‬kr</div>
    <div class="checkout_knapp"><button class="button_cart" onClick="window.location.href='cart-page.php'">Till kassan</button></div>
    </div>
    <script src="js/spincore.min.js"></script>
</div>
</div>

<script>
    function showcrt(minca){
        if(minca=="c"){
            close();
        }else{
            document.getElementById("min-ca").style.display = "block";
            $pin("#min-ca").cobweb("PlaceMeAt", "#basketAnchor")
        }
    }
    window.addEventListener('click', function(e){
        if (document.getElementById('min-ca').contains(e.target) || document.getElementById('b_m').contains(e.target)){
            document.getElementById("min-ca").style.display = "block";
            $pin("#min-ca").cobweb("PlaceMeAt", "#basketAnchor")
        }
        else{
            close();
        }
    });
    function close(){
        document.getElementById("min-ca").style.display = "none";
        $pin("#min-ca").cobweb("PlaceMeAt", "#basketAnchor")
    }
</script>