<link rel="stylesheet" href="../css/edit_products.css">
<?php include "../layout/header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<link rel="stylesheet" href="../css/header.css">
<link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <script src="../js/phone_menu.js"></script>
    <script src="../js/Ajax.call.js"></script>
<div class="wrapper">
    <div class="product_settings">
        <div class="unified_button add_button">Add</div>
        <div class="search"><input type="text" id="src" name="search" autocomplete="off" placeholder="Sök produkt" id=""></div>
    </div>
    <div class="product_list">
        <div class="cat">
            <div class="id">ID</div>
            <div class="img">IMAGE</div>
            <div class="title">TITLE</div>
            <div class="desc">DESCRIPTION</div>
            <div class="price">PRICE</div>
            <div class="filler"></div>
        </div>
        <div class="feed"></div>
    </div>
</div>
<div class="overlay">
    <div id="wedit" class="editwindow">
    <h3>Edit</h3>
        <form id="editForm" action="#">
                <input id="#EDtitle" class="EDtitle" type="text" name="title" placeholder="Title">
                <input id="#EDimage" class="EDimage"type="text" name="img" placeholder="Image url">
                <input id="#EDprice" class="EDprice" type="text" name="price" placeholder="Price">
                <div id="#EDdesc" class="formattedTextarea editable EDdesc"></div>
                <input type="hidden" id="textarea_hidden" name="desc">
                <input type="hidden" id="id" name="id">
        </form>
        
    </div>
    <div id="wcreate" class="createwindow">
    <h3>Create</h3>
        <form id="createForm" action="#">
                <input id="#CDtitle" class="CDtitle" type="text" name="title" placeholder="Title">
                <input id="#CDimage" class="CDimage"type="text" name="img" placeholder="Image url">
                <input id="#CDprice" class="CDprice" type="text" name="price" placeholder="Price">
                <div id="#CDdesc" placeholder="Skriv en beskrivning..." class="formattedTextarea editable CDdesc"></div>
                <input type="hidden" class="hdesc" id="Ctextarea_hidden" name="desc">
                <input type="hidden" id="Cid" name="id">
        </form>
    </div>
    <div id="wdelete" class="deletewindow">
        <p>Är du säker på att du vill ta bort denna produkt?</p>
        <div class="confirmed_del unified_button">Ta bort produkt</div>
    </div>
</div>
<!-- <script src="../js/Ajax.call.js"></script> -->
<script>admin_read();</script>
<script src="../js/edit_products.js"></script>
<script src="../js/spincore.min.js"></script>
<script src="../js/jquery.toast.js"></script>
<link rel="stylesheet" href="../css/jquery.toast.css">