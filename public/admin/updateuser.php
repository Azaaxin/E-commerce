<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="author" content="Andreas Ronvall">
    <meta name="description" content="Andreas Ronvall Update User 4-sidan">
    <title>Uppdatera användaruppgifter</title>
    <link rel="stylesheet" href="css/register.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src="js/phone_menu.js"></script>
</head>
<body>
<?php 
    include "layout/header.php";
    include "layout/phone_menu.php";
?> 

<?php 
   <?php
    require('src/config.php');
    require('src/dbconnect.php');
    
    $msg             = '';

     // Fetch user by id
     $user = fetchUsersById($_GET['id']);

   
?>


        <div id="content">
            <form method="POST" action="#" id="updateform">
                    <fieldset>
                        <legend>UPPDATERA användaruppgifter</legend>
                            
                        
                        <div id="message-field"><?=$msg?></div>
                       
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="input1">Förnamn:</label> <br>
                                <input type="text" class="form-control" name="firstname" value="<?=htmlentities(ucfirst($user['firstname']))?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input1">Efternamn:</label> <br>
                                <input type="text" class="form-control" name="lastname" value="<?=htmlentities(ucfirst($user['lastname']))?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="input1">Mail-adress:</label> <br>
                                <input type="text" class="form-control" name="mail" value="<?=htmlentities($user['email'])?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input1">Mobilnummer:</label> <br>
                                <input type="text" class="form-control" name="mobile" value="<?=htmlentities($user['mobile'])?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="input1">Adress:</label> <br>
                                <input type="text" class="form-control" name="street" value="<?=htmlentities(ucfirst($user['street']))?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input1">Postnummer:</label> <br>
                                <input type="text" class="form-control" name="postalcode" value="<?=htmlentities($user['postalcode'])?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="input1">Stad:</label> <br>
                                <input type="text" class="form-control" name="city" value="<?=htmlentities(ucfirst($user['city']))?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input1">Land:</label> <br>
                                <input type="text" class="form-control" name="country" value="<?=htmlentities(ucfirst($user['country']))?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="input2">Lösenord (Fler än 6 tecken och fortf. ej Jordan :):</label> <br>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input2">Bekräfta Lösenordet:</label> <br>
                                <input type="password" class="form-control" name="confirmPass">
                            </div>
                        </div>
                        <p>
                            <input type="submit" name="register" value="Update" class="update-user-btn">
                        </p>
                    </fieldset>
                </form>
        </div>
    
        

</body>

<?php include('layout/footer.php'); ?>

</html>